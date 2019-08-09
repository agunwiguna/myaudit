<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifModel extends CI_Model {

	public function getNotifProdi()
	{
		$this->db->select('*');
		$this->db->from('prodi');
		$this->db->where('status', 0);
		$query = $this->db->get();
		return $query;
	}

	public function getLimitProdi()
	{
		$this->db->select('*');
		$this->db->from('prodi');
		$this->db->where('status', 0);
		$this->db->limit(5);
		$this->db->order_by("id_prodi", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getNotifCapel()
	{
		$this->db->distinct();
		$this->db->select('nama','status');
		$this->db->from('capel a');
		$this->db->join('users b', 'b.id_users = a.id_users');
		$this->db->where('status', 0);
		$query = $this->db->get();
		return $query;
	}

	public function getLimitCapel()
	{
		$this->db->distinct();
		$this->db->select('nama');
		$this->db->from('capel a');
		$this->db->join('users b', 'b.id_users = a.id_users');
		$this->db->limit(5);
		$this->db->order_by("id", "desc");
		$this->db->where('status', 0);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getNotifDokumen()
	{
		$this->db->select('*');
		$this->db->from('dokumen');
		$this->db->where('status', 0);
		$query = $this->db->get();
		return $query;
	}

	public function getLimitDokumen()
	{
		$this->db->select('*');
		$this->db->from('dokumen');
		$this->db->where('status', 0);
		$this->db->limit(5);
		$this->db->order_by("id_dokumen", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getNotifJadwal()
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->where('status', 0);
		$query = $this->db->get();
		return $query;
	}

	public function getLimitJadwal()
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->where('status', 0);
		$this->db->limit(5);
		$this->db->order_by("id_jadwal", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getNotifKecukupan()
	{
		$query = $this->db->query("SELECT DISTINCT(id_users) AS jumlah FROM kecukupan");
		return $query->num_rows();
	}

	public function getLimitKecukupan()
	{
		$query = $this->db->query("SELECT DISTINCT nama_ins,nama,status,id_users,id_ins FROM kecukupan a JOIN instrumen b USING(id_ins) JOIN users c USING(id_users) ORDER BY id_kecukupan DESC LIMIT 5");
		return $query->result_array();
	}

	

}

/* End of file NotifModel.php */
/* Location: ./application/models/NotifModel.php */