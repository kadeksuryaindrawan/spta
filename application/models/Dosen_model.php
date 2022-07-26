<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Dosen_model extends CI_Model 
{
    public function getDosen()
	{
		$this->db->join('prodi', 'dosen.kode_prodi = prodi.kode_prodi');
        $this->db->join('users', 'dosen.user_id = users.user_id');
		$result = $this->db->get('dosen');
		return $result;
	}

    public function getProdi()
	{
        $this->db->order_by('kode_prodi','desc');
		$result = $this->db->get('prodi');
		return $result;
	}

    public function insertDosen()
	{
		$insert = array(
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
			'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			'level' => 'dosen',
		);
		$result = $this->db->insert('users', $insert);
        $query = $this->db->get_where('users',array('email'=>$this->input->post('email')))->row();
        $user_id = $query->user_id;

        $insert = array(
			'nip' => $this->input->post('nip'),
			'user_id' => $user_id,
			'alamat' => $this->input->post('alamat'),
			'kode_prodi' => $this->input->post('kode_prodi'),
		);
		$result = $this->db->insert('dosen', $insert);

		return $result;
	}     
    
    public function deleteDosen($id)
	{
		$this->db->where('user_id', $id);
		$result = $this->db->delete('users');
        $this->db->where('user_id', $id);
        $result = $this->db->delete('dosen');
		return $result;
	}

    public function getDetailDosen($id)
	{
		$this->db->where('dosen.user_id',$id);
        $this->db->join('users', 'dosen.user_id = users.user_id');
		$result = $this->db->get('dosen')->result_array();
		return $result[0];
	}

    public function editDosen()
	{
		$edit = array(
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
		);
        $this->db->where('users.user_id', $this->input->post('user_id'));
		$result = $this->db->update('users', $edit);

        $edit = array(
			'nip' => $this->input->post('nip'),
			'alamat' => $this->input->post('alamat'),
			'kode_prodi' => $this->input->post('kode_prodi'),
		);
        $this->db->where('dosen.user_id', $this->input->post('user_id'));
		$result = $this->db->update('dosen', $edit);

		return $result;
	}

    public function ubahPassword()
	{
        $query = $this->db->get_where('users',array('user_id'=>$this->input->post('user_id')))->row();
		$old_pw = $query->password;

        $password_lama = $this->input->post('password_lama');
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');

        if(password_verify($password_lama,$old_pw)){
            if($password == $repassword){
                $edit = array(
                    'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                );
                $this->db->where('user_id', $this->input->post('user_id'));
                $result = $this->db->update('users', $edit);
            }
            else{
                $this->session->set_flashdata('error','Password dan Repassword tidak sesuai !');
			    redirect('DosenController/ubahPassword/'.$this->input->post('user_id'));
            }
        }
        else{
            $this->session->set_flashdata('error','Password lama tidak sesuai !');
			redirect('DosenController/ubahPassword/'.$this->input->post('user_id'));
        }
		return $result;
	}
                        
}


/* End of file Dosen_model.php and path \application\models\Dosen_model.php */
