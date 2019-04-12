<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url','date'));
        $this->load->library(array('form_validation','email'));
        $this->load->model('login_model');
    }
	public function index()
	{
		$data['pageid']='Login';
		$username = $this->input->post("username");
        $password = $this->input->post("password");
        $this->form_validation->set_rules('username', 'User Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login',$data);
		}
		else{
			$usr_result = $this->login_model->getUser($username,$password);
			if ($usr_result > 0){
				$sessiondata = array(
						'username'  => $username,
						'loginuser' => TRUE
						);
						$this->session->set_userdata($sessiondata);
			redirect('home',$sessiondata);
			}
			else{
				$this->session->set_flashdata('msg', '<div class="message">
                                 <span class="message-content" style="color:#FF0000;">
									<i class="fa fa-info-circle"></i> Username and Password Incorrect
									<a href="login"><i class="fa fa-close pull-right"></i></a>
                                 </span>
                         </div>');
                    redirect('login');
			}
			
		}
	}

}
