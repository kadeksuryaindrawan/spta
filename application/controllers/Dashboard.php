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
        $this->load->view('dosen/dashboard');
    }

    public function mahasiswa()
    {
        $this->load->view('mahasiswa/dashboard');
    }
}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
