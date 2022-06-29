<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TemplateBootstrap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('template');
		$this->load->view('widget/footer');
	}

	public function shortcuts()
	{
		$this->load->view('widget/header');
		$this->load->view('shortcuts');
		$this->load->view('widget/footer');
	}

}

/* End of file TemplateBootstrap.php */
/* Location: ./application/controllers/TemplateBootstrap.php */