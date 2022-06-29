<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data1['judul'] = 'Home - Mantapsssss';
		$data2['text'] = 'Ini Halaman Home';
		$data3['footer'] = 'Ini Footer Home';

		$this->load->view('template/header',$data1);
		$this->load->view('home_temp',$data2);
		$this->load->view('template/footer',$data3);
	}

	public function tempt()
	{
		$data1['judul'] = 'Help - Mantapsssss';
		$data2['text'] = 'Ini Halaman Help';
		$data3['footer'] = 'Ini Footer Help';

		$this->load->view('template/header',$data1);
		$this->load->view('home_temp',$data2);
		$this->load->view('template/footer',$data3);
	}

	public function temp1()
	{
		$template = 'Hello, {firstname} {lastname}';

		$data = array(
			'title' => 'Ms' ,
			'firstname' => 'Ayu',
			'lastname' => 'Tari' 
		);

		$this->parser->parse_string($template, $data);
	}

	public function temp2()
	{
		$data = array(
			'title' => 'Ms' ,
			'firstname' => 'Ayu',
			'lastname' => 'Tari' 
		);

		$this->parser->parse('template/test', $data);
	}

}

/* End of file Template.php */
/* Location: ./application/controllers/Template.php */