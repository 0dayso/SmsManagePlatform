<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-30
 * Time: 下午10:55
 * To change this template use File | Settings | File Templates.
 */

class Fee_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_factory_fee($fid, $type = 0)
    {
        //type取值 1:移动 2:联通 3:电信
        $remain = 0;
        switch($type){
            case 0:
                $query = $this->db->get_where('fee', array('fid' => $fid));
                foreach($query->result_array() as $row)
                {
                    $remain += $row['remain'];
                }
                break;
            default:
                $query = $this->db->get_where('fee', array('fid' => $fid,
                'type'=> $type));
                $remain = $query->row_array();
                $remain = $remain['remain'];
                break;
        }
        return $remain;
    }

    public function update_factory_fee($fid, $type, $data)
    {
        $this->db->where('type',$type);
        $this->db->where('fid', $fid);
        $this->db->update('fee', array(
            'remain'=>$data
        ));
        return TRUE;
    }
}