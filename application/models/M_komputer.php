<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_komputer extends CI_Model {

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
				'rules' => 'required|max_length[50]'
			],
			[
				'field' => 'stok',
				'label' => 'Stok',
				'rules' => 'required|numeric|max_length[3]'
			],
			[
				'field' => 'harga',
				'label' => 'Harga',
				'rules' => 'required|numeric'
			],
		];
	}

	public function getUser()
	{
		$result = $this->db->get('users');
		return $result;
	}

	public function getBarang()
	{
		$result = $this->db->get('barang_komputer');
		return $result;
	}

	public function insertBarang()
	{
		$insert = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'deskripsi' => $this->input->post('deskripsi'),
			'stok' => $this->input->post('stok'),
			'harga' => $this->input->post('harga'),
		);
		$result = $this->db->insert('barang_komputer', $insert);
		return $result;
	}

	public function getDetailBarang($id)
	{
		$this->db->where('id_barang_komputer',$id);
		$result = $this->db->get('barang_komputer')->result_array();
		return $result[0];
	}

	public function editBarang()
	{
		$edit = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'deskripsi' => $this->input->post('deskripsi'),
			'stok' => $this->input->post('stok'),
			'harga' => $this->input->post('harga')
		);
		$this->db->where('id_barang_komputer', $this->input->post('id_barang_komputer'));
		$result = $this->db->update('barang_komputer', $edit);
		return $result;
	}

	public function deleteBarang($id)
	{
		$this->db->where('id_barang_komputer', $id);
		$result = $this->db->delete('barang_komputer');
		return $result;
	}

	public function insertCheckout()
	{
		$insert = array(
			'email' => $this->input->post('email'),
			'total' => $this->input->post('total'),
			'id_user' => $this->input->post('id_user'),
		);
		$result = $this->db->insert('checkout_komputer', $insert);
		return $result;
	}

}

/* End of file M_komputer.php */
/* Location: ./application/models/M_komputer.php */