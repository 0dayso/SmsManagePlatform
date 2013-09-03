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
        if(array_key_exists('startime', $data))
            $this->db->where('smsmt.addtime >', $data['startime']);
        if(array_key_exists('endtime', $data))
            $this->db->where('smsmt.addtime <', $data['endtime']);
        if(array_key_exists('clientnumber', $data))
            $this->db->where('smsmt.snumber', $data['clientnumber']);
        if(array_key_exists('flag', $data))
            $this->db->where('smsmt.flag', $data['flag']);
        $this->db->limit(2, $page * 2);
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
        else
            return FALSE;
    }

    public function getUnchecksms($data, $page)
    {
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
            if(array_key_exists('gatetype', $data))
                $this->db->where('type', $data['gatetype']);
            $this->db->limit(3, $page * 3);
            $query = $this->db->get();
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

    public function acceptSMS($csid, $flag)
    {
        $this->db->where('csid', $csid);
        $this->db->update('mtcontent', array(
            'flag'=>$flag
        ));
        $this->db->update('smsmt', array(
            'flag'=>$flag
        ));
        return TRUE;
    }
}