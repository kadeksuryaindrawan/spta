<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_karyawan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getKaryawan()
	{
		$kar =  array(
			'id' => 1,
			'jabatan' => 'Cleaning Service',
			'gajipokok' => 100000,
			'tunjangan' => 100000
		);
		return $kar;
	}

	public function getKaryawan1()
	{
		$kar =  array(
			'id' => 2,
			'jabatan' => 'Staff',
			'gajipokok' => 100000,
			'uangmakan' => 50000
		);
		return $kar;
	}

	public function getKaryawan2()
	{
		$kar =  array(
			'id' => 3,
			'jabatan' => 'Manager',
			'gajipokok' => 300000,
			'uangmakan' => 50000,
			'bonus' => 1000000,
		);
		return $kar;
	}

	public function hitungGajics()
	{
		$gajipokok = $this->input->post('gajipokok');
		$tunjangan = $this->input->post('tunjangan');
		$hari = $this->input->post('hari');

		$gajics = ($gajipokok*$hari)+$tunjangan;

		return $gajics;
	}

	public function hitungGajistaff()
	{
		$gajipokok = $this->input->post('gajipokok');
		$uangmakan = $this->input->post('uangmakan');
		$hari = $this->input->post('hari');

		$gajics = ($gajipokok + $uangmakan)*$hari;

		return $gajics;
	}

	public function hitungGajimanager()
	{
		$gajipokok = $this->input->post('gajipokok');
		$uangmakan = $this->input->post('uangmakan');
		$bonus = $this->input->post('bonus');
		$hari = $this->input->post('hari');

		$gajics = ($gajipokok + $uangmakan) * $hari + $bonus;

		return $gajics;
	}

}

/* End of file M_karyawan.php */
/* Location: ./application/models/M_karyawan.php */