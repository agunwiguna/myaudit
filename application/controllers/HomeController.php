<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

	    $this->load->model('NotifModel','notif');
	}

	public function index()
	{
		
		$data = array(
			'title' => 'Dashboard',
			'active_menu_db' => 'active',
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
		$this->load->view('layouts/content',$data);
		$this->load->view('layouts/footer');
	}

	public function setting()
	{
		$data = array(
			'title' => 'Pengaturan',
			'active_menu_set' => 'active',
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
		$this->load->view('read/v_setting',$data);
		$this->load->view('layouts/footer');
	}

}

/* End of file HomeController.php */
/* Location: ./application/controllers/HomeController.php */