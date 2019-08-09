<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

	    $this->load->model('MasterModel','master');
	    $this->load->model('NotifModel','notif');
	}

	public function index()
	{
		$level ='Auditor';
		$data = array(
			'title' => 'Data Auditor',
			'active_menu_master' => 'active',
			'active_menu_auditor' => 'active',
			'content' => $this->master->getDataUsers($level),
			'notif' => $this->notif->getNotifProdi()->num_rows(),
			'notif_capel' => $this->notif->getNotifCapel()->num_rows(),
			'limit_prodi' => $this->notif->getLimitProdi(),
			'limit_capel' => $this->notif->getLimitCapel(),
			'limit_dokumen' => $this->notif->getLimitDokumen(),
			'notif_dokumen' => $this->notif->getNotifDokumen()->num_rows(),
			'notif_kecukupan' => $this->notif->getNotifKecukupan(),
			'limit_kecukupan' => $this->notif->getLimitKecukupan()
		);

		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_auditor',$data);
		$this->load->view('layouts/footer');
	}

	public function input_auditor()
	{
		$config = array(
			'upload_path'		=> 'assets/img/',
			'allowed_types'		=> 'gif|jpg|png',
			'max_size'			=> 100000
		);
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('foto')){
			$error = $this->upload->display_errors();
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('auditor');
		}else{
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'tnggal_lahir' => $this->input->post('tnggal_lahir'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'kontak' => $this->input->post('kontak'),
				'level' => 'Auditor' 
			);
			$data['foto'] = $this->upload->data('file_name');
			$res = $this->master->input_users($data);
			$error_db = $this->db->error('message');
			if($res>=1){
				
				$this->session->set_userdata('proses','berhasil');
				redirect('auditor');
			}else{
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('auditor');
			}
		}
	}

	public function detail_auditor()
	{
		$id_users = $this->input->get('id');
		$data = array(
			'content' => $this->master->getUsers($id_users)
		);
		$this->load->view('detail/d_auditor',$data);
	}

	public function edit_auditor()
	{
		$id_users = $this->input->get('id');
		$data = array(
			'content' => $this->master->getUsers($id_users)
		);
		$this->load->view('update/u_auditor',$data);
	}

	public function update_auditor()
	{
		$id_users = $this->input->post('id_users');
		if ($_FILES['foto']['name']){
			$config = array(
				'upload_path'		=> 'assets/img/',
				'allowed_types'		=> 'gif|jpg|png',
				'max_size'			=> 10000
			);
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto')){
				$error = $this->upload->display_errors();
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('auditor');
			}else{
				$ambildata = $this->master->getUsers($id_users);
				foreach($ambildata as $foto){
					unlink('assets/img/'.$foto['foto']);
				}
				
				$data = array(
					'nik' => $this->input->post('nik'),
					'nama' => $this->input->post('nama'),
					'tnggal_lahir' => $this->input->post('tnggal_lahir'),
					'jk' => $this->input->post('jk'),
					'alamat' => $this->input->post('alamat'),
					'kontak' => $this->input->post('kontak'),
					'level' => 'Auditor' 
				);

				unset($data['id_users']);
				$data['foto'] = $this->upload->data('file_name');
				$res = $this->master->proses_edit_users($id_users,$data);
				$error_db = $this->db->error('message');
				if($res>=1){
					$this->session->set_userdata('proses','berhasil');
					redirect('auditor');
				}
				else{
					$this->session->set_userdata('gagal_proses','gagal');
					redirect('auditor');
				}
			}
		}else{ 
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'tnggal_lahir' => $this->input->post('tnggal_lahir'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'kontak' => $this->input->post('kontak'),
				'level' => 'Auditor' 
			);
			unset($data['id_users']);
			$res = $this->master->proses_edit_users($id_users,$data);
			$error_db = $this->db->error('message');
			if($res>=1){
				$this->session->set_userdata('proses','berhasil');
				redirect('auditor');
			}else{
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('auditor');
			}
		}
	}

	public function delete_auditor($id_users)
	{
		$id_users = $this->uri->segment(3);
        $this->db->where('id_users',$id_users);
        $get_image_file=$this->db->get('users')->row();
        @unlink('assets/img/'.$get_image_file->foto);
        $this->db->where('id_users',$id_users);
        $this->db->delete('users');

        $this->session->set_userdata('proses_hapus','berhasil');
		redirect('auditor');
	}


	public function auditee()
	{
		$level ='Auditee';
		$data = array(
			'title' => 'Data Auditee',
			'active_menu_master' => 'active',
			'active_menu_auditee' => 'active',
			'content' => $this->master->getDataUsers($level),
			'notif' => $this->notif->getNotifProdi()->num_rows(),
			'notif_capel' => $this->notif->getNotifCapel()->num_rows(),
			'limit_prodi' => $this->notif->getLimitProdi(),
			'limit_capel' => $this->notif->getLimitCapel(),
			'limit_dokumen' => $this->notif->getLimitDokumen(),
			'notif_dokumen' => $this->notif->getNotifDokumen()->num_rows(),
			'notif_kecukupan' => $this->notif->getNotifKecukupan(),
			'limit_kecukupan' => $this->notif->getLimitKecukupan()
		);

		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_auditee',$data);
		$this->load->view('layouts/footer');
	}

	public function input_auditee()
	{
		$config = array(
			'upload_path'		=> 'assets/img/',
			'allowed_types'		=> 'gif|jpg|png',
			'max_size'			=> 100000
		);
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('foto')){
			$error = $this->upload->display_errors();
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('auditee');
		}else{
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'tnggal_lahir' => $this->input->post('tnggal_lahir'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'kontak' => $this->input->post('kontak'),
				'level' => 'Auditee' 
			);
			$data['foto'] = $this->upload->data('file_name');
			$res = $this->master->input_users($data);
			$error_db = $this->db->error('message');
			if($res>=1){
				
				$this->session->set_userdata('proses','berhasil');
				redirect('auditee');
			}else{
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('auditee');
			}
		}
	}

	public function edit_auditee()
	{
		$id_users = $this->input->get('id');
		$data = array(
			'content' => $this->master->getUsers($id_users)
		);
		$this->load->view('update/u_auditee',$data);
	}

	public function update_auditee()
	{
		$id_users = $this->input->post('id_users');
		if ($_FILES['foto']['name']){
			$config = array(
				'upload_path'		=> 'assets/img/',
				'allowed_types'		=> 'gif|jpg|png',
				'max_size'			=> 10000
			);
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto')){
				$error = $this->upload->display_errors();
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('auditor');
			}else{
				$ambildata = $this->master->getUsers($id_users);
				foreach($ambildata as $foto){
					unlink('assets/img/'.$foto['foto']);
				}
				
				$data = array(
					'nik' => $this->input->post('nik'),
					'nama' => $this->input->post('nama'),
					'tnggal_lahir' => $this->input->post('tnggal_lahir'),
					'jk' => $this->input->post('jk'),
					'alamat' => $this->input->post('alamat'),
					'kontak' => $this->input->post('kontak'),
					'level' => 'Auditee' 
				);

				unset($data['id_users']);
				$data['foto'] = $this->upload->data('file_name');
				$res = $this->master->proses_edit_users($id_users,$data);
				$error_db = $this->db->error('message');
				if($res>=1){
					$this->session->set_userdata('proses','berhasil');
					redirect('auditee');
				}
				else{
					$this->session->set_userdata('gagal_proses','gagal');
					redirect('auditee');
				}
			}
		}else{ 
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'tnggal_lahir' => $this->input->post('tnggal_lahir'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'kontak' => $this->input->post('kontak'),
				'level' => 'Auditee' 
			);
			unset($data['id_users']);
			$res = $this->master->proses_edit_users($id_users,$data);
			$error_db = $this->db->error('message');
			if($res>=1){
				$this->session->set_userdata('proses','berhasil');
				redirect('auditee');
			}else{
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('auditee');
			}
		}
	}

	public function delete_auditee($id_users)
	{
		$id_users = $this->uri->segment(3);
        $this->db->where('id_users',$id_users);
        $get_image_file=$this->db->get('users')->row();
        @unlink('assets/img/'.$get_image_file->foto);
        $this->db->where('id_users',$id_users);
        $this->db->delete('users');

        $this->session->set_userdata('proses_hapus','berhasil');
		redirect('auditee');
	}

}

/* End of file MasterController.php */
/* Location: ./application/controllers/MasterController.php */