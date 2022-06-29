<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_karyawan');
	}

	public function index()
	{
		$data['kar1'] = $this->M_karyawan->getKaryawan();
		$data['kar2'] = $this->M_karyawan->getKaryawan1();
		$data['kar3'] = $this->M_karyawan->getKaryawan2();
		$this->load->view('karyawan/karyawan', $data);
	}

	public function hitungcs($id)
	{
		$data['kar'] = $this->M_karyawan->getKaryawan();
		$this->load->view('karyawan/hitungcs', $data);
	}

	public function hitungstaff($id)
	{
		$data['kar'] = $this->M_karyawan->getKaryawan1();
		$this->load->view('karyawan/hitungstaff', $data);
	}

	public function hitungmanager($id)
	{
		$data['kar'] = $this->M_karyawan->getKaryawan2();
		$this->load->view('karyawan/hitungmanager', $data);
	}

	public function gajics()
	{
		$data['gaji'] = $this->M_karyawan->hitungGajics();
		$this->load->view('karyawan/gajics', $data);
	}

	public function gajistaff()
	{
		$data['gaji'] = $this->M_karyawan->hitungGajistaff();
		$this->load->view('karyawan/gajistaff', $data);
	}

	public function gajimanager()
	{
		$data['gaji'] = $this->M_karyawan->hitungGajimanager();
		$this->load->view('karyawan/gajimanager', $data);
	}

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */