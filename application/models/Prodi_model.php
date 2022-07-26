<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Prodi_model extends CI_Model 
{
    public function getProdi()
	{
		$result = $this->db->get('prodi');
		return $result;
	}  
    
    public function insertProdi()
	{

        $insert = array(
			'kode_prodi' => $this->input->post('kode_prodi'),
			'nama_prodi' => $this->input->post('nama_prodi'),
		);
		$result = $this->db->insert('prodi', $insert);

		return $result;
	}     
    
    public function deleteProdi($id)
	{
		$this->db->where('kode_prodi', $id);
		$result = $this->db->delete('prodi');
		return $result;
	}

    public function getDetailProdi($id)
	{
		$this->db->where('kode_prodi',$id);
		$result = $this->db->get('prodi')->result_array();
		return $result[0];
	}

    public function editProdi()
	{
		$edit = array(
			'kode_prodi' => $this->input->post('kode_prodi'),
			'nama_prodi' => $this->input->post('nama_prodi'),
		);
        $this->db->where('kode_prodi', $this->input->post('kode'));
		$result = $this->db->update('prodi', $edit);

		return $result;
	}
                        
}


/* End of file Prodi_model.php and path \application\models\Prodi_model.php */
