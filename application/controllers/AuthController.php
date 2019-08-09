<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('AuthModel','auth');
	}

	public function index()
	{
		$this->load->view('auth/v_login');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$login = $this->auth->login($this->input->post('username'), md5($this->input->post('password')));

			if ($login == 1) {
				$row = $this->auth->data_login($this->input->post('username'), md5($this->input->post('password')));
				$data = array(
					'logged' => TRUE,
					'id_users' => $row->id_users,
					'nik' => $row->nik,
					'nama' => $row->nama,
					'username' => $row->username,
					'tnggal_lahir' => $row->tnggal_lahir,
					'jk' => $row->jk,
					'alamat' => $row->alamat,
					'kontak' => $row->kontak,
					'level' => $row->level,
					'login'=> 'berhasil',
					'foto' => $row->foto,
				);
				$this->session->set_userdata($data);

				$this->session->set_userdata('sukses_login','sukses');
				redirect(site_url('dashboard'));
			} else {
				$this->session->set_userdata('gagal_proses','gagal');
				$this->index();
			}
		}
	}

	public function logout() {
      	//destroy session
		$this->session->sess_destroy();

      	//redirect ke halaman login
		redirect(site_url('login'));
	}

	public function update_akun()
	{
		if (!empty($_FILES['foto']['name'])) {
			$config = array(
				'upload_path'		=> 'assets/img/',
				'allowed_types'		=> 'gif|jpg|png',
				'max_size'			=> 100000
			);

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) {
				exit($this->upload->display_errors());
			}else{

				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'foto' => $this->upload->data('file_name')
				);

				$id_users = $this->session->userdata('id_users');
				$query = $this->auth->proses_edit_users($id_users,$data);
				if ($query) {
					$this->session->set_userdata($data);
			        redirect('pengaturan');
				} else {
					redirect('pengaturan');
				}
			}

		}else{

			$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
			);

			$id_users = $this->session->userdata('id_users');
			$query = $this->auth->proses_edit_users($id_users,$data);
			if ($query) {
				$this->session->set_userdata($data);
		        redirect('pengaturan');
			} else {
				redirect('pengaturan');
			}
		}	
	}

	public function update_password()
	{
		$data['password'] = md5($this->input->post('konfirmasi_password'));

		$users = $this->session->userdata('users');
		$query = $this->auth->proses_edit_users($users,$data);
		if ($query) {
	        redirect('logout');
		}else{
			$this->session->set_userdata('gagal_delete','gagal');
			redirect('logout');
		}
	}

}

/* End of file AuthController.php */
/* Location: ./application/controllers/AuthController.php */