<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstrumenController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

	    $this->load->model('InstrumenModel','ins');
	    $this->load->model('MasterModel','mm');
	    $this->load->model('NotifModel','notif');
		
	}

	public function index()
	{
		$id_users = $this->session->userdata('id_users');
		$level ='Auditee';
		$data = array(
			'title' => 'Identitas Prodi',
			'active_menu_ins' => 'active',
			'active_menu_prodi' => 'active',
			'pre' => $this->ins->getEditProdi($id_users),
			'content' => $this->ins->getProdi(),
			'ins' => $this->ins->getInstrumen(),
			'mm' => $this->mm->getDataUsers($level),
			'tot' => $this->ins->CountUsersProdi($id_users),
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
		$this->load->view('read/v_prodi',$data);
		$this->load->view('layouts/footer');
	}

	public function add_prodi()
	{
		$data = array(
			'title' => 'Input Prodi',
			'active_menu_ins' => 'active',
			'active_menu_prodi' => 'active',
			'ins' => $this->ins->getInstrumen()
		);

		$this->load->view('layouts/header',$data);
		$this->load->view('create/c_prodi',$data);
		$this->load->view('layouts/footer');
	}

	public function insert_prodi()
	{
		$data = $this->input->post(null,true);
		$query = $this->ins->insert_prodi($data);

		if($query>=1){
	        $this->session->set_userdata('proses','berhasil');
	        redirect('prodi');
	    }else{
	        $this->session->set_userdata('gagal_proses','gagal');
	        redirect('prodi');
	    }
	}

	public function update_prodi()
	{
		$id_prodi = $this->input->post('id_prodi');
		$data = $this->input->post(null, true);
		unset($data['id_prodi']);
		$res = $this->ins->proses_edit_data($id_prodi,$data);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('prodi');
		}
		else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('prodi');
		}
	}

	public function edit_prodi($id_prodi)
	{
		$id_prodi = $this->uri->segment(3);
		$data = array(
			'content' => $this->ins->getDetailprodi($id_prodi),
			'ins' => $this->ins->getInstrumen()
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('update/u_prodi',$data);
		$this->load->view('layouts/footer');
	}

	public function verifikasi($id_prodi)
	{
		$id_prodi = $this->uri->segment(3);

		$data['status'] = 1;

		$res = $this->ins->proses_edit_data($id_prodi,$data);

		if($res>=1){

			$this->session->set_userdata('proses','berhasil');
			redirect('prodi');
		}
		else{

			$this->session->set_userdata('gagal_proses','gagal');
			redirect('prodi');
		}
		
	}

	public function detail_prodi()
	{
		$id_prodi = $this->input->get('id');
		$data = array(
			'content' => $this->ins->getDetailprodi($id_prodi)
		);
		$this->load->view('detail/d_prodi',$data);
	}

	public function delete_prodi($id_prodi)
	{
		$id_prodi = $this->uri->segment(3);
		$id_prodi = array( 'id_prodi' => $id_prodi );
		$res = $this->ins->proses_delete_prodi($id_prodi);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('prodi');
		}
		else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('prodi');
		}
	}

	public function capaian()
	{
		$id_users = $this->session->userdata('id_users');
		//var_dump($id_users);
		$data = array(
			'title' => 'Capaian Pembelajaran',
			'active_menu_cp' => 'active',
			'active_menu_ins' => 'active',
			'content' => $this->ins->getCapelUsers(),
			'content_admin' => $this->ins->getCapelAdmin(),
			'tots' => $this->ins->CountUsersCapel($id_users)->num_rows(),
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
		$this->load->view('read/v_capaian',$data);
		$this->load->view('layouts/footer');
	}

	public function add_capaian()
	{
		$data = array(
			'title' => 'Input Capaian',
			'active_menu_ins' => 'active',
			'active_menu_cp' => 'active',
			'prog' => $this->db->get('program')->result_array(),
			'notif_jadwal' => $this->notif->getNotifJadwal()->num_rows(),
			'limit_jadwal' => $this->notif->getLimitJadwal()
		);

		$this->load->view('layouts/header',$data);
		$this->load->view('create/c_capel',$data);
		$this->load->view('layouts/footer');
	}

	public function insert_capel()
	{
		$no = count($this->input->post('jps'));

		if ($no > 0) {
			
			for($i=0; $i<$no; $i++)  
			{  
				if($this->input->post('jps')[$i] != '')  
				{  
					  $data = array(
					  	'jps' => $this->input->post('jps')[$i],
					  	'ts2j' => $this->input->post('ts2j')[$i],
					  	'ts1j' => $this->input->post('ts1j')[$i],
					  	'tsj' => $this->input->post('tsj')[$i],
					  	'ts2r' => $this->input->post('ts2r')[$i],
					  	'ts1r' => $this->input->post('ts1r')[$i],
					  	'tsr' => $this->input->post('tsr')[$i],
					  	'status' => $this->input->post('status')[$i],
					  	'id_users' => $this->input->post('id_users')[$i], 
					  );

					 $this->db->insert('capel', $data);

				}  
			}  
			$this->session->set_userdata('proses','berhasil');
			redirect('capaian');

		}else{
			echo "Please Enter Name";
		}
	}

	public function detail_capaian()
	{
		$id_users = $this->input->get('id');
		$data = array(
			'content' => $this->ins->getDetailCapaian($id_users),
			'prog' => $this->db->get('program')->result_array(),
			'total' => $this->ins->getTotal($id_users)
		);
		$this->load->view('detail/d_capaian',$data);
	}

	public function verifikasi_capel()
	{
		$id_users = $this->uri->segment(3);

		$data['status'] = 1;

		$res = $this->ins->proses_edit_verify($id_users,$data);

		if($res>=1){

			$this->session->set_userdata('proses','berhasil');
			redirect('capaian');
		}
		else{

			$this->session->set_userdata('gagal_proses','gagal');
			redirect('capaian');
		}
	}

	public function edit_capel($id_users)
	{
		$id_users = $this->uri->segment(3);
		$data = array(
			'title' => 'Update Capaian',
			'active_menu_ins' => 'active',
			'active_menu_cp' => 'active',
			'content' => $this->ins->getDetailCapaian($id_users),
			'prog' => $this->db->get('program')->result_array(),
			'total' => $this->ins->getTotal($id_users)
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('update/u_capaian',$data);
		$this->load->view('layouts/footer');
	}

	public function edit_capel_row()
	{
		$id = $this->input->get('id');
		$data = array(
			'content' => $this->ins->getEditCapel($id)
		);
		$this->load->view('update/u_capel',$data);
	}

	public function update_capaian()
	{
		$id = $this->input->post('id');

		$data = array(
			'jps' => $this->input->post('jps'),
			'ts2j' => $this->input->post('ts2j'),
			'ts1j' => $this->input->post('ts1j'),
			'tsj' => $this->input->post('tsj'),
			'ts2r' => $this->input->post('ts2r'),
			'ts1r' => $this->input->post('ts1r'),
			'tsr' => $this->input->post('tsr'),
			'status' => $this->input->post('status'),
			'id_users' => $this->input->post('id_users'), 
		);

		unset($data['id']);
		$res = $this->ins->proses_edit_capaian($id,$data);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('capaian');
		}
		else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('capaian');
		}
	}



}

/* End of file InstrumenController.php */
/* Location: ./application/controllers/InstrumenController.php */