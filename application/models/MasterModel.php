<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterModel extends CI_Model {


	public function getDataUsers($level)
	{
		$query = $this->db->query("SELECT * FROM users WHERE level='$level'");
		return $query->result_array();
	}

	public function input_users($data)
	{
		$hit = $this->db->insert('users',$data);
		return $hit;
	}

	public function getUsers($id_users)
	{
		$query = $this->db->query("SELECT * FROM users WHERE id_users='$id_users'");
		return $query->result_array();
	}

	public function proses_edit_users($id_users,$data){
        $this->db->where(array('id_users' => $id_users));
        $res = $this->db->update('users',$data);
        return $res;
    }
	

}

/* End of file MasterModel.php */
/* Location: ./application/models/MasterModel.php */