<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

		$this->load->model('JadwalModel','jd');
		$this->load->model('MasterModel','mm');
		$this->load->model('NotifModel','notif');	
	}

	public function index()
	{		
		$level = 'Auditor';
		$data = array(
			'title' => 'Jadwal',
			'active_menu_jadwal' => 'active',
			'users' => $this->mm->getDataUsers($level),
			'content' => $this->jd->getJadwal(),
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
		$this->load->view('read/v_jadwal',$data);
		$this->load->view('layouts/footer');
	}

	public function input_jadwal()
	{
		$data = $this->input->post(null,true);
		$query = $this->jd->insert_jadwal($data);
		if($query>=1){
	        $this->session->set_userdata('proses','berhasil');
	        redirect('jadwal');
	    }
	    else{
	        $this->session->set_userdata('gagal_proses','gagal');
	        redirect('jadwal');
	    }
	}

	public function detail_jadwal()
	{
		$id_jadwal = $this->input->get('id');
		$data = array(
			'content' => $this->jd->getDetailJadwal($id_jadwal)
		);
		$this->load->view('detail/d_jadwal',$data);
	}

	public function edit_jadwal()
	{
		$id_jadwal = $this->input->get('id');
		$level = 'Auditor';
		$data = array(
			'content' => $this->jd->getDetailJadwal($id_jadwal),
			'users' => $this->mm->getDataUsers($level)
		);
		$this->load->view('update/u_jadwal',$data);
	}

	public function update_jadwal()
	{
		$id_jadwal = $this->input->post('id_jadwal');
		$data = $this->input->post(null, true);
		unset($data['id_jadwal']);
		$res = $this->jd->proses_edit_jadwal($id_jadwal,$data);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('jadwal');
		}
		else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('jadwal');
		}
	}

	public function delete_jadwal($id_jadwal)
	{
		$id_jadwal = $this->uri->segment(3);
		$id_jadwal = array( 'id_jadwal' => $id_jadwal );
		$res = $this->jd->proses_delete_jadwal($id_jadwal);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('jadwal');
		}
		else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('jadwal');
		}
	}

	public function view_notif_jadwal($id_jadwal)
	{
		$id_jadwal = $this->uri->segment(3);

		$data['status'] = 1;
		unset($data['id_jadwal']);
		$res = $this->jd->proses_edit_jadwal($id_jadwal,$data);
		if($res>=1){
			redirect('jadwal');
		}
		else{
			redirect('jadwal');
		}

	}

}

/* End of file JadwalController.php */
/* Location: ./application/controllers/JadwalController.php */