<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DokumenController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

		$this->load->model('DokumenModel','dok');
		$this->load->model('NotifModel','notif');
	}

	public function index()
	{
		$id_users = $this->session->userdata('id_users');
		$data = array(
			'title' => 'Dokumen',
			'active_menu_dok' => 'active',
			'content' => $this->dok->getDokumen(),
			'content_users' => $this->dok->getUsersDokumen($id_users),
			'notif' => $this->notif->getNotifProdi()->num_rows(),
			'notif_capel' => $this->notif->getNotifCapel()->num_rows(),
			'limit_prodi' => $this->notif->getLimitProdi(),
			'limit_capel' => $this->notif->getLimitCapel(),
			'limit_dokumen' => $this->notif->getLimitDokumen(),
			'notif_dokumen' => $this->notif->getNotifDokumen()->num_rows(),
			'notif_jadwal' => $this->notif->getNotifJadwal()->num_rows(),
			'limit_jadwal' => $this->notif->getLimitJadwal(),
			'notif_kecukupan' => $this->notif->getNotifKecukupan(),
			'limit_kecukupan' => $this->notif->getLimitKecukupan()
		);

		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_dokumen',$data);
		$this->load->view('layouts/footer');		
	}

	public function add()
	{
		$data = array(
			'title' => 'Dokumen',
			'active_menu_dok' => 'active',
			'notif_jadwal' => $this->notif->getNotifJadwal()->num_rows(),
			'limit_jadwal' => $this->notif->getLimitJadwal()
		);

		$this->load->view('layouts/header',$data);
		$this->load->view('create/c_dokumen');
		$this->load->view('layouts/footer');
	}

	public function store()
	{

		if(! empty($_FILES)){

			$config['upload_path'] = "./assets/dokumen";
			$config['allowed_types'] = 'pdf|doc|docx';

			$this->load->library('upload');

			$files           = $_FILES;
			$number_of_files = count($_FILES['berkas']['name']);
			$errors = 0;

			//var_dump($number_of_files);

			// codeigniter upload just support one file
			// to upload. so we need a litte trick
			for ($i = 0; $i < $number_of_files; $i++)
			{
				$_FILES['berkas']['name'] = $files['berkas']['name'][$i];
				$_FILES['berkas']['type'] = $files['berkas']['type'][$i];
				$_FILES['berkas']['tmp_name'] = $files['berkas']['tmp_name'][$i];
				$_FILES['berkas']['error'] = $files['berkas']['error'][$i];
				$_FILES['berkas']['size'] = $files['berkas']['size'][$i];

				// we have to initialize before upload
				$this->upload->initialize($config);

				if (! $this->upload->do_upload("berkas")) {
					$errors++;
				}else{

					$data = array(
						'id_users' => $this->input->post('id_users')[$i],
						'ket' => $this->input->post('ket')[$i], 
						'status' => $this->input->post('status')[$i]
					);

					$data['berkas'] = $_FILES['berkas']['name'];
					
					$res = $this->db->insert('dokumen',$data);
				}	
			}

			$this->session->set_userdata('proses','berhasil');
			redirect('dokumen');

			if ($errors > 0) {
				
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('dokumen');
			}

		}	
	}

	public function verifikasi($id_dokumen)
	{
		$id_dokumen = $this->uri->segment(3);

		$data['status'] = 1;

		$res = $this->dok->proses_edit_data($id_dokumen,$data);

		if($res>=1){

			$this->session->set_userdata('proses','berhasil');
			redirect('dokumen');
		}
		else{

			$this->session->set_userdata('gagal_proses','gagal');
			redirect('dokumen');
		}
		
	}

	public function download($id_dokumen)
	{
		$id_dokumen = $this->uri->segment(3);

		if(!empty($id_dokumen)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->dok->get_data_where(array('id_dokumen' => $id_dokumen));

            //var_dump($fileInfo);
            
            //file path
			foreach($fileInfo as $data){
				$berkas = $data['berkas'];
			}
            
            //download file from directory
            force_download('assets/dokumen/'.$berkas, NULL);
        }
	}

	public function edit()
	{
		$id_dokumen = $this->input->get('id');
		$data = array(
			'content' => $this->db->query("SELECT * FROM dokumen WHERE id_dokumen='$id_dokumen'")->result_array()
		);
		$this->load->view('update/u_dokumen',$data);
	}

	public function update()
	{
		$id_dokumen = $this->input->post('id_dokumen');
		if ($_FILES['berkas']['name']){
			$config = array(
				'upload_path'		=> 'assets/dokumen/',
				'allowed_types'		=> 'pdf|doc|docx',
				'max_size'			=> 100000
			);
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('berkas')){
				$error = $this->upload->display_errors();
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('auditor');
			}else{
				$ambildata = $this->dok->getDocs($id_dokumen);
				foreach($ambildata as $doc){
					unlink('assets/dokumen/'.$doc['berkas']);
				}
				
				$data['ket'] = $this->input->post('ket');

				unset($data['id_dokumen']);
				$data['berkas'] = $this->upload->data('file_name');
				$res = $this->dok->proses_edit_dokumen($id_dokumen,$data);
				$error_db = $this->db->error('message');
				if($res>=1){
					$this->session->set_userdata('proses','berhasil');
					redirect('dokumen');
				}
				else{
					$this->session->set_userdata('gagal_proses','gagal');
					redirect('dokumen');
				}
			}
		}else{ 

			$data['ket'] = $this->input->post('ket');

			unset($data['id_dokumen']);
			$res = $this->dok->proses_edit_dokumen($id_dokumen,$data);
			$error_db = $this->db->error('message');
			if($res>=1){
				$this->session->set_userdata('proses','berhasil');
				redirect('dokumen');
			}else{
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('dokumen');
			}
		}
	}

	public function delete($id_dokumen)
	{
		$id_dokumen = $this->uri->segment(3);
        $this->db->where('id_dokumen',$id_dokumen);
        $get_doc_file=$this->db->get('dokumen')->row();
        @unlink('assets/dokumen/'.$get_doc_file->berkas);
        $this->db->where('id_dokumen',$id_dokumen);
        $this->db->delete('dokumen');

        $this->session->set_userdata('proses_hapus','berhasil');
		redirect('dokumen');
	}

}

/* End of file DokumenController.php */
/* Location: ./application/controllers/DokumenController.php */