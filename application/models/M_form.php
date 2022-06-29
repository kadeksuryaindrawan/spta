<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_form extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function validation()
	{
		return [
			[
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'required|max_length[32]'
			],
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email|max_length[32]'
			],
			[
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required'
			],
			
		];
	}

}

/* End of file M_form.php */
/* Location: ./application/models/M_form.php */