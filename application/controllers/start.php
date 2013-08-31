<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->database();
        $this->load->helper('captcha');
    }

	public function index()
	{
        if($this->session->userdata('is_login'))
        {
            switch($this->session->userdata('type')){
                case 'admin':
                    redirect(base_url('admin/index'));
                    return;
                case 'check':
                    redirect(base_url('check/index'));
                    return;
                case 'user':
                    redirect(base_url('user/index'));
                    return;
            }
        }

        //验证码
        $vals = array(
            'img_path' => 'captcha/',
            'img_url' => base_url().'captcha/',
            'img_height'=>22,
            'img_width'=>70
        );
        $cap = create_captcha($vals);
        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );
        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);
		$this->load->view('start', $cap);
	}

    public function login()
    {
        $data = $this->input->post();
        $data = array_filter($data);
        if(!count($data))
            redirect(base_url());

        //验证码
        $expiration = time()-7200;
        $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
        $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $binds = array($data['check'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        if ($row->count == 0)
        {
            redirect(base_url());
        }

        $result = $this->user_model->login_validate($data);
        if($result != FALSE)
        {
            $this->session->set_userdata(array(
                'is_login'=> 1,
                'uid'=>$result['uid'],
                'fid'=>$result['fid'],
                'fname'=>$result['fname'],
                'usrname'=>$result['usrname'],
                'usertype'=>$result['type']
            ));
            redirect(base_url('user'));
        }
        else{
            redirect(base_url());
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */