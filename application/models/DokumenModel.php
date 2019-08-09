<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DokumenModel extends CI_Model {

	public function getDokumen()
	{
		$this->db->select('*');
		$this->db->from('dokumen a');
		$this->db->join('users b','b.id_users=a.id_users');
		$this->db->order_by('id_dokumen','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getUsersDokumen($id_users)
	{
		$this->db->select('*');
		$this->db->from('dokumen a');
		$this->db->join('users b','b.id_users=a.id_users');
		$this->db->where('a.id_users', $id_users);
		$this->db->order_by('id_dokumen','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_where($where){		
		$data = $this->db->get_where("dokumen",$where);
		return $data->result_array();
	}

	public function proses_edit_data($id_dokumen,$data){
		$this->db->where('id_dokumen',$id_dokumen);
		$res = $this->db->update('dokumen',$data);
		return $res;
	}

	public function getDocs($id_dokumen)
	{
		$query = $this->db->query("SELECT * FROM dokumen WHERE id_dokumen='$id_dokumen'");
		return $query->result_array();
	}

	public function proses_edit_dokumen($id_dokumen,$data){
        $this->db->where(array('id_dokumen' => $id_dokumen));
        $res = $this->db->update('dokumen',$data);
        return $res;
    }

}

/* End of file DokumenModel.php */
/* Location: ./application/models/DokumenModel.php */