<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
	}

	public function index()
	{
		$this->load->view('vlogin');
	}

	public function indexUser()
	{
		$this->load->view('vuser');
	}

	public function loginProcess()
	{
		$data = $this->M_user->admin();

		$username = $data['username'];
		$password = $data['password'];

		$usernameForm = $this->input->post('username');
		$passwordForm = $this->input->post('password');

		if($username == $usernameForm && $password == $passwordForm){
			$this->session->set_userdata($data);
			redirect('login/indexUser');
		}
		else{
			redirect('login');
		}

	}

	public function logout()
	{                                
		session_destroy();
		redirect('login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */