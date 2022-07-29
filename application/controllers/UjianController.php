<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class UjianController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proposal_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Ujian_model');
        $this->load->model('Auth_model');
        $this->Auth_model->cek_login();
    }
    public function index()
    {
        $data['ujian'] = $this->Ujian_model->getUjianProposal();
        $this->load->view('widget/header');
        $this->load->view('admin/ujian-proposal',$data);
        $this->load->view('widget/footer');
    }

    public function tambahUjianProposal()
    {
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingMahasiswaNull();
        $this->load->view('widget/header');
        $this->load->view('admin/tambah-ujian-proposal',$data);
        $this->load->view('widget/footer');  
    }

    public function addUjianProposal()
    {
        $this->form_validation->set_rules('nim', 'Mahasiswa','required');
        $this->form_validation->set_rules('waktu_ujian', 'Waktu','required');
		
		if ($this->form_validation->run()==true){
            $this->Ujian_model->insertUjianProposal();
            $this->session->set_flashdata('success','Berhasil menambah jadwal ujian proposal mahasiswa!');
            redirect('UjianController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('UjianController/tambahUjianProposal');
        }
        
    }

    public function deleteUjianProposal($id)
	{
		$this->Ujian_model->deleteUjianProposal($id);
        $this->session->set_flashdata('success','Berhasil menghapus ujian proposal mahasiswa!');
		redirect('UjianController');
	}

    public function editUjianProposal($id)
	{
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingMahasiswaNull();
        $data['ujian'] = $this->Ujian_model->getDetailUjianProposal($id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-ujian-proposal',$data);
        $this->load->view('widget/footer'); 
	}

    public function editUjianProposalProcess()
	{
		$this->form_validation->set_rules('nim', 'Mahasiswa','required');
        $this->form_validation->set_rules('waktu_ujian', 'Waktu','required');
		
		if ($this->form_validation->run()==true){
			$this->Ujian_model->editUjianProposal();
            $this->session->set_flashdata('success','Data ujian proposal berhasil diedit!');
			redirect('UjianController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('UjianController/editUjianProposal/'.$this->input->post('ujian_proposal_id'));
        }
	}

    public function nilaiUjianProposal($id)
	{
        $data['ujian'] = $this->Ujian_model->getDetailNilaiProposal($id);
        $this->load->view('widget/header');
        $this->load->view('admin/nilai-ujian-proposal',$data);
        $this->load->view('widget/footer'); 
	}

    public function nilaiUjianProposalProcess($id)
	{
        $this->form_validation->set_rules('nilai', 'Nilai','required');
		
		if ($this->form_validation->run()==true){
			$this->Ujian_model->nilaiUjianProposal($id);
            $this->session->set_flashdata('success','Data ujian proposal berhasil dinilai!');
			redirect('UjianController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('UjianController/nilaiUjianProposal/'.$this->input->post('ujian_proposal_id'));
        }
	}

    public function ta()
    {
        $data['ujian'] = $this->Ujian_model->getUjianTA();
        $this->load->view('widget/header');
        $this->load->view('admin/ujian-ta',$data);
        $this->load->view('widget/footer');
    }

    public function tambahUjianTA()
    {
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingMahasiswaNull2();
        $this->load->view('widget/header');
        $this->load->view('admin/tambah-ujian-ta',$data);
        $this->load->view('widget/footer');  
    }

    public function addUjianTA()
    {
        $this->form_validation->set_rules('nim', 'Mahasiswa','required');
        $this->form_validation->set_rules('waktu_ujian', 'Waktu','required');
		
		if ($this->form_validation->run()==true){
            $this->Ujian_model->insertUjianTA();
            $this->session->set_flashdata('success','Berhasil menambah jadwal ujian TA mahasiswa!');
            redirect('UjianController/ta');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('UjianController/tambahUjianTA');
        }
        
    }

    public function deleteUjianTA($id)
	{
		$this->Ujian_model->deleteUjianTA($id);
        $this->session->set_flashdata('success','Berhasil menghapus ujian TA mahasiswa!');
		redirect('UjianController/ta');
	}

    public function editUjianTA($id)
	{
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingMahasiswaNull2();
        $data['ujian'] = $this->Ujian_model->getDetailUjianTA($id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-ujian-ta',$data);
        $this->load->view('widget/footer'); 
	}

    public function editUjianTAProcess()
	{
		$this->form_validation->set_rules('nim', 'Mahasiswa','required');
        $this->form_validation->set_rules('waktu_ujian', 'Waktu','required');
		
		if ($this->form_validation->run()==true){
			$this->Ujian_model->editUjianTA();
            $this->session->set_flashdata('success','Data ujian TA berhasil diedit!');
			redirect('UjianController/ta');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('UjianController/editUjianTA/'.$this->input->post('ujian_ta_id'));
        }
	}

    public function nilaiUjianTA($id)
	{
        $data['ujian'] = $this->Ujian_model->getDetailNilaiTA($id);
        $this->load->view('widget/header');
        $this->load->view('admin/nilai-ujian-ta',$data);
        $this->load->view('widget/footer'); 
	}

    public function nilaiUjianTAProcess($id)
	{
        $this->form_validation->set_rules('nilai', 'Nilai','required');
		
		if ($this->form_validation->run()==true){
			$this->Ujian_model->nilaiUjianTA($id);
            $this->session->set_flashdata('success','Data ujian TA berhasil dinilai!');
			redirect('UjianController/ta');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('UjianController/nilaiUjianTA/'.$this->input->post('ujian_ta_id'));
        }
	}
}

/* End of file UjianController.php and path \application\controllers\UjianController.php */
