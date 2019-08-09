<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KecukupanController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		//untuk menecegah user mengakases halaman secara langsung
		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

	    //loadmodel
	    $this->load->model('KecukupanModel','km');
	    $this->load->model('NotifModel','notif');
	}

	//Halaman Utama
	public function index()
	{
		$data = array(
			'title' => 'Assesmen Kecukupan',
			'active_menu_as' => 'active',
			'active_menu_kc' => 'active',
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
			'content' => $this->km->getKecukupan(),
			'check_add' => $this->km->checkAdd()
		);

		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_kecukupan',$data);
		$this->load->view('layouts/footer');
	}

	//Fungsi Sebelum Input Assesmen Kecukupan
	public function before_add()
	{
		$data = array(
			'title' => 'Input Assesmen Kecukupan',
			'active_menu_as' => 'active',
			'active_menu_kc' => 'active',
			'notif' => $this->notif->getNotifProdi()->num_rows(),
			'notif_capel' => $this->notif->getNotifCapel()->num_rows(),
			'limit_prodi' => $this->notif->getLimitProdi(),
			'limit_capel' => $this->notif->getLimitCapel(),
			'limit_dokumen' => $this->notif->getLimitDokumen(),
			'notif_dokumen' => $this->notif->getNotifDokumen()->num_rows(),
			'notif_jadwal' => $this->notif->getNotifJadwal()->num_rows(),
			'limit_jadwal' => $this->notif->getLimitJadwal(),
			'ins' => $this->km->getInstrumen()  
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('create/c_instrumen',$data);
		$this->load->view('layouts/footer');
	}

	//Halaman input assesmen kecukupan
	public function add()
	{
		$data = array(
			'title' => 'Input Assesmen Kecukupan',
			'active_menu_as' => 'active',
			'active_menu_kc' => 'active',
			'notif' => $this->notif->getNotifProdi()->num_rows(),
			'notif_capel' => $this->notif->getNotifCapel()->num_rows(),
			'limit_prodi' => $this->notif->getLimitProdi(),
			'limit_capel' => $this->notif->getLimitCapel(),
			'limit_dokumen' => $this->notif->getLimitDokumen(),
			'notif_dokumen' => $this->notif->getNotifDokumen()->num_rows(),
			'notif_jadwal' => $this->notif->getNotifJadwal()->num_rows(),
			'limit_jadwal' => $this->notif->getLimitJadwal(),
			'tahun_lulus' => $this->km->getTahunLulus(),
			'id_ins' => $this->input->post('id_ins')
		);

		$this->load->view('layouts/header',$data);
		$this->load->view('create/c_kecukupan',$data);
		$this->load->view('layouts/footer');
	}

	//fungsi tambah ke database
	public function store()
	{
		$no = count($this->input->post('jum_lulusan'));

		if ($no > 0) {
			
			for($i=0; $i<$no; $i++)  
			{  
				if($this->input->post('jum_lulusan')[$i] != '')  
				{  
					  $data = array(
					  	'jum_lulusan' => $this->input->post('jum_lulusan')[$i],
					  	'min_ipk' => $this->input->post('min_ipk')[$i],
					  	'rata_ipk' => $this->input->post('rata_ipk')[$i],
					  	'maks_ipk' => $this->input->post('maks_ipk')[$i],
					  	'id_ins' => $this->input->post('id_ins')[$i],
					  	'status' => $this->input->post('status')[$i],
					  	'id_users' => $this->input->post('id_users')[$i], 
					  );

					 $this->db->insert('kecukupan', $data);

				}  
			}  
			$this->session->set_userdata('proses','berhasil');
			redirect('kecukupan');

		}else{
			echo "Harap Isi Semua Inputan";
		}
	}

	//fungsi detail untuk mengambil data
	public function show()
	{
		$id_users = $this->input->get('id');
		$data = array(
			'content' => $this->km->getDetailKecukupan($id_users),
			'tahun_lulus' => $this->km->getTahunLulus(),
			'sum' => $this->km->getSumKecukupan($id_users)
		);
		$this->load->view('detail/d_kecukupan',$data);
	}

	public function verifikasi($id_users)
	{
		$id_users = $this->uri->segment(3);

		$data['status'] = 1;

		$res = $this->km->proses_edit_verify($id_users,$data);

		if($res>=1){

			$this->session->set_userdata('proses','berhasil');
			redirect('kecukupan');
		}
		else{

			$this->session->set_userdata('gagal_proses','gagal');
			redirect('kecukupan');
		}	
	}

	public function komentar()
	{
		$id_users = $this->input->get('id');
		$data = array(
			'content' => $this->km->getKecukupan($id_users)
		);
		$this->load->view('detail/d_komentar',$data);
	}

	public function input_komentar()
	{
		$data = array(
			'id_users' => $this->input->post('id_users'),
			'id_ins' => $this->input->post('id_ins'),
			'id_komentar' => $this->input->post('id_komentar'),
			'komentar' => $this->input->post('komentar'),
			'status' => 0 
		);

		$res = $this->db->insert('lapangan', $data);

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

/* End of file KecukupanController.php */
/* Location: ./application/controllers/KecukupanController.php */