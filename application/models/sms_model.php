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

    public function getHistorysms($uid, $data)
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
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
        else
            return FALSE;
    }
}