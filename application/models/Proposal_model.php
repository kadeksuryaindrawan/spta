<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Proposal_model extends CI_Model 
{
    public function getProposal()
	{
        $level = $this->session->userdata('level');
        if($level == 'admin'){
            $this->db->join('mahasiswa', 'proposal.nim = mahasiswa.nim');
            // $this->db->join('penguji1', 'proposal.penguji1 = penguji1.nip');
            // $this->db->join('penguji2', 'proposal.penguji2 = penguji2.nip');
            $result = $this->db->get('proposal');
            return $result;
        }
        elseif($level == 'dosen'){
            $user_id = $this->session->userdata('user_id');
            $dosen = $this->db->get_where('dosen',array('user_id'=>$user_id))->row();
            $nip = $dosen->nip;

            $this->db->join('mahasiswa', 'proposal.nim = mahasiswa.nim');
            $this->db->where('dosbing1',$nip);
            // $this->db->join('penguji1', 'proposal.penguji1 = penguji1.nip');
            // $this->db->join('penguji2', 'proposal.penguji2 = penguji2.nip');
            $result = $this->db->get('proposal');
            return $result;
        }
	}  
    
    public function getProposalBimbingan()
	{
		$this->db->join('mahasiswa', 'proposal.nim = mahasiswa.nim');
		$result = $this->db->get('proposal');
		return $result;
	} 
    
    public function insertProposal()
	{
        $file = $_FILES['file']['name'];
        if($file != ""){
            $file_name = str_replace('.','','proposal_'.$this->input->post('nim'));
            $config['upload_path']          = FCPATH.'/upload/proposal';
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
                    'status_proposal' => 'susun',
                    'file' => $uploaded_data['file_name'],
                    
                );
                $result = $this->db->insert('proposal', $insert);
            }
        }
        else{
            $this->session->set_flashdata('error', 'File PDF tidak boleh kosong');
			redirect('ProposalController/tambah');
        }
		
		return $result;
	}

    public function getDetailProposal($id)
	{
		$this->db->where('proposal_id',$id);
		$result = $this->db->get('proposal')->result_array();
		return $result[0];
	}

    public function editProposal()
	{
        $file = $_FILES['file']['name'];
        
        if($file == ""){
            $edit = array(
                'nim' => $this->input->post('nim'),
                'judul' => $this->input->post('judul'),
            );
            $this->db->where('proposal_id', $this->input->post('proposal_id'));
            $result = $this->db->update('proposal', $edit);
        }
        elseif($file != ""){
            $query = $this->db->get_where('proposal',array('proposal_id'=>$this->input->post('proposal_id')))->row();
                unlink(FCPATH."/upload/proposal/".$query->file);
                $file_name = str_replace('.','','proposal_'.$this->input->post('nim'));
                $config['upload_path']          = FCPATH.'/upload/proposal';
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
                $this->db->where('proposal_id', $this->input->post('proposal_id'));
                $result = $this->db->update('proposal', $edit);
            }
        }
		return $result;
	}

    public function deleteProposal($id)
	{
        $query = $this->db->get_where('proposal',array('proposal_id'=>$id))->row();
        unlink(FCPATH."/upload/proposal/".$query->file);
        $penguji1 = $query->penguji1;
        $penguji2 = $query->penguji2;
        $this->db->where('proposal_id', $id);
        $result = $this->db->delete('proposal');
        $this->db->where('nip', $penguji1);
        $result = $this->db->delete('penguji1');
        $this->db->where('nip', $penguji2);
        $result = $this->db->delete('penguji2');
		return $result;
	}

    public function getBimbingan()
	{
        $level = $this->session->userdata('level');

        if($level == 'admin'){
            $this->db->join('proposal', 'bimbingan_proposal.proposal_id = proposal.proposal_id');
            $this->db->join('mahasiswa', 'proposal.nim = mahasiswa.nim');
            $this->db->where('bimbingan_proposal.status_bimbingan', 'disetujui');
            $result = $this->db->get('bimbingan_proposal');
		
        }
        elseif($level == 'dosen'){
            $user_id = $this->session->userdata('user_id');
            $dosen = $this->db->get_where('dosen',array('user_id'=>$user_id))->row();
            $nip = $dosen->nip;

            $this->db->join('proposal', 'bimbingan_proposal.proposal_id = proposal.proposal_id');
            $this->db->join('mahasiswa', 'proposal.nim = mahasiswa.nim');
            $this->db->where('dosbing1',$nip);
            $result = $this->db->get('bimbingan_proposal');
        }
		return $result;
	}

    public function insertBimbingan()
	{
        $query = $this->db->get_where('proposal',array('proposal_id'=>$this->input->post('proposal_id')))->row();
        unlink(FCPATH."/upload/proposal/".$query->file);
        $file = $_FILES['file_bimbingan']['name'];
        if($file != ""){
            $file_name = str_replace('.','','proposal_'.$query->nim);
            $config['upload_path']          = FCPATH.'/upload/proposal';
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
                    'proposal_id' => $this->input->post('proposal_id'),
                    'waktu_bimbingan' => $this->input->post('waktu_bimbingan'),
                    'file_bimbingan' => $uploaded_data['file_name'],
                    'link' => $this->input->post('link'),
                    'status_bimbingan' => 'disetujui',
                    
                );
                $result = $this->db->insert('bimbingan_proposal', $insert);
            }
        }
        else{
            $this->session->set_flashdata('error', 'File PDF tidak boleh kosong');
			redirect('ProposalController/tambahBimbingan');
        }
		
		return $result;
	}

    public function getDetailBimbingan($id)
	{
		$this->db->where('bimbingan_proposal_id',$id);
		$result = $this->db->get('bimbingan_proposal')->result_array();
		return $result[0];
	}

    public function editBimbingan()
	{
        $file = $_FILES['file_bimbingan']['name'];
        
        if($file == ""){
            $edit = array(
                    'proposal_id' => $this->input->post('proposal_id'),
                    'waktu_bimbingan' => $this->input->post('waktu_bimbingan'),
                    'link' => $this->input->post('link'),
            );
            $this->db->where('bimbingan_proposal_id', $this->input->post('bimbingan_proposal_id'));
            $result = $this->db->update('bimbingan_proposal', $edit);
        }
        elseif($file != ""){
            $query = $this->db->get_where('proposal',array('proposal_id'=>$this->input->post('proposal_id')))->row();
                unlink(FCPATH."/upload/proposal/".$query->file);
                $file_name = str_replace('.','','proposal_'.$query->nim);
                $config['upload_path']          = FCPATH.'/upload/proposal';
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
                        'proposal_id' => $this->input->post('proposal_id'),
                    'waktu_bimbingan' => $this->input->post('waktu_bimbingan'),
                    'file_bimbingan' => $uploaded_data['file_name'],
                    'link' => $this->input->post('link'),
                        
                    );
                $this->db->where('bimbingan_proposal_id', $this->input->post('bimbingan_proposal_id'));
                $result = $this->db->update('bimbingan_proposal', $edit);
            }
        }
		return $result;
	}

    public function deleteBimbingan($id)
	{
        $this->db->where('bimbingan_proposal_id', $id);
        $result = $this->db->delete('bimbingan_proposal');
		return $result;
	}

    public function insertPenguji($id)
	{
        $query = $this->db->get_where('dosen',array('nip'=>$this->input->post('penguji1')))->row();
        $nama_penguji1 = $query->name_dos;
        $query2 = $this->db->get_where('dosen',array('nip'=>$this->input->post('penguji2')))->row();
        $nama_penguji2 = $query2->name_dos;
                $edit = array(
                    'penguji1' => $this->input->post('penguji1'),
                    'penguji2' => $this->input->post('penguji2'),
                    
                );
                $this->db->where('proposal_id', $id);
                $result = $this->db->update('proposal', $edit);
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


/* End of file Proposal_model.php and path \application\models\Proposal_model.php */
