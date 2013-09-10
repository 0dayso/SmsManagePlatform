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
        if ($this->session->userdata('is_login') != 1 || $this->session->userdata('usertype') != 1)
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


    public function intercept($type = null, $page = 0)
    {
        $data = $this->input->post();
        if (!$data) {
            $data['page'] = $page;
            $this->load->view('user/header', $this->data);
            $this->load->view('check/intercept', $data);
        } else {
            switch ($type) {
                case 'select':
                    $this->session->set_flashdata($data);
                    $data = array_filter($data);
                    $result = $this->sms_model->getUnchecksms($data, $page);
                    $totalresult = $this->sms_model->getUnchecksms($data, $page, null, TRUE);
                    $result['unchecksms'] = $result;
                    $result['page'] = $page;
                    $result['total'] = count($totalresult);
                    $this->load->view('user/header', $this->data);
                    $this->load->view('check/intercept', $result);
                    break;
                case 'accept':
                    $data = array_filter($data);
                    foreach ($data['checkbox'] as $item) {
                        $this->sms_model->acceptSMS($item, 1);
                    }
                    $this->session->set_flashdata('err', '审核通过');
                    redirect(base_url('check/intercept'));
                    break;
                case 'reject':
                    break;
            }
        }
    }

    public function uniquesms($page = 0)
    {
        $data = $this->input->post();
        if (!$data) {
            $data['page'] = $page;
            $this->load->view('user/header', $this->data);
            $this->load->view('check/uniquesms', $data);
        } else {
            $this->session->set_flashdata($data);
            $data = array_filter($data);
            $result = $this->sms_model->getUnchecksms($data, $page, TRUE);
            $result['uniquesms'] = $result;
            $result['page'] = $page;
            $this->load->view('user/header', $this->data);
            $this->load->view('check/uniquesms', $result);
        }
    }

    public function fishsms($page = 0)
    {
        $data = $this->input->post();
        if (!$data) {
            $data['page'] = $page;
            $this->load->view('user/header', $this->data);
            $this->load->view('check/fishsms', $data);
        } else {
            $this->session->set_flashdata($data);
            $data = array_filter($data);
            $result = $this->sms_model->getFishsms($data, $page);
            $result['fishsms'] = $result;
            $result['page'] = $page;
            $this->load->view('user/header', $this->data);
            $this->load->view('check/fishsms', $result);
        }
    }

    public function output($page = 0, $csid = null, $gatetype = null)
    {
        $data = $this->input->post();
        if (!$data) {
            if(!$csid || !$gatetype){
                $data['page'] = $page;
                $this->load->view('user/header', $this->data);
                $this->load->view('check/output', $data);
            }
            else{
                $result = $this->sms_model->getOutput($csid, $gatetype);
                if($result){
                    $tmp = '';
                    foreach($result as $item){
                        $tmp = $tmp.$item['snumber'];
                    }
                    $this->output->set_content_type('text/csv')->set_output($tmp);
                }
                else{
                    $this->session->set_flashdata('err', '非法操作');
                    redirect(base_url('check/output'));
                }
            }
        } else {
            $this->session->set_flashdata($data);
            $data = array_filter($data);
            $result = $this->sms_model->getUnchecksms($data, $page);
            $result['output'] = $result;
            $result['page'] = $page;
            $this->load->view('user/header', $this->data);
            $this->load->view('check/output', $result);
        }
    }
}