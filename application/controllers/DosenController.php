<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class DosenController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->model('Auth_model');
        $this->Auth_model->cek_login();
    }
    public function index()
    {
        $data['dosen'] = $this->Dosen_model->getDosen();
        $this->load->view('widget/header');
        $this->load->view('admin/dosen',$data);
        $this->load->view('widget/footer');  
    }

    public function tambah()
    {
        $data['prd'] = $this->Dosen_model->getProdi();
        $this->load->view('widget/header');
        $this->load->view('admin/tambah-dosen',$data);
        $this->load->view('widget/footer');  
    }

    public function add()
    {
        $this->form_validation->set_rules('email', 'email','required|min_length[1]|max_length[100]|is_unique[users.email]');
        $this->form_validation->set_rules('name', 'nama','required|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('password', 'password','required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('repassword', 'repassword','required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('nip', 'NIP','required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('alamat', 'alamat','required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('kode_prodi', 'prodi','required');
		
		if ($this->form_validation->run()==true){
            $this->Dosen_model->insertDosen();
            $this->session->set_flashdata('success','Berhasil menambah dosen!');
            redirect('DosenController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('DosenController/tambah');
        }
        
    }

    public function delete($id)
	{
		$this->Dosen_model->deleteDosen($id);
        $this->session->set_flashdata('success','Berhasil menghapus dosen!');
		redirect('DosenController');
	}

    public function edit($id)
	{
        $data['prd'] = $this->Dosen_model->getProdi();
        $data['dosen'] = $this->Dosen_model->getDetailDosen($id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-dosen',$data);
        $this->load->view('widget/footer'); 
	}

    public function editProcess($id)
	{
		$this->form_validation->set_rules('email', 'email','required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('name', 'nama','required|min_length[2]|max_length[255]');
        $this->form_validation->set_rules('nip', 'NIP','required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('alamat', 'alamat','required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('kode_prodi', 'prodi','required');
		
		if ($this->form_validation->run()==true){
			$this->Dosen_model->editDosen();
            $this->session->set_flashdata('success','Data dosen berhasil diedit!');
			redirect('DosenController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('DosenController/edit/'.$this->input->post('user_id'));
        }
	}

    public function ubahPassword($user_id)
    {
        $data['dosen'] = $this->Dosen_model->getDetailDosen($user_id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-password',$data);
        $this->load->view('widget/footer');
    }

    public function ubahPasswordProcess($user_id)
	{
        $this->form_validation->set_rules('password', 'password baru','min_length[5]|max_length[255]');
		if ($this->form_validation->run()==true){
			$this->Dosen_model->ubahPassword();
            $this->session->set_flashdata('success','Password dosen berhasil diubah!');
			redirect('DosenController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('DosenController/ubahPassword/'.$this->input->post('user_id'));
        }
			
	}
}

/* End of file DosenController.php and path \application\controllers\DosenController.php */
