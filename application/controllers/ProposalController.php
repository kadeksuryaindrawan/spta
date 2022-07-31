<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class ProposalController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proposal_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Dosen_model');
        $this->load->model('Auth_model');
        $this->Auth_model->cek_login();
        date_default_timezone_set("Asia/Makassar");
    }
    public function index()
    {  
        $data['proposal'] = $this->Proposal_model->getProposal();
        $this->load->view('widget/header');
        $this->load->view('admin/proposal',$data);
        $this->load->view('widget/footer'); 
    }

    public function tambah()
    {
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingMahasiswaNull();
        $this->load->view('widget/header');
        $this->load->view('admin/tambah-proposal',$data);
        $this->load->view('widget/footer');  
    }

    public function add()
    {
        $this->form_validation->set_rules('nim', 'Mahasiswa','required|is_unique[proposal.nim]');
        $this->form_validation->set_rules('judul', 'Judul','required|min_length[2]|max_length[255]');
		
		if ($this->form_validation->run()==true){
            $this->Proposal_model->insertProposal();
            $this->session->set_flashdata('success','Berhasil menambah proposal mahasiswa!');
            redirect('ProposalController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('ProposalController/tambah');
        }
        
    }

    public function lihatFile($id)
    {
        $query = $this->db->get_where('proposal', array('proposal_id' => $id))->row();
        $filename = FCPATH.'/upload/proposal/'.$query->file;
        header("Content-type: application/pdf");
        header('Content-Disposition: inline; filename="' . $filename . '"'); 
        @readfile($filename);
    }

    public function delete($id)
	{
		$this->Proposal_model->deleteProposal($id);
        $this->session->set_flashdata('success','Berhasil menghapus proposal mahasiswa!');
		redirect('ProposalController');
	}

    public function edit($id)
	{
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingMahasiswaNull();
        $data['proposal'] = $this->Proposal_model->getDetailProposal($id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-proposal',$data);
        $this->load->view('widget/footer'); 
	}

    public function editProcess()
	{
		$this->form_validation->set_rules('nim', 'Mahasiswa','required');
        $this->form_validation->set_rules('judul', 'Judul','required|min_length[2]|max_length[255]');
		
		if ($this->form_validation->run()==true){
			$this->Proposal_model->editProposal();
            $this->session->set_flashdata('success','Data proposal berhasil diedit!');
			redirect('ProposalController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('ProposalController/edit/'.$this->input->post('proposal_id'));
        }
	}

    public function bimbingan()
    {
        //var_dump(date('Y-m-d H:i:s'));
        $data['bimbingan'] = $this->Proposal_model->getBimbingan();
        $this->load->view('widget/header');
        $this->load->view('admin/bimbingan',$data);
        $this->load->view('widget/footer');  
    }

    public function tambahBimbingan()
    {
        $data['proposal'] = $this->Proposal_model->getProposalBimbingan();
        $this->load->view('widget/header');
        $this->load->view('admin/tambah-bimbingan',$data);
        $this->load->view('widget/footer');  
    }

    public function addBimbingan()
    {
        $this->form_validation->set_rules('proposal_id', 'Proposal','required');
        $this->form_validation->set_rules('waktu_bimbingan', 'Waktu Bimbingan','required');
        $this->form_validation->set_rules('link', 'Link Meet','required');
		
		if ($this->form_validation->run()==true){
            $this->Proposal_model->insertBimbingan();
            $this->session->set_flashdata('success','Berhasil menambah bimbingan proposal mahasiswa!');
            redirect('ProposalController/bimbingan');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('ProposalController/tambahBimbingan');
        }
        
    }

    public function editBimbingan($id)
	{
        $data['proposal'] = $this->Proposal_model->getProposalBimbingan();
        $data['bimbingan'] = $this->Proposal_model->getDetailBimbingan($id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-bimbingan',$data);
        $this->load->view('widget/footer'); 
	}

    public function editBimbinganProcess()
	{
		$this->form_validation->set_rules('proposal_id', 'Proposal','required');
        $this->form_validation->set_rules('waktu_bimbingan', 'Waktu Bimbingan','required');
        $this->form_validation->set_rules('link', 'Link Meet','required');

		if ($this->form_validation->run()==true){
			$this->Proposal_model->editBimbingan();
            $this->session->set_flashdata('success','Data bimbingan berhasil diedit!');
			redirect('ProposalController/bimbingan');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('ProposalController/editBimbingan/'.$this->input->post('bimbingan_proposal_id'));
        }
	}

    public function deleteBimbingan($id)
	{
		$this->Proposal_model->deleteBimbingan($id);
        $this->session->set_flashdata('success','Berhasil menghapus bimbingan mahasiswa!');
		redirect('ProposalController/bimbingan');
	}

    public function penguji($id)
    {
        $data['dosen'] = $this->Dosen_model->getDosen();
        $data['proposal'] = $this->Proposal_model->getDetailProposal($id);
        $this->load->view('widget/header');
        $this->load->view('admin/penguji',$data);
        $this->load->view('widget/footer');  
    }

    public function lihatPenguji($id)
    {
        $proposal = $this->db->get_where('proposal',array('proposal_id'=>$id))->row();
        $penguji1 = $proposal->penguji1;
        $penguji2 = $proposal->penguji2;
        $nim = $proposal->nim;

        $data['mhs'] = $this->db->get_where('mahasiswa',array('nim'=>$nim))->row();
        $data['penguji1'] = $this->db->get_where('penguji1',array('nip'=>$penguji1))->row();
        $data['penguji2'] = $this->db->get_where('penguji2',array('nip'=>$penguji2))->row();

        $this->load->view('widget/header');
        $this->load->view('admin/lihat-penguji',$data);
        $this->load->view('widget/footer');  
    }

    public function tambahPenguji($id)
    {
        $this->form_validation->set_rules('penguji1', 'Penguji 1','required');
        $this->form_validation->set_rules('penguji2', 'Penguji 2','required');
		
		if ($this->form_validation->run()==true){
            $this->Proposal_model->insertPenguji($id);
            $this->session->set_flashdata('success','Berhasil menambah penguji proposal mahasiswa!');
            redirect('ProposalController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('ProposalController/penguji');
        }
        
    }
}

/* End of file ProposalController.php and path \application\controllers\ProposalController.php */
