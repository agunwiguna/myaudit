<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function login($username,$password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query =  $this->db->get('users');
		return $query->num_rows();
	}

  	//untuk mengambil data hasil login
	public function data_login($username,$password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('users')->row();
	}

	public function proses_edit_users($id_users,$data){
		$this->db->where('id_users',$id_users);
		$res = $this->db->update('users',$data);
		return $res;
	}

	

}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */