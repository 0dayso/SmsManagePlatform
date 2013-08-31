<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-31
 * Time: 上午12:40
 * To change this template use File | Settings | File Templates.
 */
class Contact_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function addContact($data)
    {
        $this->db->insert('contact', $data);
        if($this->db->affected_rows() == 1)
            return TRUE;
        else
            return FALSE;
    }

    public function selectContact($data, $uid)
    {
        $this->db->select('*');
        $this->db->from('contact, contactgroup');
        $this->db->where('contact.cgid = contactgroup.cgid');
        if(isset($data['cname']))
            $this->db->where('cname', $data['cname']);
        if(isset($data['cgroup']))
            $this->db->where('cgroup', $data['cgname']);
        $this->db->where('contact.uid', $uid);
        $query = $this->db->get();
        if($query->num_rows()){
            $result['numrow'] = $query->num_rows();
            $result['result'] = $query->result_array();
            return $result;
        }
        else
            return FALSE;
    }

    public function addContactgroup($data)
    {
        $this->db->insert('contactgroup', $data);
        if($this->db->affected_rows())
            return TRUE;
        else
            return FALSE;
    }

    public function selectContactgroup($uid, $cgname = null, $cginfo = null)
    {
        $this->db->where('uid', $uid);
        if($cgname)
            $this->db->where('cgname', $cgname);
        if($cginfo)
            $this->db->where('cginfo', $cginfo);
        $query = $this->db->get('contactgroup');
        if($query->num_rows()){
            return $query->result_array();
        }
        else
            return FALSE;
    }
}