<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_mahasiswa');
	}

	public function index()
	{
		$data['mhs'] = $this->M_mahasiswa->getMahasiswa();
		$this->load->view('mahasiswa/hlm_mhs', $data);
	}

	public function tambah()
	{
		$this->load->view('mahasiswa/hlm_tambah');
	}

	public function add()
	{
		$this->M_mahasiswa->insertMahasiswa();
		redirect('mahasiswa');
	}

	public function ubah($id)
	{
		$data['mhs'] = $this->M_mahasiswa->getDetailMahasiswa($id);
		$this->load->view('mahasiswa/hlm_edit', $data);
	}

	public function edit()
	{
		$this->M_mahasiswa->editMahasiswa();
		redirect('mahasiswa');
	}

	public function delete($id)
	{
		$this->M_mahasiswa->deleteMahasiswa($id);
		redirect('mahasiswa');
	}

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */