<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function login_validate($data)
    {
        $usrname = $data['usrname'];
        $passwd = $data['passwd'];
        $fname = $data['fname'];
        $this->db->select('*');
        $this->db->from('user, factory');
        $this->db->where("user.fid = factory.fid AND user.usrname =".
        "'$usrname' AND user.passwd = '$passwd' AND factory.fname = '$fname'");
        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            $result = $query->row_array();
            return $result;
        }
        else
            return FALSE;
    }

    public function manage_factory_user($fid, $usrname = null)
    {
        $this->db->where('fid', $fid);
        if($usrname)
            $this->db->where('usrname', $usrname);
        $query = $this->db->get('user');
        if($query->num_rows())
        {
            $result = $query->result_array();
            return $result;
        }
        else
            return FALSE;
    }
}