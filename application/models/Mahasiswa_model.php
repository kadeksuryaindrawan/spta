<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Mahasiswa_model extends CI_Model 
{
    public function getMahasiswa()
	{
		$this->db->join('prodi', 'mahasiswa.kode_prodi = prodi.kode_prodi');
        $this->db->join('users', 'mahasiswa.user_id = users.user_id');
		$result = $this->db->get('mahasiswa');
		return $result;
	}

    public function getProdi()
	{
        $this->db->order_by('kode_prodi','desc');
		$result = $this->db->get('prodi');
		return $result;
	}

    public function insertMahasiswa()
	{
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');
        if($password == $repassword){
            $insert = array(
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
                'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'level' => 'mahasiswa',
            );
            $result = $this->db->insert('users', $insert);
            $query = $this->db->get_where('users',array('email'=>$this->input->post('email')))->row();
            $user_id = $query->user_id;
            $name = $query->name;
    
            $file_name = str_replace('.','',$user_id.$this->input->post('nim'));
            $config['upload_path']          = FCPATH.'/upload/img/mahasiswa/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 10000; // 10MB
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('foto')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
    
                $insert = array(
                    'nim' => $this->input->post('nim'),
                    'user_id' => $user_id,
                    'name_mhs' => $name,
                    'alamat' => $this->input->post('alamat'),
                    'kode_prodi' => $this->input->post('kode_prodi'),
                    'foto' => $uploaded_data['file_name'],
                    'dosbing1' => NULL,
                    'dosbing2' => NULL,
                    'status' => 'proposal',
                );
                $result = $this->db->insert('mahasiswa', $insert);
            }
        }
        else{
            $this->session->set_flashdata('error','Password dan Repassword tidak sesuai !');
			redirect('MahasiswaController/tambah');
        }
		
		return $result;
	}     
    
    public function deleteMahasiswa($id)
	{
		$this->db->where('user_id', $id);
		$result = $this->db->delete('users');
        $query = $this->db->get_where('mahasiswa',array('user_id'=>$id))->row();
        unlink(FCPATH."/upload/img/mahasiswa/".$query->foto);
        $this->db->where('user_id', $id);
        $result = $this->db->delete('mahasiswa');
		return $result;
	}

    public function getDetailMahasiswa($id)
	{
		$this->db->where('mahasiswa.user_id',$id);
        $this->db->join('users', 'mahasiswa.user_id = users.user_id');
		$result = $this->db->get('mahasiswa')->result_array();
		return $result[0];
	}

    public function editMahasiswa()
	{
        $foto = $_FILES['foto']['name'];
        
        if($foto == ""){
            $edit = array(
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
            );
            $this->db->where('users.user_id', $this->input->post('user_id'));
            $result = $this->db->update('users', $edit);
    
            $edit = array(
                'nim' => $this->input->post('nim'),
                'name_mhs' => $this->input->post('name'),
                'alamat' => $this->input->post('alamat'),
                'kode_prodi' => $this->input->post('kode_prodi'),
            );
            $this->db->where('mahasiswa.user_id', $this->input->post('user_id'));
            $result = $this->db->update('mahasiswa', $edit);
        }
        elseif($foto != ""){
            $query = $this->db->get_where('mahasiswa',array('user_id'=>$this->input->post('user_id')))->row();
                unlink(FCPATH."/upload/img/mahasiswa/".$query->foto);
            $edit = array(
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
            );
            $this->db->where('users.user_id', $this->input->post('user_id'));
            $result = $this->db->update('users', $edit);

            $file_name = str_replace('.','',$this->input->post('user_id').$this->input->post('nim'));
            $config['upload_path']          = FCPATH.'/upload/img/mahasiswa/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 10000; // 10MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
                $edit = array(
                    'nim' => $this->input->post('nim'),
                    'name_mhs' => $this->input->post('name'),
                    'alamat' => $this->input->post('alamat'),
                    'kode_prodi' => $this->input->post('kode_prodi'),
                    'foto' => $uploaded_data['file_name'],
                );
                $this->db->where('mahasiswa.user_id', $this->input->post('user_id'));
                $result = $this->db->update('mahasiswa', $edit);
            }
        }
		return $result;
	}

    public function ubahPassword()
	{
        $query = $this->db->get_where('users',array('user_id'=>$this->input->post('user_id')))->row();
		$old_pw = $query->password;

        $password_lama = $this->input->post('password_lama');
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');

        if($password_lama == "" || $password == "" || $repassword == ""){
            redirect('MahasiswaController');
        }
        else{
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
                    redirect('MahasiswaController/ubahPassword/'.$this->input->post('user_id'));
                }
            }
            else{
                $this->session->set_flashdata('error','Password lama tidak sesuai !');
                redirect('MahasiswaController/ubahPassword/'.$this->input->post('user_id'));
            }
        }

        
		return $result;
	}       
    
    public function getPembimbingMahasiswa()
	{
        $this->db->where('dosbing1',NULL);
		$result = $this->db->get('mahasiswa');
		return $result;
	}
    
    public function getPembimbingProposal()
	{
        $this->db->join('dosen', 'mahasiswa.dosbing1 = dosen.nip');
		$result = $this->db->get('mahasiswa');
		return $result;
	}

    public function tambahPembimbingProposal()
	{
        $edit = array(
            'dosbing1' => $this->input->post('dosbing1'),
        );
        $this->db->where('nim', $this->input->post('nim'));
        $result = $this->db->update('mahasiswa', $edit);

        return $result;
	}

    public function getDetailPembimbingMahasiswa($id)
	{
		$this->db->where('nim',$id);
		$result = $this->db->get('mahasiswa')->result_array();
		return $result[0];
	}

    public function editPembimbingProposal()
	{
                $edit = array(
                    'dosbing1' => $this->input->post('dosbing1'),
                );
                $this->db->where('nim', $this->input->post('nim'));
                $result = $this->db->update('mahasiswa', $edit);
		return $result;
	}

    public function deletePembimbingProposal($id)
	{
		$edit = array(
            'dosbing1' => NULL,
        );
        $this->db->where('nim', $id);
        $result = $this->db->update('mahasiswa', $edit);
        return $result;
	}

    public function getPembimbingTA()
	{
        $this->db->join('dosen', 'mahasiswa.dosbing2 = dosen.nip');
		$result = $this->db->get('mahasiswa');
		return $result;
	}

    public function getPembimbingMahasiswa2()
	{
        $this->db->where('dosbing1 is NOT NULL',NULL);
        $this->db->where('dosbing2',NULL);
        $this->db->where('status','lulus UP');
		$result = $this->db->get('mahasiswa');
		return $result;
	}

    public function tambahPembimbingTA()
	{
        $edit = array(
            'dosbing2' => $this->input->post('dosbing2'),
        );
        $this->db->where('nim', $this->input->post('nim'));
        $result = $this->db->update('mahasiswa', $edit);

        return $result;
	}

    public function getDetailPembimbingMahasiswa2($id)
	{
		$this->db->where('nim',$id);
		$result = $this->db->get('mahasiswa')->result_array();
		return $result[0];
	}

    public function editPembimbingTA()
	{
                $edit = array(
                    'dosbing2' => $this->input->post('dosbing2'),
                );
                $this->db->where('nim', $this->input->post('nim'));
                $result = $this->db->update('mahasiswa', $edit);
		return $result;
	}

    public function deletePembimbingTA($id)
	{
		$edit = array(
            'dosbing2' => NULL,
        );
        $this->db->where('nim', $id);
        $result = $this->db->update('mahasiswa', $edit);
        return $result;
	}
                        
}


/* End of file Mahasiswa_model.php and path \application\models\Mahasiswa_model.php */
