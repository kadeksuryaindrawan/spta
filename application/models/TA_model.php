<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class TA_model extends CI_Model 
{
    public function getTA()
	{
        $query = $this->db->get_where('ta',array('penguji1'=>NULL,'penguji2' => NULL));
        if($query->num_rows() > 0){
            $this->db->join('mahasiswa', 'ta.nim = mahasiswa.nim');
            $result = $this->db->get('ta');
            return $result;
        }
        else{
            $this->db->join('mahasiswa', 'ta.nim = mahasiswa.nim');
            $this->db->join('penguji1', 'ta.penguji1 = penguji1.nip');
            $this->db->join('penguji2', 'ta.penguji2 = penguji2.nip');
            $result = $this->db->get('ta');
            return $result;
        }
		
	}  
    
    public function getTABimbingan()
	{
		$this->db->join('mahasiswa', 'ta.nim = mahasiswa.nim');
		$result = $this->db->get('ta');
		return $result;
	} 
    
    public function insertTA()
	{
        $file = $_FILES['file']['name'];
        if($file != ""){
            $file_name = str_replace('.','','ta_'.$this->input->post('nim'));
            $config['upload_path']          = FCPATH.'/upload/ta';
            $config['allowed_types']        = 'pdf|doc|docx';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 20000; // 20MB
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('file')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
    
                $insert = array(
                    'nim' => $this->input->post('nim'),
                    'judul' => $this->input->post('judul'),
                    'penguji1' => NULL,
                    'penguji2' => NULL,
                    'status_ta' => 'susun',
                    'file' => $uploaded_data['file_name'],
                    
                );
                $result = $this->db->insert('ta', $insert);
            }
        }
        else{
            $this->session->set_flashdata('error', 'File PDF tidak boleh kosong');
			redirect('TAController/tambah');
        }
		
		return $result;
	}

    public function getDetailTA($id)
	{
		$this->db->where('ta_id',$id);
		$result = $this->db->get('ta')->result_array();
		return $result[0];
	}

    public function editTA()
	{
        $file = $_FILES['file']['name'];
        
        if($file == ""){
            $edit = array(
                'nim' => $this->input->post('nim'),
                'judul' => $this->input->post('judul'),
            );
            $this->db->where('ta_id', $this->input->post('ta_id'));
            $result = $this->db->update('ta', $edit);
        }
        elseif($file != ""){
            $query = $this->db->get_where('ta',array('ta_id'=>$this->input->post('ta_id')))->row();
                unlink(FCPATH."/upload/ta/".$query->file);
                $file_name = str_replace('.','','ta_'.$this->input->post('nim'));
                $config['upload_path']          = FCPATH.'/upload/ta';
                $config['allowed_types']        = 'pdf|doc|docx';
                $config['file_name']            = $file_name;
                $config['overwrite']            = true;
                $config['max_size']             = 20000; // 20MB
        
                $this->load->library('upload', $config);
        
                if (!$this->upload->do_upload('file')) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $uploaded_data = $this->upload->data();
        
                    $edit = array(
                        'nim' => $this->input->post('nim'),
                        'judul' => $this->input->post('judul'),
                        'file' => $uploaded_data['file_name'],
                        
                    );
                $this->db->where('ta_id', $this->input->post('ta_id'));
                $result = $this->db->update('ta', $edit);
            }
        }
		return $result;
	}

    public function deleteTA($id)
	{
        $query = $this->db->get_where('ta',array('ta_id'=>$id))->row();
        unlink(FCPATH."/upload/ta/".$query->file);
        $penguji1 = $query->penguji1;
        $penguji2 = $query->penguji2;
        $this->db->where('ta_id', $id);
        $result = $this->db->delete('ta');
        $this->db->where('nip', $penguji1);
        $result = $this->db->delete('penguji1');
        $this->db->where('nip', $penguji2);
        $result = $this->db->delete('penguji2');
		return $result;
	}

    public function getBimbingan()
	{
		$this->db->join('ta', 'bimbingan_ta.ta_id = ta.ta_id');
        $this->db->join('mahasiswa', 'ta.nim = mahasiswa.nim');
        $this->db->where('bimbingan_ta.status_bimbingan', 'disetujui');
		$result = $this->db->get('bimbingan_ta');
		return $result;
	}

    public function insertBimbinganTA()
	{
        $query = $this->db->get_where('ta',array('ta_id'=>$this->input->post('ta_id')))->row();
        unlink(FCPATH."/upload/ta/".$query->file);
        $file = $_FILES['file_bimbingan']['name'];
        if($file != ""){
            $file_name = str_replace('.','','ta_'.$query->nim);
            $config['upload_path']          = FCPATH.'/upload/ta';
            $config['allowed_types']        = 'pdf|doc|docx';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 20000; // 20MB
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('file_bimbingan')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
    
                $insert = array(
                    'ta_id' => $this->input->post('ta_id'),
                    'waktu_bimbingan' => $this->input->post('waktu_bimbingan'),
                    'file_bimbingan' => $uploaded_data['file_name'],
                    'link' => $this->input->post('link'),
                    'status_bimbingan' => 'disetujui',
                    
                );
                $result = $this->db->insert('bimbingan_ta', $insert);
            }
        }
        else{
            $this->session->set_flashdata('error', 'File PDF tidak boleh kosong');
			redirect('TAController/tambahBimbingan');
        }
		
		return $result;
	}

    public function getDetailBimbinganTA($id)
	{
		$this->db->where('bimbingan_ta_id',$id);
		$result = $this->db->get('bimbingan_ta')->result_array();
		return $result[0];
	}

    public function editBimbinganTA()
	{
        $file = $_FILES['file_bimbingan']['name'];
        
        if($file == ""){
            $edit = array(
                    'ta_id' => $this->input->post('ta_id'),
                    'waktu_bimbingan' => $this->input->post('waktu_bimbingan'),
                    'link' => $this->input->post('link'),
            );
            $this->db->where('bimbingan_ta_id', $this->input->post('bimbingan_ta_id'));
            $result = $this->db->update('bimbingan_ta', $edit);
        }
        elseif($file != ""){
            $query = $this->db->get_where('ta',array('ta_id'=>$this->input->post('ta_id')))->row();
                unlink(FCPATH."/upload/ta/".$query->file);
                $file_name = str_replace('.','','ta_'.$query->nim);
                $config['upload_path']          = FCPATH.'/upload/ta';
                $config['allowed_types']        = 'pdf|doc|docx';
                $config['file_name']            = $file_name;
                $config['overwrite']            = true;
                $config['max_size']             = 20000; // 20MB
        
                $this->load->library('upload', $config);
        
                if (!$this->upload->do_upload('file_bimbingan')) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $uploaded_data = $this->upload->data();
        
                    $edit = array(
                        'ta_id' => $this->input->post('ta_id'),
                    'waktu_bimbingan' => $this->input->post('waktu_bimbingan'),
                    'file_bimbingan' => $uploaded_data['file_name'],
                    'link' => $this->input->post('link'),
                        
                    );
                $this->db->where('bimbingan_ta_id', $this->input->post('bimbingan_ta_id'));
                $result = $this->db->update('bimbingan_ta', $edit);
            }
        }
		return $result;
	}

    public function deleteBimbinganTA($id)
	{
        $this->db->where('bimbingan_ta_id', $id);
        $result = $this->db->delete('bimbingan_ta');
		return $result;
	}

    public function insertPengujiTA($id)
	{
        $query = $this->db->get_where('dosen',array('nip'=>$this->input->post('penguji1')))->row();
        $nama_penguji1 = $query->name_dos;
        $query2 = $this->db->get_where('dosen',array('nip'=>$this->input->post('penguji2')))->row();
        $nama_penguji2 = $query2->name_dos;
                $edit = array(
                    'penguji1' => $this->input->post('penguji1'),
                    'penguji2' => $this->input->post('penguji2'),
                    
                );
                $this->db->where('ta_id', $id);
                $result = $this->db->update('ta', $edit);
                $result = $this->db->insert('penguji1', array(
                    'nip' => $this->input->post('penguji1'),
                    'nama_penguji1' => $nama_penguji1,
                    
                ));
                $result = $this->db->insert('penguji2', array(
                    'nip' => $this->input->post('penguji2'),
                    'nama_penguji2' => $nama_penguji2,
                    
                ));
            
		
		return $result;
	}                    
                        
}


/* End of file TA_model.php and path \application\models\TA_model.php */
