<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstrumenModel extends CI_Model {

	public function getInstrumen()
	{
		$query = $this->db->get('instrumen');
		return $query->result_array();
	}

	public function getProdi()
	{
		$this->db->select('*');
		$this->db->from('prodi a');
		$this->db->join('instrumen b', 'b.id_ins = a.id_ins');
		$this->db->join('users c', 'c.id_users = a.id_users');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getEditProdi($id_users)
	{
		$this->db->select('*');
		$this->db->from('prodi a');
		$this->db->join('instrumen b', 'b.id_ins = a.id_ins');
		$this->db->join('users c', 'c.id_users = a.id_users');
		$this->db->where('a.id_users', $id_users);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function CountUsersProdi($id_users)
	{
		$this->db->select('*');
		$this->db->from('prodi a');
		$this->db->join('instrumen b', 'b.id_ins = a.id_ins');
		$this->db->join('users c', 'c.id_users = a.id_users');
		$this->db->where('a.id_users', $id_users);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert_prodi($data){
		$res = $this->db->insert('prodi',$data);
		return $res;
	}

	public function proses_edit_data($id_prodi,$data){
		$this->db->where('id_prodi',$id_prodi);
		$res = $this->db->update('prodi',$data);
		return $res;
	}

	public function getDetailprodi($id_prodi)
	{
		$this->db->select('*');
		$this->db->from('prodi a');
		$this->db->join('instrumen b', 'b.id_ins = a.id_ins');
		$this->db->join('users c', 'c.id_users = a.id_users');
		$this->db->where('id_prodi', $id_prodi);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function proses_delete_prodi($where){
		$this->db->where($where);
		$res = $this->db->delete("prodi");
		return $res;
	}

	public function getCapelUsers()
	{
		$id_users = $this->session->userdata('id_users');
		$this->db->select('*');
		$this->db->from('capel a');
		$this->db->where('id_users', $id_users);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getCapelAdmin()
	{
		$this->db->distinct();
		$this->db->select('nama,status,a.id_users');
		$this->db->from('capel a');
		$this->db->join('users b', 'b.id_users = a.id_users');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDetailCapaian($id_users)
	{
		$query = $this->db->query("SELECT * FROM capel WHERE id_users='$id_users'");
		return $query->result_array();
	}

	public function getEditCapel($id)
	{
		$query = $this->db->query("SELECT * FROM capel WHERE id='$id'");
		return $query->result_array();
	}

	public function getTotal($id_users)
	{
		$query = $this->db->query("SELECT SUM(jps) AS total, SUM(ts2j) AS total_ts2, SUM(ts1j) AS total_ts1j, SUM(tsj) AS total_tsj FROM capel WHERE id_users='$id_users'");
		return $query->result_array();
	}

	public function proses_edit_verify($id_users,$data){
		$this->db->where('id_users',$id_users);
		$res = $this->db->update('capel',$data);
		return $res;
	}

	public function proses_edit_capaian($id,$data){
		$this->db->where(array('id' => $id));
		$res = $this->db->update('capel',$data);
		return $res;
	}

	public function CountUsersCapel($id_users)
	{
		// $query = $this->db->query("SELECT count(DISTINCT(nama)) AS totalz FROM capel JOIN users ON 'users.id_users' = 'capel.id_users' WHERE 'capel.id_users'='$id_users'");
		// return $query->result_array();
		$this->db->select('*');
		$this->db->from('capel a');
		$this->db->join('users b', 'b.id_users = a.id_users');
		$this->db->where('a.id_users', $id_users);
		$query = $this->db->get();
		return $query;
	}

	

}

/* End of file InstrumenModel.php */
/* Location: ./application/models/InstrumenModel.php */