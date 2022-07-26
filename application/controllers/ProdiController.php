<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class ProdiController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Prodi_model');
        $this->load->model('Auth_model');
        $this->Auth_model->cek_login();
    }
    public function index()
    {
        $data['prd'] = $this->Prodi_model->getProdi();

        $this->load->view('widget/header');
        $this->load->view('admin/prodi',$data);
        $this->load->view('widget/footer');  
    }

    public function tambah()
    {
        $this->load->view('widget/header');
        $this->load->view('admin/tambah-prodi');
        $this->load->view('widget/footer');  
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_prodi', 'nama prodi','required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('kode_prodi', 'prodi','required|is_unique[prodi.kode_prodi]');
		
		if ($this->form_validation->run()==true){
            $this->Prodi_model->insertProdi();
            $this->session->set_flashdata('success','Berhasil menambah prodi!');
            redirect('ProdiController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('ProdiController/tambah');
        }
        
    }

    public function delete($id)
	{
		$this->Prodi_model->deleteProdi($id);
        $this->session->set_flashdata('success','Berhasil menghapus prodi!');
		redirect('ProdiController');
	}

    public function edit($id)
	{
        $data['prd'] = $this->Prodi_model->getDetailProdi($id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-prodi',$data);
        $this->load->view('widget/footer'); 
	}

    public function editProcess($id)
	{
		$this->form_validation->set_rules('nama_prodi', 'nama prodi','required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('kode_prodi', 'prodi','required');
		
		if ($this->form_validation->run()==true){
			$this->Prodi_model->editProdi();
            $this->session->set_flashdata('success','Data prodi berhasil diedit!');
			redirect('ProdiController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('ProdiController/edit/'.$this->input->post('kode_prodi'));
        }
	}
}

/* End of file ProdiController.php and path \application\controllers\ProdiController.php */
