<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang');
	}

	public function index()
	{
		$data['barang'] = $this->M_barang->getBarang();
		$data['jenis'] = $this->M_barang->getJenis();
		$this->load->view('barang/hlm_barang', $data);
	}

	public function tambah()
	{
		$data['jenis'] = $this->M_barang->getJenis();
		$this->load->view('barang/hlm_tambah', $data);
	}

	public function tambahJenis()
	{
		$this->load->view('barang/hlm_tambahjenis');
	}

	public function add()
	{
		$rules = $this->M_barang->validation(); 
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			$data['jenis'] = $this->M_barang->getJenis();
			$this->load->view('barang/hlm_tambah', $data);
		}
		else{
			$this->M_barang->insertBarang();
			redirect('barang');
		}	
		
	}

	public function addJenis()
	{
		$rules = $this->M_barang->validationJenis(); 
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			$this->load->view('barang/hlm_tambahjenis');
		}
		else{
			$this->M_barang->insertJenis();
			redirect('barang');
		}
	}

	public function ubah($id)
	{
		$data['barang'] = $this->M_barang->getDetailBarang($id);
		$data['jenis'] = $this->M_barang->getJenis();
		$this->load->view('barang/hlm_edit', $data);
	}

	public function edit($id)
	{
		$rules = $this->M_barang->validation(); 
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			$data['barang'] = $this->M_barang->getDetailBarang($id);
			$data['jenis'] = $this->M_barang->getJenis();
			$this->load->view('barang/hlm_edit', $data);
		}
		else{
			$this->M_barang->editBarang();
			redirect('barang');
		}
	}

	public function ubahJenis($id)
	{
		$data['jenis'] = $this->M_barang->getDetailJenis($id);
		$this->load->view('barang/hlm_editJenis', $data);
	}

	public function editJenis($id)
	{
		$rules = $this->M_barang->validationJenis(); 
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			$data['jenis'] = $this->M_barang->getDetailJenis($id);
			$this->load->view('barang/hlm_editJenis', $data);
		}
		else{
			$this->M_barang->editJenis();
			redirect('barang');
		}
	}

	public function delete($id)
	{
		$this->M_barang->deleteBarang($id);
		redirect('barang');
	}

	public function deleteJenis($id)
	{
		$this->M_barang->deleteJenis($id);
		redirect('barang');
	}

	public function addCart($id)
	{
		$this->db->where('id_barang', $id);
		$barang = $this->db->get('barang')->result_array();
		$data = array(
			'id' => $barang[0]['id_barang'],
			'qty' => 1,
			'price' => $barang[0]['harga'],
			'name' => $barang[0]['nama_barang'],
			'options' => array('description' => $barang[0]['deskripsi']),
		);
		$this->cart->insert($data);
		redirect('barang');
	}

	public function keranjang()
	{
		$this->load->view('barang/keranjang');
	}

	public function deleteCart()
	{
		$this->cart->destroy();
		redirect('barang');
	}

	public function checkout()
	{
		$this->load->view('barang/checkout');
	}

	public function addCheckout()
	{
		$this->M_barang->insertCheckout();
		$this->cart->destroy();
		redirect('barang');	
	}

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */