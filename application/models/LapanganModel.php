<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LapanganModel extends CI_Model {

	public function getLapangan()
	{
		$this->db->select('*');
		$this->db->from('lapangan a');
		$this->db->join('instrumen b', 'b.id_ins = a.id_ins');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function getDetailKecukupan($id_users)
	{
		$this->db->select('*');
		$this->db->from('lapangan a');
		$this->db->join('instrumen b', 'b.id_ins = a.id_ins');
		$this->db->join('kecukupan c', 'c.id_users = a.id_users');
		$this->db->join('users d', 'd.id_users = a.id_users');
		$this->db->where('a.id_users', $id_users);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDetailKomentar($id_users)
	{
		$query = $this->db->query("SELECT * FROM lapangan a JOIN users b ON a.id_komentar=b.id_users WHERE a.id_komentar='$id_users'");
		return $query->result_array();
	}


	public function getDetailLapangan($id_lapangan)
	{
		$this->db->select('*');
		$this->db->from('lapangan a');
		$this->db->join('instrumen b', 'b.id_ins = a.id_ins');
		$this->db->where('a.id_lapangan', $id_lapangan);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function proses_edit_nilai($id_lapangan,$data){
		$this->db->where('id_lapangan',$id_lapangan);
		$res = $this->db->update('lapangan',$data);
		return $res;
	}

	

}

/* End of file LapanganModel.php */
/* Location: ./application/models/LapanganModel.php */