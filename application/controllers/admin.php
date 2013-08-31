<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: dhc
 * Date: 13-8-31
 * Time: 下午7:06
 * To change this template use File | Settings | File Templates.
 */

class Admin extends CI_Controller
{
    private $uid;
    private $fid;
    private $data;

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != 1 || $this->session->userdata('usertype') > 0)
            redirect();

        $this->load->model('factory_model');

        //私有变量初始化
        $this->uid = $this->session->userdata('uid');
        $this->fid = $this->session->userdata('fid');
        $this->usertype = $this->session->userdata('usertype');
        $this->data['fname'] = $this->session->userdata('fname');
        $this->data['usrname'] = $this->session->userdata('usrname');
    }

    public function manage($type = null)
    {
        $data = $this->input->post();
        if (!$data) {
            if(!$type){
                $this->load->view('user/header', $this->data);
                $this->load->view('admin/manage');
            }
            else{
                $this->load->view('user/header', $this->data);
                $this->load->view('admin/addfactory');
            }
        } else {
            switch($type){
                case 'select':
                    $data = trim($data['fname']);
                    if(strlen($data) == 0)
                        $result = $this->factory_model->selectFactory();
                    else
                        $result = $this->factory_model->selectFactory($data);
                    if($result){
                        $result['factory'] = $result;
                        $this->load->view('user/header', $this->data);
                        $this->load->view('admin/manage', $result);
                    }
                    else{
                        $this->session->set_flashdata('err', '没有找到');
                        redirect(base_url('admin/manage'));
                    }
                    break;
                case 'add':
                    $data['fname'] = trim($data['fname']);
                    $data['contactman'] = trim($data['contactman']);
                    $data['contactnumber'] = trim($data['contactnumber']);
                    $data['info'] = trim($data['info']);
                    $data = array_filter($data);
                    if(count($data) < 4){
                        $this->session->set_flashdata('err', '信息不完整');
                        redirect(base_url('admin/manage/add'));
                    }
                    $data['ip'] = $this->input->ip_address();
                    if($this->factory_model->addFactory($data)){
                        $this->session->set_flashdata('err', '添加成功');
                        redirect(base_url('admin/manage/add'));
                    }
                    else{
                        $this->session->set_flashdata('err', '添加失败');
                        redirect(base_url('admin/manage/add'));
                    }
                    break;
                case 'del':
                    $data = trim($data['fname']);
                    if(strlen($data) == 0)
                        redirect(base_url('admin/manage'));
                    break;
            }
        }
    }
}