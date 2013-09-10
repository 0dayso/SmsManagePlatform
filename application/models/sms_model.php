<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-31
 * Time: 上午10:43
 * To change this template use File | Settings | File Templates.
 */
class Sms_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('date');
    }

    public function addSmstask($data)
    {
        $this->db->insert_batch('smsmt', $data);
        var_dump($data);
        if($this->db->affected_rows())
            return TRUE;
        else
            return FALSE;
    }

    public function addMtcontent($uid, $data, $title='')
    {
        $this->db->insert('mtcontent', array(
            'uid'=>$uid,
            'content'=>$data,
            'title'=>$title
        ));
        return $this->db->insert_id();
    }

    public function getHistorysms($uid, $data, $page)
    {
        $this->db->select('*');
        $this->db->from('smsmt, mtcontent');
        $this->db->where('smsmt.csid = mtcontent.csid');
        $this->db->where('smsmt.uid', $uid);
        if(array_key_exists('startime', $data)){
            $data['startime'] = human_to_unix($data['startime'].' 00:00 AM');
            $this->db->where('UNIX_TIMESTAMP(smsmt.addtime) >=', $data['startime']);
        }
        if(array_key_exists('endtime', $data)){
            $this->db->where('smsmt.addtime <=', $data['endtime']);
        }
        if(array_key_exists('clientnumber', $data))
            $this->db->where('smsmt.snumber', $data['clientnumber']);
        if(array_key_exists('flag', $data))
            $this->db->where('smsmt.flag', $data['flag']);
        $this->db->order_by('smsmt.addtime', 'desc');
        $this->db->limit(8, $page * 8);
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
        else
            return FALSE;
    }

    public function getTotal($uid, $data)
    {
        $this->db->select('*');
        $this->db->from('smsmt, mtcontent');
        $this->db->where('smsmt.csid = mtcontent.csid');
        $this->db->where('smsmt.uid', $uid);
        if(array_key_exists('startime', $data)){
            $data['startime'] = human_to_unix($data['startime'].' 00:00 AM');
            $this->db->where('UNIX_TIMESTAMP(smsmt.addtime) >=', $data['startime']);
        }
        if(array_key_exists('endtime', $data)){
            $this->db->where('smsmt.addtime <=', $data['endtime']);
        }
        if(array_key_exists('clientnumber', $data))
            $this->db->where('smsmt.snumber', $data['clientnumber']);
        $this->db->order_by('smsmt.addtime', 'desc');
        $query = $this->db->get();
        $result = $query->result_array();
        $data['total'] = $query->num_rows();
        $data['waitforcheck'] = 0;
        $data['waitforsend'] = 0;
        $data['submit'] = 0;
        $data['success'] = 0;
        $data['failed'] = 0;
        foreach($result as $item){
            switch($item['flag']){
                case 0:
                    ++$data['waitforcheck'];
                    break;
                case 1:
                    ++$data['waitforsend'];
                    break;
                case 4:
                    ++$data['submit'];
                    break;
                case 6:
                    ++$data['success'];
                    break;
                case 7:
                    ++$data['failed'];
                    break;
            }
        }
        return $data;
    }

    public function getUnchecksms($data, $page, $flag = null, $analysis = null)
    {
        if(!$analysis)
            $this->db->limit(5, $page * 5);
        if($flag)
            $query = $this->db->get('mtcontent');
        else
            $query = $this->db->get_where('mtcontent', array(
            'flag'=>0
        ));
        $returndata = array();
        $result = $query->result_array();
        foreach($result as $item)
        {
            $csid = $item['csid'];
            $this->db->select('*');
            $this->db->from('smsmt');
            $this->db->where('csid = '.$csid);
            if(array_key_exists('startime', $data))
                $this->db->where('addtime >=', $data['startime']);
            if(array_key_exists('endtime', $data))
                $this->db->where('addtime <=', $data['endtime']);
            if(array_key_exists('gatetype', $data)){
                if($data['gatetype'] ==0)
                    $this->db->where('type', $data['gatetype']);
                else
                    $this->db->where('type', $data['gatetype']);
            }
            if(array_key_exists('flag', $data))
                $this->db->where('flag', $data['gatetype']);
            $query = $this->db->get();
            if($query->num_rows() == 0)
                return $returndata;
            $query = $query->result_array();
            $uid = $query[0]['uid'];
            $mobilenum = 0;
            $unicomnum = 0;
            $telecomnum = 0;
            foreach($query as $tmp){
                switch($tmp['type']){
                    case 1:
                        ++$mobilenum;
                        break;
                    case 2:
                        ++$unicomnum;
                        break;
                    case 3:
                        ++$telecomnum;
                        break;
                }
            }
            $query = $this->db->get_where('user', array(
                'uid'=>$uid
            ));
            $query = $query->row_array();
            $fid = $query['fid'];
            $query = $this->db->get_where('factory', array(
                'fid'=>$fid
            ));
            $query = $query->row_array();
            $fname = $query['fname'];
            if($mobilenum)
                array_push($returndata, array(
                    'csid'=>$csid,
                    'fname'=>$fname,
                    'content'=>$item['content'],
                    'num'=>$mobilenum,
                    'gatetype'=>'移动',
                    'addtime'=>$item['addtime']
                ));
            if($unicomnum)
                array_push($returndata, array(
                    'csid'=>$csid,
                    'fname'=>$fname,
                    'content'=>$item['content'],
                    'num'=>$unicomnum,
                    'gatetype'=>'联通',
                    'addtime'=>$item['addtime']
                ));
            if($telecomnum)
                array_push($returndata, array(
                    'csid'=>$csid,
                    'fname'=>$fname,
                    'content'=>$item['content'],
                    'num'=>$telecomnum,
                    'gatetype'=>'电信',
                    'addtime'=>$item['addtime']
                ));
        }
        return $returndata;
    }

    public function getFishsms($data, $page)
    {
        $query = $this->db->get('mtcontent');
        $returndata = array();
        $result = $query->result_array();
        foreach($result as $item)
        {
            $csid = $item['csid'];
            $this->db->select('*');
            $this->db->from('smsmt, fishnumber');
            $this->db->where('smsmt.snumber = fishnumber.number');
            $this->db->where('smsmt.csid = '.$csid);
            if(array_key_exists('startime', $data))
                $this->db->where('smsmt.addtime >=', $data['startime']);
            if(array_key_exists('endtime', $data))
                $this->db->where('smsmt.addtime <=', $data['endtime']);
            if(array_key_exists('gatetype', $data)){
                if($data['gatetype'] ==0)
                    $this->db->where('smsmt.type', $data['gatetype']);
                else
                    $this->db->where('smsmt.type', $data['gatetype']);
            }
            $this->db->limit(4, $page * 4);
            $query = $this->db->get();
            if($query->num_rows() == 0)
                return $returndata;
            $query = $query->result_array();
            $uid = $query[0]['uid'];
            $mobilenum = 0;
            $unicomnum = 0;
            $telecomnum = 0;
            foreach($query as $tmp){
                switch($tmp['type']){
                    case 1:
                        ++$mobilenum;
                        break;
                    case 2:
                        ++$unicomnum;
                        break;
                    case 3:
                        ++$telecomnum;
                        break;
                }
            }
            $query = $this->db->get_where('user', array(
                'uid'=>$uid
            ));
            $query = $query->row_array();
            $fid = $query['fid'];
            $query = $this->db->get_where('factory', array(
                'fid'=>$fid
            ));
            $query = $query->row_array();
            $fname = $query['fname'];
            if($mobilenum)
                array_push($returndata, array(
                    'csid'=>$csid,
                    'fname'=>$fname,
                    'content'=>$item['content'],
                    'num'=>$mobilenum,
                    'gatetype'=>'移动',
                    'addtime'=>$item['addtime']
                ));
            if($unicomnum)
                array_push($returndata, array(
                    'csid'=>$csid,
                    'fname'=>$fname,
                    'content'=>$item['content'],
                    'num'=>$unicomnum,
                    'gatetype'=>'联通',
                    'addtime'=>$item['addtime']
                ));
            if($telecomnum)
                array_push($returndata, array(
                    'csid'=>$csid,
                    'fname'=>$fname,
                    'content'=>$item['content'],
                    'num'=>$telecomnum,
                    'gatetype'=>'电信',
                    'addtime'=>$item['addtime']
                ));
        }
        return $returndata;
    }

    public function getOutput($csid, $type)
    {
        $query = $this->db->get_where('smsmt', array(
            'csid'=>$csid,
            'type'=>$type
        ));
        if($query->num_rows())
            return $query->result_array();
        else
            return FALSE;
    }

    public function acceptSMS($csid, $flag)
    {
        $this->db->where('csid', $csid);
        $this->db->update('mtcontent', array(
            'flag'=>$flag
        ));
        $this->db->where('csid', $csid);
        $this->db->update('smsmt', array(
            'flag'=>$flag
        ));
        return TRUE;
    }
}