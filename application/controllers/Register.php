<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }
    public function index()
    {
        $this->load->view('auth/register');
    }

    public function process()
    {
        $this->form_validation->set_rules('email', 'email','required|min_length[1]|max_length[100]|is_unique[users.email]');
        $this->form_validation->set_rules('name', 'name','required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('password', 'password','required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('repassword', 'repassword','required|min_length[5]|max_length[255]');
		
		if ($this->form_validation->run()==true)
	   	{
			$email = $this->input->post('email');
            $name = $this->input->post('name');
			$password = $this->input->post('password');
            $repassword = $this->input->post('repassword');

            if($password == $repassword){
                $this->Auth_model->register($email,$name,$password);
			    $this->session->set_flashdata('success_register','Register Berhasil!');
			    redirect('Login');
            }
			else{
                $this->session->set_flashdata('error_password','Password & Repassword tidak sama!');
                redirect('Register');
            }
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('Register');
		}
    }
}

/* End of file Register.php and path \application\controllers\Register.php */
