<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_barang extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function validation()
	{
		return [
			[
				'field' => 'nama_barang',
				'label' => 'Nama Barang',
				'rules' => 'required|max_length[32]'
			],
			[
				'field' => 'deskripsi',
				'label' => 'Deskripsi',
				'rules' => 'required|max_length[32]'
			],
			[
				'field' => 'qty',
				'label' => 'Jumlah',
				'rules' => 'required|numeric|max_length[3]'
			],
			[
				'field' => 'harga',
				'label' => 'Harga',
				'rules' => 'required|numeric'
			],
			[
				'field' => 'id_jenisbarang',
				'label' => 'Jenis Barang',
				'rules' => 'required'
			],
			
		];
	}

	public function validationJenis()
	{
		return [
			[
				'field' => 'nama_jenis',
				'label' => 'Nama Jenis',
				'rules' => 'required|max_length[32]|is_unique[jenis_barang.nama_jenis]'
			],
			
		];
	}

	public function getBarang()
	{
		$this->db->join('jenis_barang', 'barang.id_jenisbarang = jenis_barang.id_jenisbarang');
		$result = $this->db->get('barang');
		return $result;
	}

	public function getJenis()
	{
		$result = $this->db->get('jenis_barang');
		return $result;
	}

	public function insertBarang()
	{
		$insert = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'deskripsi' => $this->input->post('deskripsi'),
			'qty' => $this->input->post('qty'),
			'harga' => $this->input->post('harga'),
			'id_jenisbarang' => $this->input->post('id_jenisbarang'), 
		);
		$result = $this->db->insert('barang', $insert);
		return $result;
	}

	public function insertJenis()
	{
		$insert = array(
			'nama_jenis' => $this->input->post('nama_jenis'),
		);
		$result = $this->db->insert('jenis_barang', $insert);
		return $result;
	}

	public function getDetailBarang($id)
	{
		$this->db->where('id_barang',$id);
		$result = $this->db->get('barang')->result_array();
		return $result[0];
	}

	public function editBarang()
	{
		$edit = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'deskripsi' => $this->input->post('deskripsi'),
			'qty' => $this->input->post('qty'),
			'harga' => $this->input->post('harga'),
			'id_jenisbarang' => $this->input->post('id_jenisbarang'), 
		);
		$this->db->where('id_barang', $this->input->post('id_barang'));
		$result = $this->db->update('barang', $edit);
		return $result;
	}

	public function getDetailJenis($id)
	{
		$this->db->where('id_jenisbarang',$id);
		$result = $this->db->get('jenis_barang')->result_array();
		return $result[0];
	}

	public function editJenis()
	{
		$edit = array(
			'nama_jenis' => $this->input->post('nama_jenis'),
		);
		$this->db->where('id_jenisbarang', $this->input->post('id_jenisbarang'));
		$result = $this->db->update('jenis_barang', $edit);
		return $result;
	}

	public function deleteBarang($id)
	{
		$this->db->where('id_barang', $id);
		$result = $this->db->delete('barang');
		return $result;
	}

	public function deleteJenis($id)
	{
		$this->db->where('id_jenisbarang', $id);
		$result = $this->db->delete('jenis_barang');
		return $result;
	}

	public function insertCheckout()
	{
		$insert = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'total' => $this->input->post('total'),
		);
		$result = $this->db->insert('checkout', $insert);
		return $result;
	}

}

/* End of file M_barang.php */
/* Location: ./application/models/M_barang.php */