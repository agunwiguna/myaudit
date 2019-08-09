<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KecukupanModel extends CI_Model {

	public function getKecukupan()
	{
		$query = $this->db->query("SELECT DISTINCT nama_ins,nama,status,id_users,id_ins FROM kecukupan a JOIN instrumen b USING(id_ins) JOIN users c USING(id_users) ");
		return $query->result_array();
	}

	public function getTahunLulus()
	{
		$query = $this->db->get('tahun_lulus');
		return $query->result_array();
	}

	public function getInstrumen()
	{
		$query = $this->db->get('instrumen');
		return $query->result_array();
	}

	public function getDetailKecukupan($id_users)
	{
		$this->db->select('*');
		$this->db->from('kecukupan');
		$this->db->where('id_users', $id_users);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getUsersKecukupan($id_users)
	{
		$this->db->select('*');
		$this->db->from('kecukupan a');
		$this->db->join('instrumen b', 'b.id_ins = a.id_ins');
		$this->db->join('users c', 'c.id_users = a.id_users');
		$this->db->where('a.id_users', $id_users);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getSumKecukupan($id_users)
	{
		$query = $this->db->query("SELECT SUM(min_ipk) AS min_ipk,SUM(rata_ipk) AS rata_ipk ,SUM(maks_ipk) AS maks_ipk FROM kecukupan WHERE id_users='$id_users'");
		return $query->result_array();
	}

	public function proses_edit_verify($id_users,$data){
		$this->db->where('id_users',$id_users);
		$res = $this->db->update('kecukupan',$data);
		return $res;
	}

	public function checkAdd()
	{
		$query = $this->db->query("SELECT DISTINCT(id_users) AS jumlah FROM kecukupan");
		return $query->num_rows();
	}

}

/* End of file KecukupanModel.php */
/* Location: ./application/models/KecukupanModel.php */