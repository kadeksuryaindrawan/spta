<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getMahasiswa()
	{
		$result = $this->db->get('mahasiswa');
		return $result;
	}

	public function insertMahasiswa()
	{
		$insert = array(
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'jurusan' => $this->input->post('jurusan'),
			'telp' => $this->input->post('telp'),
			'alamat' => $this->input->post('alamat'), 
		);
		$result = $this->db->insert('mahasiswa', $insert);
		return $return;
	}

	public function getDetailMahasiswa($id)
	{
		$this->db->where('id',$id);
		$result = $this->db->get('mahasiswa')->result_array();
		return $result[0];
	}

	public function editMahasiswa()
	{
		$edit = array(
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'jurusan' => $this->input->post('jurusan'),
			'telp' => $this->input->post('telp'),
			'alamat' => $this->input->post('alamat'), 
		);
		$this->db->where('id', $this->input->post('id'));
		$result = $this->db->update('mahasiswa', $edit);
		return $result;
	}

	public function deleteMahasiswa($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('mahasiswa');
		return $result;
	}

}

/* End of file M_mahasiswa.php */
/* Location: ./application/models/M_mahasiswa.php */