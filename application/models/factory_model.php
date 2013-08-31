<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-31
 * Time: 下午7:28
 * To change this template use File | Settings | File Templates.
 */

class Factory_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function selectFactory($fname = null)
    {
        if($fname)
            $query = $this->db->get_where('factory', array(
                'fname' => $fname
            ));
        else
            $query = $this->db->get('factory');
        if($query->num_rows())
            return $query->result_array();
        else
            return FALSE;
    }

    public function addFactory($data)
    {
        $this->db->insert('factory', $data);
        $fid = $this->db->insert_id();
        $this->db->insert('fee', array(
            array(
                'fid'=>$fid,
                'type'=>1
            ),
            array(
                'fid'=>$fid,
                'type'=>2
            ),
            array(
                'fid'=>$fid,
                'type'=>3
            )
        ));
        if($this->db->affected_rows())
            return TRUE;
        else
            return FALSE;
    }
}