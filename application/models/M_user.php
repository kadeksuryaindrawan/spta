<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function admin()
	{
		$admin =  array(
			'id' => 1,
			'email' => 'admin@gmail.com',
			'username' => 'admin',
			'password' => 'admin'
		);
		return $admin;
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */