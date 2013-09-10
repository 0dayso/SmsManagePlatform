<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-31
 * Time: 上午12:40
 * To change this template use File | Settings | File Templates.
 */
class Phrase_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function addPhrase($data)
    {
        $this->db->insert('phrases', $data);
        if($this->db->affected_rows() == 1)
            return TRUE;
        else
            return FALSE;
    }

    public function selectPhrase($data, $uid, $page = null)
    {
        $this->db->select('*');
        $this->db->from('phrases, phrasegroup');
        $this->db->where('phrases.pgid = phrasegroup.pgid');
        if(isset($data['pgroup']))
            $this->db->where('phrasegroup.pgid', $data['pgroup']);
        $this->db->where('phrases.uid', $uid);
        if(isset($page))
            $this->db->limit(5, $page * 5);
        $query = $this->db->get();
        if($query->num_rows()){
            $result['numrow'] = $query->num_rows();
            $result['result'] = $query->result_array();
            return $result;
        }
        else
            return FALSE;
    }

    public function addPhrasegroup($data)
    {
        $this->db->insert('phrasegroup', $data);
        if($this->db->affected_rows())
            return TRUE;
        else
            return FALSE;
    }

    public function selectPhrasegroup($uid, $pgname = null)
    {
        $this->db->where('uid', $uid);
        if($pgname)
            $this->db->where('pgname', $pgname);
        $query = $this->db->get('phrasegroup');
        if($query->num_rows()){
            return $query->result_array();
        }
        else
            return FALSE;
    }

    public function delPhrase($pid)
    {
        $this->db->delete('phrases',array(
            'pid'=>$pid
        ));
        return TRUE;
    }

    public function delPhrasegroup($pgid)
    {
        $this->db->delete('phrasegroup',array(
            'pgid'=>$pgid
        ));
        $this->db->delete('phrase', array(
            'pgid'=>$pgid
        ));
        return TRUE;
    }
}