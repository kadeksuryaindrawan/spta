<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Auth_model extends CI_Model 
{
    public function register($email, $name, $password)
    {
        $data = array(
            'email' => $email,
            'name' => $name,
            'password' => password_hash($password,PASSWORD_DEFAULT),
            'level' => 'admin'
        );
        $this->db->insert('users',$data);
    }      

    public function cek_login()
    {
        if(empty($this->session->userdata('is_login')))
        {
			redirect('Login');
		}
    }
                        
}


/* End of file Auth_model.php and path \application\models\Auth_model.php */
