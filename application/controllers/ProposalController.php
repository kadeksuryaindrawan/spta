<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class ProposalController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proposal_model');
        $this->load->model('Auth_model');
        $this->Auth_model->cek_login();
    }
    public function index()
    {  
        
    }
}

/* End of file ProposalController.php and path \application\controllers\ProposalController.php */
