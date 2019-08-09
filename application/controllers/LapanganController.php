<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LapanganController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

	    $this->load->model('NotifModel','notif');
	    $this->load->model('LapanganModel','lm');
	    $this->load->model('KecukupanModel','km');
	}

	public function index()
	{
		$data = array(
			'title' => 'Assesmen Lapangan',
			'active_menu_as' => 'active',
			'active_menu_lp' => 'active',
			'notif' => $this->notif->getNotifProdi()->num_rows(),
			'notif_capel' => $this->notif->getNotifCapel()->num_rows(),
			'limit_prodi' => $this->notif->getLimitProdi(),
			'limit_capel' => $this->notif->getLimitCapel(),
			'limit_dokumen' => $this->notif->getLimitDokumen(),
			'notif_dokumen' => $this->notif->getNotifDokumen()->num_rows(),
			'notif_jadwal' => $this->notif->getNotifJadwal()->num_rows(),
			'limit_jadwal' => $this->notif->getLimitJadwal(),
			'notif_kecukupan' => $this->notif->getNotifKecukupan(),
			'limit_kecukupan' => $this->notif->getLimitKecukupan(),
			'content' => $this->lm->getLapangan()
		);

		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_lapangan',$data);
		$this->load->view('layouts/footer');
	}

	public function show()
	{
		$id_users = $this->input->get('id');
		$data = array(
			'content' => $this->lm->getDetailKecukupan($id_users),
			'tahun_lulus' => $this->km->getTahunLulus(),
			'sum' => $this->km->getSumKecukupan($id_users),
			'koment' => $this->lm->getDetailKomentar($id_users)
		);
		$this->load->view('detail/d_lapangan',$data);
	}

	public function nilai()
	{
		$id_lapangan = $this->input->get('id');
		$data = array(
			'content' => $this->lm->getDetailLapangan($id_lapangan)
		);
		$this->load->view('detail/d_nilai',$data);
	}

	public function store_nilai()
	{
		$id_lapangan = $this->input->post('id_lapangan');

		$data = array(
			'status' => 1 ,
			'nilai' => $this->input->post('nilai')
		);
		unset($data['id_jadwal']);
		$res = $this->lm->proses_edit_nilai($id_lapangan,$data);

		if($res>=1){

			$this->session->set_userdata('proses','berhasil');
			redirect('lapangan');
		}
		else{

			$this->session->set_userdata('gagal_proses','gagal');
			redirect('lapangan');
		}
	}

	public function keterangan()
	{
		$id_lapangan = $this->input->get('id');
		$data = array(
			'content' => $this->lm->getDetailLapangan($id_lapangan)
		);
		$this->load->view('detail/d_keterangan',$data);
	}

	public function input_keterangan()
	{
		$data = $this->input->post(null,true);
		$res = $this->db->insert('keterangan', $data);
		if($res>=1){

			$this->session->set_userdata('proses','berhasil');
			redirect('lapangan');
		}
		else{

			$this->session->set_userdata('gagal_proses','gagal');
			redirect('lapangan');
		}
	}

	

}

/* End of file LapanganController.php */
/* Location: ./application/controllers/LapanganController.php */