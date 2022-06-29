<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komputer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_komputer');
	}

	public function index()
	{
		$this->load->view('komputer/vlogin');
	}

	public function indexAdmin()
	{
		$this->load->view('admin/vuser');
	}

	public function indexUser()
	{
		$this->load->view('pembeli/vuser');
	}

	public function loginProcess()
	{
		$data = $this->M_komputer->getUser();
		$r = $data->result_array();

		$usernameAdmin = $r[0]['username'];
		$passwordAdmin = $r[0]['password'];

		$usernamePembeli = $r[1]['username'];
		$passwordPembeli = $r[1]['password'];

		$usernameForm = $this->input->post('username');
		$passwordForm = $this->input->post('password');

		if($usernameAdmin == $usernameForm && $passwordAdmin == $passwordForm){
			$this->session->set_userdata($r[0]);
			redirect('komputer/indexAdmin');
				
		}
		else if($usernamePembeli == $usernameForm && $passwordPembeli == $passwordForm){
			$this->session->set_userdata($r[1]);
			redirect('komputer/indexUser');
		}
		
	}

	public function logout()
	{                                
		session_destroy();
		redirect('komputer');
	}

	public function barang()
	{
		$data['barang'] = $this->M_komputer->getBarang();
		$this->load->view('admin/hlm_barang', $data);
	}

	public function tambah()
	{
		$this->load->view('admin/hlm_tambah');
	}

	public function add()
	{
		$rules = $this->M_komputer->validation(); 
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/hlm_tambah');
		}
		else{
			$this->M_komputer->insertBarang();
			redirect('komputer/barang');
		}	
		
	}

	public function ubah($id)
	{
		$data['barang'] = $this->M_komputer->getDetailBarang($id);
		$this->load->view('admin/hlm_edit', $data);
	}

	public function edit($id)
	{
		$rules = $this->M_komputer->validation(); 
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			$data['barang'] = $this->M_komputer->getDetailBarang($id);
			$this->load->view('admin/hlm_edit', $data);
		}
		else{
			$this->M_komputer->editBarang();
			redirect('komputer/barang');
		}
	}

	public function delete($id)
	{
		$this->M_komputer->deleteBarang($id);
		redirect('komputer/barang');
	}

	public function beli()
	{
		$data['barang'] = $this->M_komputer->getBarang();
		$this->load->view('pembeli/hlm_beli', $data);
	}

	public function addCart($id)
	{
		$this->db->where('id_barang_komputer', $id);
		$barang = $this->db->get('barang_komputer')->result_array();
		$data = array(
			'id' => $barang[0]['id_barang_komputer'],
			'qty' => 1,
			'price' => $barang[0]['harga'],
			'name' => $barang[0]['nama_barang'],
			'options' => array('description' => $barang[0]['deskripsi']),
		);
		
		$stok = $barang[0]['stok'];

		$stokUpdate = $stok-1;

		$edit = array(
			'stok' => $stokUpdate,
		);

		$this->db->where('id_barang_komputer', $id);
		$this->db->update('barang_komputer', $edit);

		$this->cart->insert($data);
		redirect('komputer/beli');
	}

	public function keranjang()
	{
		$this->load->view('pembeli/keranjang');
	}

	public function deleteCart()
	{
		$this->cart->destroy();
		redirect('komputer/beli');
	}

	public function checkout()
	{
		
		$this->load->view('pembeli/checkout');
	}

	public function addCheckout()
	{
		$this->M_komputer->insertCheckout();
		$this->cart->destroy();
		redirect('komputer/beli');	
	}

}

/* End of file Komputer.php */
/* Location: ./application/controllers/Komputer.php */