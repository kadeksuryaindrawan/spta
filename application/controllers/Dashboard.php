<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->Auth_model->cek_login();
    }
    
    public function admin()
    {
        $this->load->view('widget/header');
        $this->load->view('admin/dashboard');
        $this->load->view('widget/footer');
    }

    public function dosen()
    {
        $this->load->view('widget/header');
        $this->load->view('dosen/dashboard');
        $this->load->view('widget/footer');
        
    }

    public function mahasiswa()
    {
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->get_where('mahasiswa',array('user_id'=>$user_id))->row();
        $status_dosbing = $query->status_dosbing;
        $dosbing1 = $query->dosbing1;
        if($dosbing1 != NULL && $status_dosbing == 'disetujui'){
            $this->load->view('widget/header');
            $this->load->view('mahasiswa/dashboard');
            $this->load->view('widget/footer');
        }
        elseif($dosbing1 == NULL && $status_dosbing == 'belum disetujui'){
            $this->load->view('widget/header');
            $this->load->view('mahasiswa/dashboard2');
            $this->load->view('widget/footer');
        }
        elseif($dosbing1 != NULL && $status_dosbing == 'belum disetujui'){
            $this->load->view('widget/header');
            $this->load->view('mahasiswa/dashboard3');
            $this->load->view('widget/footer');
        }
        
    }
}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
