<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class TAController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TA_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Dosen_model');
        $this->load->model('Auth_model');
        $this->Auth_model->cek_login();
    }
    public function index()
    {
        $data['ta'] = $this->TA_model->getTA();
        $this->load->view('widget/header');
        $this->load->view('admin/ta',$data);
        $this->load->view('widget/footer'); 
    }

    public function tambah()
    {
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingMahasiswaNull2();
        $this->load->view('widget/header');
        $this->load->view('admin/tambah-ta',$data);
        $this->load->view('widget/footer');  
    }

    public function add()
    {
        $this->form_validation->set_rules('nim', 'Mahasiswa','required|is_unique[ta.nim]');
        $this->form_validation->set_rules('judul', 'Judul','required|min_length[2]|max_length[255]');
		
		if ($this->form_validation->run()==true){
            $this->TA_model->insertTA();
            $this->session->set_flashdata('success','Berhasil menambah tugas akhir mahasiswa!');
            redirect('TAController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('TAController/tambah');
        }
        
    }

    public function lihatFile($id)
    {
        $query = $this->db->get_where('ta', array('ta_id' => $id))->row();
        $filename = FCPATH.'/upload/ta/'.$query->file;
        header("Content-type: application/pdf");
        header('Content-Disposition: inline; filename="' . $filename . '"'); 
        @readfile($filename);
    }

    public function lihatPenguji($id)
    {
        $ta = $this->db->get_where('ta',array('ta_id'=>$id))->row();
        $penguji1 = $ta->penguji1;
        $penguji2 = $ta->penguji2;
        $nim = $ta->nim;

        $data['mhs'] = $this->db->get_where('mahasiswa',array('nim'=>$nim))->row();
        $data['penguji1'] = $this->db->get_where('penguji1',array('nip'=>$penguji1))->row();
        $data['penguji2'] = $this->db->get_where('penguji2',array('nip'=>$penguji2))->row();

        $this->load->view('widget/header');
        $this->load->view('admin/lihat-penguji-ta',$data);
        $this->load->view('widget/footer');  
    }

    public function delete($id)
	{
		$this->TA_model->deleteTA($id);
        $this->session->set_flashdata('success','Berhasil menghapus TA mahasiswa!');
		redirect('TAController');
	}

    public function edit($id)
	{
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingMahasiswaNull2();
        $data['ta'] = $this->TA_model->getDetailTA($id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-ta',$data);
        $this->load->view('widget/footer'); 
	}

    public function editProcess()
	{
		$this->form_validation->set_rules('nim', 'Mahasiswa','required');
        $this->form_validation->set_rules('judul', 'Judul','required|min_length[2]|max_length[255]');
		
		if ($this->form_validation->run()==true){
			$this->TA_model->editTA();
            $this->session->set_flashdata('success','Data TA berhasil diedit!');
			redirect('TAController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('TAController/edit/'.$this->input->post('ta_id'));
        }
	}

    public function bimbingan()
    {
        $data['bimbingan'] = $this->TA_model->getBimbingan();
        $this->load->view('widget/header');
        $this->load->view('admin/bimbingan-ta',$data);
        $this->load->view('widget/footer');  
    }

    public function tambahBimbingan()
    {
        $data['ta'] = $this->TA_model->getTABimbingan();
        $this->load->view('widget/header');
        $this->load->view('admin/tambah-bimbingan-ta',$data);
        $this->load->view('widget/footer');  
    }

    public function addBimbingan()
    {
        $this->form_validation->set_rules('ta_id', 'TA','required');
        $this->form_validation->set_rules('waktu_bimbingan', 'Waktu Bimbingan','required');
        $this->form_validation->set_rules('link', 'Link Meet','required');
		
		if ($this->form_validation->run()==true){
            $this->TA_model->insertBimbinganTA();
            $this->session->set_flashdata('success','Berhasil menambah bimbingan TA mahasiswa!');
            redirect('TAController/bimbingan');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('TAController/tambahBimbingan');
        }
        
    }

    public function editBimbingan($id)
	{
        $data['ta'] = $this->TA_model->getTABimbingan();
        $data['bimbingan'] = $this->TA_model->getDetailBimbinganTA($id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-bimbingan-ta',$data);
        $this->load->view('widget/footer'); 
	}

    public function editBimbinganProcess()
	{
		$this->form_validation->set_rules('ta_id', 'TA','required');
        $this->form_validation->set_rules('waktu_bimbingan', 'Waktu Bimbingan','required');
        $this->form_validation->set_rules('link', 'Link Meet','required');

		if ($this->form_validation->run()==true){
			$this->TA_model->editBimbinganTA();
            $this->session->set_flashdata('success','Data bimbingan berhasil diedit!');
			redirect('TAController/bimbingan');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('TAController/editBimbingan/'.$this->input->post('bimbingan_ta_id'));
        }
	}

    public function deleteBimbingan($id)
	{
		$this->TA_model->deleteBimbinganTA($id);
        $this->session->set_flashdata('success','Berhasil menghapus bimbingan mahasiswa!');
		redirect('TAController/bimbingan');
	}

    public function penguji($id)
    {
        $data['dosen'] = $this->Dosen_model->getDosen();
        $data['ta'] = $this->TA_model->getDetailTA($id);
        $this->load->view('widget/header');
        $this->load->view('admin/penguji-ta',$data);
        $this->load->view('widget/footer');  
    }

    public function tambahPenguji($id)
    {
        $this->form_validation->set_rules('penguji1', 'Penguji 1','required');
        $this->form_validation->set_rules('penguji2', 'Penguji 2','required');
		
		if ($this->form_validation->run()==true){
            $this->TA_model->insertPengujiTA($id);
            $this->session->set_flashdata('success','Berhasil menambah penguji TA mahasiswa!');
            redirect('TAController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('TAController/penguji');
        }
        
    }
}

/* End of file TAController.php and path \application\controllers\TAController.php */
