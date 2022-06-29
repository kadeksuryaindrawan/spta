<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_latihan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function inputMhs()
	{
		$mhs = array(
			'nim_mahasiswa' => '2015354007',
			'nama_mahasiswa' => 'Surya Indrawan',
			'alamat_mahasiswa' => 'Denpasar',
			'id_jurusan' => 1, 
		);
		$result = $this->db->insert('tb_mahasiswa', $mhs);
		return $result;
	}

	public function getAllMhs()
	{
		$result = $this->db->get('tb_mahasiswa');
		return $result;
	}

	public function getMhsJurusan($id)
	{
		$this->db->where('id_jurusan',$id);
		$result = $this->db->get('tb_mahasiswa');
		return $result;
	}

	public function getMhs($id)
	{
		$this->db->where('id_mahasiswa',$id);
		$result = $this->db->get('tb_mahasiswa');
		return $result;
	}

	public function joinMhs()
	{
		$this->db->join('tb_jurusan', 'tb_mahasiswa.id_jurusan = tb_jurusan.id_jurusan');
		$result = $this->db->get('tb_mahasiswa');
		return $result;
	}

	public function updateMhs($id)
	{
		$mhs = array(
			'nim_mahasiswa' => '2015354010',
			'nama_mahasiswa' => 'Surya Indrawan Ganteng',
			'alamat_mahasiswa' => 'Denpasar Selatan',
			'id_jurusan' => 1, 
		);
		$this->db->where('id_mahasiswa', $id);
		$result = $this->db->update('tb_mahasiswa', $mhs);
		return $result;
	}

	public function deleteMhs($id)
	{
		$this->db->where('id_mahasiswa', $id);
		$result = $this->db->delete('tb_mahasiswa');
		return $result;
	}

}

/* End of file M_latihan.php */
/* Location: ./application/models/M_latihan.php */