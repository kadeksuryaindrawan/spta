<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Ujian_model extends CI_Model 
{         
    public function getUjianProposal()
	{
		$this->db->join('proposal', 'ujian_proposal.proposal_id = ujian_proposal.proposal_id');
        $this->db->join('mahasiswa', 'proposal.nim = mahasiswa.nim');
		$result = $this->db->get('ujian_proposal');
		return $result;
	}  
    
    public function insertUjianProposal()
	{
        $query = $this->db->get_where('proposal',array('nim'=>$this->input->post('nim')))->row();
        $proposal_id = $query->proposal_id;
                $insert = array(
                    'proposal_id' => $proposal_id,
                    'waktu_ujian' => $this->input->post('waktu_ujian'),
                    'nilai' => NULL,
                    'status_up' => 'proses',
                    
                );
                $update = array(
                    'status_proposal' => 'ujian',
                    
                );
                $result = $this->db->insert('ujian_proposal', $insert);
                $result = $this->db->update('proposal', $update);
		
		return $result;
	}

    public function getDetailUjianProposal($id)
	{
        $query = $this->db->get_where('ujian_proposal',array('ujian_proposal_id'=>$id))->row();
        $proposal_id = $query->proposal_id;
        $this->db->join('proposal', 'ujian_proposal.proposal_id = proposal.proposal_id');
		$this->db->where('ujian_proposal_id',$id);
		$result = $this->db->get('ujian_proposal')->result_array();
		return $result[0];
	}

    public function editUjianProposal()
	{
        $query = $this->db->get_where('proposal',array('nim'=>$this->input->post('nim')))->row();
        $proposal_id = $query->proposal_id;
                    $edit = array(
                        'proposal_id' => $proposal_id,
                    'waktu_ujian' => $this->input->post('waktu_ujian'),
                        
                    );
                $this->db->where('ujian_proposal_id', $this->input->post('ujian_proposal_id'));
                $result = $this->db->update('ujian_proposal', $edit);
		return $result;
	}

    public function deleteUjianProposal($id)
	{
        $this->db->where('ujian_proposal_id', $id);
        $result = $this->db->delete('ujian_proposal');
		return $result;
	}

    public function getDetailNilaiProposal($id)
	{
        $this->db->join('proposal', 'ujian_proposal.proposal_id = proposal.proposal_id');
        $this->db->join('mahasiswa', 'proposal.nim = mahasiswa.nim');
		$this->db->where('ujian_proposal_id',$id);
		$result = $this->db->get('ujian_proposal')->result_array();
		return $result[0];
	}

    public function nilaiUjianProposal($id)
	{
        $query = $this->db->get_where('ujian_proposal',array('ujian_proposal_id'=>$id))->row();
        $proposal_id = $query->proposal_id;
        $query = $this->db->get_where('proposal',array('proposal_id'=>$proposal_id))->row();
        $nim = $query->nim;
        $nilai = $this->input->post('nilai');
        if($nilai >=90 && $nilai <= 100){
            $edit = array(
                'nilai' => $nilai,
                'grade' => 'A',
                'status_up' => 'lulus',
                
            );
            $editmhs = array(
            'status' => 'lulus UP',
                
            );
            $editproposal = array(
                'status_proposal' => 'lulus',
                );
        }
        elseif($nilai >=80 && $nilai <= 89){
            $edit = array(
                'nilai' => $nilai,
                'grade' => 'AB',
            'status_up' => 'lulus',
                
            );
            $editmhs = array(
            'status' => 'lulus UP',
                
            );
            $editproposal = array(
                'status_proposal' => 'lulus',
                );
        }
        elseif($nilai >=70 && $nilai <= 79){
            $edit = array(
                'nilai' => $nilai,
                'grade' => 'B',
            'status_up' => 'lulus',
                
            );
            $editmhs = array(
            'status' => 'lulus UP',
                
            );
            $editproposal = array(
                'status_proposal' => 'lulus',
                );
        }

        elseif($nilai >=60 && $nilai <= 69){
            $edit = array(
                'nilai' => $nilai,
                'grade' => 'BC',
            'status_up' => 'lulus',
                
            );
            $editmhs = array(
            'status' => 'lulus UP',
                
            );
            $editproposal = array(
                'status_proposal' => 'lulus',
                );
        }
        elseif($nilai <=59){
            $edit = array(
                'nilai' => $nilai,
                'grade' => 'C',
            'status_up' => 'tidak lulus',
                
            );
        }
                    
                $this->db->where('ujian_proposal_id', $id);
                $result = $this->db->update('ujian_proposal', $edit);
                $this->db->where('proposal_id', $proposal_id);
                $result = $this->db->update('proposal', $editproposal);
                $this->db->where('nim', $nim);
                $result = $this->db->update('mahasiswa', $editmhs);
		return $result;
	}

    public function getUjianTA()
	{
		$this->db->join('ta', 'ujian_ta.ta_id = ujian_ta.ta_id');
        $this->db->join('mahasiswa', 'ta.nim = mahasiswa.nim');
		$result = $this->db->get('ujian_ta');
		return $result;
	}  
    
    public function insertUjianTA()
	{
        $query = $this->db->get_where('ta',array('nim'=>$this->input->post('nim')))->row();
        $ta_id = $query->ta_id;
                $insert = array(
                    'ta_id' => $ta_id,
                    'waktu_ujian' => $this->input->post('waktu_ujian'),
                    'nilai' => NULL,
                    'status_uta' => 'proses',
                    
                );
                $update = array(
                    'status_ta' => 'ujian',
                    
                );
                $result = $this->db->insert('ujian_ta', $insert);
                $result = $this->db->update('ta', $update);
		
		return $result;
	}

    public function getDetailUjianTA($id)
	{
        $query = $this->db->get_where('ujian_ta',array('ujian_ta_id'=>$id))->row();
        $ta_id = $query->ta_id;
        $this->db->join('ta', 'ujian_ta.ta_id = ta.ta_id');
		$this->db->where('ujian_ta_id',$id);
		$result = $this->db->get('ujian_ta')->result_array();
		return $result[0];
	}

    public function editUjianTA()
	{
        $query = $this->db->get_where('ta',array('nim'=>$this->input->post('nim')))->row();
        $ta_id = $query->ta_id;
                    $edit = array(
                        'ta_id' => $ta_id,
                    'waktu_ujian' => $this->input->post('waktu_ujian'),
                        
                    );
                $this->db->where('ujian_ta_id', $this->input->post('ujian_ta_id'));
                $result = $this->db->update('ujian_ta', $edit);
		return $result;
	}

    public function deleteUjianTA($id)
	{
        $this->db->where('ujian_ta_id', $id);
        $result = $this->db->delete('ujian_ta');
		return $result;
	}

    public function getDetailNilaiTA($id)
	{
        $this->db->join('ta', 'ujian_ta.ta_id = ta.ta_id');
        $this->db->join('mahasiswa', 'ta.nim = mahasiswa.nim');
		$this->db->where('ujian_ta_id',$id);
		$result = $this->db->get('ujian_ta')->result_array();
		return $result[0];
	}

    public function nilaiUjianTA($id)
	{
        $query = $this->db->get_where('ujian_ta',array('ujian_ta_id'=>$id))->row();
        $ta_id = $query->ta_id;
        $query = $this->db->get_where('ta',array('ta_id'=>$ta_id))->row();
        $nim = $query->nim;
        $nilai = $this->input->post('nilai');
        if($nilai >=66 && $nilai <= 100){
            $edit = array(
                'nilai' => $nilai,
            'status_uta' => 'lulus',
                
            );
            $editmhs = array(
            'status' => 'lulus TA',
                
            );
            $editta = array(
                'status_ta' => 'lulus',
                    
                );
        }
        elseif($nilai <=65){
            $edit = array(
                'nilai' => $nilai,
            'status_uta' => 'tidak lulus',
                
            );
        }
                    
                $this->db->where('ujian_ta_id', $id);
                $result = $this->db->update('ujian_ta', $edit);
                $this->db->where('ta_id', $ta_id);
                $result = $this->db->update('ta', $editta);
                $this->db->where('nim', $nim);
                $result = $this->db->update('mahasiswa', $editmhs);
		return $result;
	}
}


/* End of file Ujian_model.php and path \application\models\Ujian_model.php */
