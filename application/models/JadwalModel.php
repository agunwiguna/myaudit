<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalModel extends CI_Model {

	public function getJadwal()
	{
		$this->db->from("jadwal");
		$this->db->order_by("id_jadwal", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert_jadwal($data){
		$res = $this->db->insert('jadwal',$data);
		return $res;
	}

	public function getDetailJadwal($id_jadwal)
	{
		$query = $this->db->query("SELECT * FROM jadwal WHERE id_jadwal='$id_jadwal'");
		return $query->result_array();
	}

	public function proses_edit_jadwal($id_jadwal,$data){
		$this->db->where(array('id_jadwal' => $id_jadwal));
		$res = $this->db->update('jadwal',$data);
		return $res;
	}

	public function proses_delete_jadwal($where){
		$this->db->where($where);
		$res = $this->db->delete("jadwal");
		return $res;
	}


}

/* End of file JadwalModel.php */
/* Location: ./application/models/JadwalModel.php */