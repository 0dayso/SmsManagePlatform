<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-9-1
 * Time: 下午10:27
 * To change this template use File | Settings | File Templates.
 */

class Check extends CI_Controller
{

    private $uid;
    private $fid;
    private $data;

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != 1 || $this->session->userdata('usertype') !=1)
            redirect();

        $this->load->model('factory_model');
        $this->load->model('user_model');
        $this->load->model('fee_model');
        $this->load->model('sms_model');

        $this->uid = $this->session->userdata('uid');
        $this->fid = $this->session->userdata('fid');
        $this->usertype = $this->session->userdata('usertype');
        $this->data['fname'] = $this->session->userdata('fname');
        $this->data['usrname'] = $this->session->userdata('usrname');
        $this->data['usertype'] = $this->usertype;
    }

    public function index()
    {
        $this->load->view('user/header', $this->data);
        $this->load->view('user/welcome', $this->data);
    }


    public function intercept($type = null)
    {
        $data = $this->input->post();
        if (!$data) {
            $this->load->view('user/header', $this->data);
            $this->load->view('check/intercept');
        } else {
            switch($type){
                case 'select':
                    $data = array_filter($data);
                    $result = $this->sms_model->getUnchecksms($data);
                    $result['unchecksms'] = $result;
                    $this->load->view('user/header', $this->data);
                    $this->load->view('check/intercept', $result);
                    break;
                case 'accept':
                    break;
                case 'reject':
                    break;
            }
        }
    }
}