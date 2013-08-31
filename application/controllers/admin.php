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
        $this->load->model('user_model');
        $this->load->model('fee_model');

        //私有变量初始化
        $this->uid = $this->session->userdata('uid');
        $this->fid = $this->session->userdata('fid');
        $this->usertype = $this->session->userdata('usertype');
        $this->data['fname'] = $this->session->userdata('fname');
        $this->data['usrname'] = $this->session->userdata('usrname');
        $mobilefee = $this->fee_model->get_factory_fee($this->fid, 1);
        $unicomfee = $this->fee_model->get_factory_fee($this->fid, 2);
        $telecomfee = $this->fee_model->get_factory_fee($this->fid, 3);
        $this->data['fee'] = array($mobilefee, $unicomfee, $telecomfee);
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
                default:
                    redirect(base_url('admin/manage'));
            }
        }
    }

    public function usermanage($type = null)
    {
        $data = $this->input->post();
        $commondata['factory'] = $this->factory_model->selectFactory();
        if (!$data) {
            if(!$type){
                $this->load->view('user/header', $this->data);
                $this->load->view('admin/usermanage', $commondata);
            }
            else{
                $this->load->view('user/header', $this->data);
                $this->load->view('admin/adduser', $commondata);
            }
        } else {
            switch($type){
                case 'select':
                    $data['usrname'] = trim($data['usrname']);
                    $result = $this->user_model->selectUser($data['usrname'], $data['fid']);
                    if($result){
                        $commondata['user'] = $result;
                        $this->load->view('user/header', $this->data);
                        $this->load->view('admin/usermanage', $commondata);
                    }
                    else{
                        $this->session->set_flashdata('err', '没有找到');
                        redirect(base_url('admin/usermanage'));
                    }
                    break;
                case 'add':
                    $data = array_filter($data);
                    if(count($data) < 4){
                        $this->session->set_flashdata('err', '请填写完整');
                        redirect(base_url('admin/usermanage/add'));
                    }
                    else{
                        $data['usrname'] = trim($data['usrname']);
                        $data['info'] = trim($data['info']);
                        if($this->user_model->addUser($data)){
                            $this->session->set_flashdata('err', '添加成功');
                            redirect(base_url('admin/usermanage/add'));
                        }
                        else{
                            $this->session->set_flashdata('err', '添加失败');
                            redirect(base_url('admin/usermanage/add'));
                        }
                    }
            }
        }
    }

    public function charge($type = null, $fname = '')
    {
        $data = $this->input->post();
        if (!$data) {
            if(!$type){
                $this->load->view('user/header', $this->data);
                $this->load->view('admin/charge');
            }
            else{
                if(!strlen($fname)){
                    redirect('admin/charge');
                }

                $this->load->view('user/header', $this->data);
                $data['fname'] = urldecode($fname);
                $result = $this->factory_model->selectFactory($data['fname']);
                $fid = $result[0]['fid'];
                $mobilefee = $this->fee_model->get_factory_fee($fid, 1);
                $unicomfee = $this->fee_model->get_factory_fee($fid, 2);
                $telecomfee = $this->fee_model->get_factory_fee($fid, 3);
                $data['fee'] = array($mobilefee, $unicomfee, $telecomfee);
                $this->load->view('admin/addcharge',$data);
            }
        } else {
            switch($type){
                case 'select':
                    $data['fname'] = trim($data['fname']);
                    if(strlen($data['fname']))
                        $result = $this->factory_model->selectFactory($data['fname']);
                    else
                        $result = $this->factory_model->selectFactory();
                    if($result){
                        $fee = array();
                        foreach($result as $item)
                        {
                            $tmp[1] = $this->fee_model->get_factory_fee($item['fid'], 1);
                            $tmp[2] = $this->fee_model->get_factory_fee($item['fid'], 2);
                            $tmp[3] = $this->fee_model->get_factory_fee($item['fid'], 3);
                            array_push($fee, array(
                                'fname'=>$item['fname'],
                                'type'=>$tmp
                            ));
                        }
                        $fee['feeresult'] = $fee;
                        $this->load->view('user/header', $this->data);
                        $this->load->view('admin/charge', $fee);
                    }
                    else{
                        $this->session->set_flashdata('err', '没有找到');
                        redirect(base_url('admin/charge'));
                    }
                    break;
                case 'add':
                    $data['fname'] = trim($data['fname']);
                    $data = array_filter($data);
                    if(count($data) < 2){
                        $this->session->set_flashdata('err', '请填写完整');
                        redirect(base_url('admin/charge/add'));
                    }
                    else{
                        $fid = $this->factory_model->selectFactory($data['fname']);
                        if(!$fid){
                            $this->session->set_flashdata('err', '没有找到企业');
                            redirect(base_url('admin/charge/add'));
                        }
                        else{
                            unset($data['fname']);
                            foreach($data as $key => $val){
                                $val = (int)$val;
                                switch($key){
                                    case 'mobile':
                                        $type = 1;
                                        break;
                                    case 'unicom':
                                        $type = 2;
                                        break;
                                    case 'telecom':
                                        $type = 3;
                                        break;
                                }
                                if(!$this->fee_model->update_factory_fee($fid[0]['fid'], $type, $this->data['fee'][$type-1]+$val)){
                                    $this->session->set_flashdata('err', '操作失败!');
                                    redirect(base_url('admin/charge/add'));
                                }
                            }
                            $this->session->set_flashdata('err', '充值成功');
                            redirect(base_url('admin/charge/add'));
                        }
                    }

            }
        }
    }
}