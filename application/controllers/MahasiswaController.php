<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class MahasiswaController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Dosen_model');
        $this->load->model('Auth_model');
        $this->Auth_model->cek_login();
    }
    public function index()
    {
        $data['mhs'] = $this->Mahasiswa_model->getMahasiswa();
        $this->load->view('widget/header');
        $this->load->view('admin/mahasiswa',$data);
        $this->load->view('widget/footer');  
    }

    public function tambah()
    {
        $data['prd'] = $this->Mahasiswa_model->getProdi();
        $this->load->view('widget/header');
        $this->load->view('admin/tambah-mahasiswa',$data);
        $this->load->view('widget/footer');  
    }

    public function add()
    {
        $this->form_validation->set_rules('email', 'email','required|min_length[1]|max_length[100]|is_unique[users.email]');
        $this->form_validation->set_rules('name', 'nama','required|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('password', 'password','required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('repassword', 'repassword','required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('nim', 'NIM','required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('alamat', 'alamat','required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('kode_prodi', 'prodi','required');
		
		if ($this->form_validation->run()==true){
            $this->Mahasiswa_model->insertMahasiswa();
            $this->session->set_flashdata('success','Berhasil menambah mahasiswa!');
            redirect('MahasiswaController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('MahasiswaController/tambah');
        }
        
    }

    public function delete($id)
	{
		$this->Mahasiswa_model->deleteMahasiswa($id);
        $this->session->set_flashdata('success','Berhasil menghapus mahasiswa!');
		redirect('MahasiswaController');
	}

    public function edit($id)
	{
        $data['prd'] = $this->Mahasiswa_model->getProdi();
        $data['dosen'] = $this->Dosen_model->getDosen();
        $data['mhs'] = $this->Mahasiswa_model->getDetailMahasiswa($id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-mahasiswa',$data);
        $this->load->view('widget/footer'); 
	}

    public function editProcess()
	{
		$this->form_validation->set_rules('email', 'email','required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('name', 'nama','required|min_length[2]|max_length[255]');
        $this->form_validation->set_rules('nim', 'NIM','required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('alamat', 'alamat','required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('kode_prodi', 'prodi','required');
		
		if ($this->form_validation->run()==true){
			$this->Mahasiswa_model->editMahasiswa();
            $this->session->set_flashdata('success','Data mahasiswa berhasil diedit!');
			redirect('MahasiswaController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('MahasiswaController/edit/'.$this->input->post('user_id'));
        }
	}

    public function ubahPassword($user_id)
    {
        $data['mhs'] = $this->Mahasiswa_model->getDetailMahasiswa($user_id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-password-mhs',$data);
        $this->load->view('widget/footer');
    }

    public function ubahPasswordProcess($user_id)
	{
        $this->form_validation->set_rules('password', 'password baru','min_length[5]|max_length[255]');
		if ($this->form_validation->run()==true){
			$this->Mahasiswa_model->ubahPassword();
            $this->session->set_flashdata('success','Password mahasiswa berhasil diubah!');
			redirect('MahasiswaController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('MahasiswaController/ubahPassword/'.$this->input->post('user_id'));
        }	
        
	}

    public function pembimbingProposal()
    {
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingProposal();
        $this->load->view('widget/header');
        $this->load->view('admin/pembimbing-proposal',$data);
        $this->load->view('widget/footer');  
    }

    public function pembimbingProposal2()
    {
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingProposal2();
        $this->load->view('widget/header');
        $this->load->view('admin/pembimbing-proposal',$data);
        $this->load->view('widget/footer');  
    }

    public function pembimbingTA()
    {
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingTA();
        $this->load->view('widget/header');
        $this->load->view('admin/pembimbing-ta',$data);
        $this->load->view('widget/footer');  
    }

    public function tambahPembimbingTA()
    {
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingMahasiswa2();
        $data['dosen'] = $this->Dosen_model->getDosen();
        $this->load->view('widget/header');
        $this->load->view('admin/tambah-pembimbing-ta',$data);
        $this->load->view('widget/footer');  
    }

    public function tambahPembimbingTAProcess()
    {
        $this->form_validation->set_rules('nim', 'Mahasiswa','required');
        $this->form_validation->set_rules('dosbing2', 'Dosen Pembimbing','required');
		if ($this->form_validation->run()==true){
			$this->Mahasiswa_model->tambahPembimbingTA();
            $this->session->set_flashdata('success','Pembimbing TA sukses ditambah!');
			redirect('MahasiswaController/pembimbingTA');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('MahasiswaController/tambahPembimbingTA');
        } 
    }

    public function editPembimbingTA($id)
	{
        $data['dosen'] = $this->Dosen_model->getDosen();
        $data['mhs'] = $this->Mahasiswa_model->getDetailPembimbingMahasiswa2($id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-pembimbing-ta',$data);
        $this->load->view('widget/footer'); 
	}

    public function editPembimbingTAProcess()
	{
		$this->form_validation->set_rules('dosbing2', 'Dosen Pembimbing','required');
		
		if ($this->form_validation->run()==true){
			$this->Mahasiswa_model->editPembimbingTA();
            $this->session->set_flashdata('success','Pembimbing TA mahasiswa berhasil diedit!');
			redirect('MahasiswaController/pembimbingTA');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('MahasiswaController/editPembimbingTA/'.$this->input->post('nim'));
        }
	}

    public function deletePembimbingTA($id)
	{
		$this->Mahasiswa_model->deletePembimbingTA($id);
        $this->session->set_flashdata('success','Berhasil menghapus Pembimbing!');
		redirect('MahasiswaController/pembimbingTA');
	}

    public function tambahPembimbingProposal()
    {
        $data['mhs'] = $this->Mahasiswa_model->getPembimbingMahasiswa();
        $data['dosen'] = $this->Dosen_model->getDosen();
        $this->load->view('widget/header');
        $this->load->view('admin/tambah-pembimbing-proposal',$data);
        $this->load->view('widget/footer');  
    }

    public function tambahPembimbingProposalProcess()
    {
        $level = $this->session->userdata('level');
        if($level == 'admin'){
            $this->form_validation->set_rules('nim', 'Mahasiswa','required');
            $this->form_validation->set_rules('dosbing1', 'Dosen Pembimbing','required');
        }
        elseif($level == 'mahasiswa'){
            $this->form_validation->set_rules('dosbing1', 'Dosen Pembimbing','required');
        }
        
        
		if ($this->form_validation->run()==true){
			$this->Mahasiswa_model->tambahPembimbingProposal();
            $this->session->set_flashdata('success','Pembimbing proposal sukses ditambah!');
            if($level == 'admin'){
                redirect('MahasiswaController/pembimbingProposal');
            }
			elseif($level == 'mahasiswa'){
                redirect('Dashboard/mahasiswa');
            }
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('MahasiswaController/tambahPembimbingProposal');
        } 
    }

    public function editPembimbingProposal($id)
	{
        $data['dosen'] = $this->Dosen_model->getDosen();
        $data['mhs'] = $this->Mahasiswa_model->getDetailPembimbingMahasiswa($id);
        $this->load->view('widget/header');
        $this->load->view('admin/edit-pembimbing-proposal',$data);
        $this->load->view('widget/footer'); 
	}

    public function editPembimbingProposalProcess()
	{
		$this->form_validation->set_rules('dosbing1', 'Dosen Pembimbing','required');
		
		if ($this->form_validation->run()==true){
			$this->Mahasiswa_model->editPembimbingProposal();
            $this->session->set_flashdata('success','Pembimbing proposal mahasiswa berhasil diedit!');
			redirect('MahasiswaController/pembimbingProposal');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('MahasiswaController/editPembimbingProposal/'.$this->input->post('nim'));
        }
	}

    public function deletePembimbingProposal($id)
	{
		$this->Mahasiswa_model->deletePembimbingProposal($id);
        $this->session->set_flashdata('success','Berhasil menghapus Pembimbing!');
		redirect('MahasiswaController/pembimbingProposal');
	}

    public function terimaMahasiswa($id)
	{
		$edit = array(
            'status_dosbing' => 'disetujui',
        );
        $this->db->where('mahasiswa.nim', $id);
        $result = $this->db->update('mahasiswa', $edit);
        if($result){
            $this->session->set_flashdata('success','Berhasil menerima Mahasiswa!');
		    redirect('MahasiswaController/pembimbingProposal');
        }
        else{
            $this->session->set_flashdata('error','Gagal menerima Mahasiswa!');
		    redirect('MahasiswaController/pembimbingProposal');
        }
        
	}

    public function tolakMahasiswa($id)
	{
		$edit = array(
            'dosbing1' => NULL,
            'status_dosbing' => 'belum disetujui',
        );
        $this->db->where('mahasiswa.nim', $id);
        $result = $this->db->update('mahasiswa', $edit);
        if($result){
            $this->session->set_flashdata('success','Berhasil menolak Mahasiswa!');
		    redirect('MahasiswaController/pembimbingProposal');
        }
        else{
            $this->session->set_flashdata('error','Gagal menolak Mahasiswa!');
		    redirect('MahasiswaController/pembimbingProposal');
        }
        
	}
}

/* End of file MahasiswaController.php and path \application\controllers\MahasiswaController.php */
