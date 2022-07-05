<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function process()
	{
		$email= $this->input->post('email');
		$password = $this->input->post('password');

		$query = $this->db->get_where('users',array('email'=>$email));
        $user = $query->row();
        $level = $user->level;
            if(password_verify($password, $user->password)) {
                $this->session->set_userdata('email',$email);
				$this->session->set_userdata('name',$user->name);
				$this->session->set_userdata('is_login',TRUE);

                if($level == 'admin'){
					redirect('Dashboard/admin');
				}
				elseif($level == 'dosen'){
					redirect('Dashboard/dosen');
				}
				elseif($level == 'mahasiswa'){
					redirect('Dashboard/mahasiswa');
				}
				else{
					redirect('Login');
				}
            } else {
                $this->session->set_flashdata('error','Username / Password Tidak Sesuai');
				redirect('Login');
            }
	}

	public function logout()
	{                                
		session_destroy();
		redirect('Login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */