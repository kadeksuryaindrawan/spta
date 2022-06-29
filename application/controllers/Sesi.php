<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('vsesi');
	}
	//set data session dalam bentuk array
	public function set()
	{
		$array = array(
			'username' => $this->input->post('username'),
			'role' => $this->input->post('role'),
			'nama' => $this->input->post('nama'), 
		);
		$this->session->set_userdata($array);
		redirect('sesi');
	}
	//menghapus semua session
	public function delall()
	{                                
		session_destroy();
		redirect('sesi');
	}
	//menghapus salah satu session
	public function delone()
	{
		$this->session->unset_userdata('role');
		redirect('sesi');
	}

}

/* End of file Sesi.php */
/* Location: ./application/controllers/Sesi.php */