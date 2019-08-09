<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPdf extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('pdf');
	}

	public function index()
	{
		$pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'AUDIT MUTU INTERNAL',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR AUDITOR',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NIK',1,0);
        $pdf->Cell(55,6,'NAMA',1,0);
        $pdf->Cell(27,6,'ALAMAT',1,0);
        $pdf->Cell(35,6,'TANGGAL LAHIR',1,0);
        $pdf->Cell(30,6,'JENIS KELAMIN',1,0);
        $pdf->Cell(25,6,'KONTAK',1,1);
        $pdf->SetFont('Arial','',10);
        $data = $this->db->query("SELECT * FROM users WHERE level='Auditor'")->result();
        foreach ($data as $row){
            $pdf->Cell(20,6,$row->nik,1,0);
            $pdf->Cell(55,6,$row->nama,1,0);
            $pdf->Cell(27,6,$row->alamat,1,0);
            $pdf->Cell(35,6,$row->tnggal_lahir,1,0);
            $pdf->Cell(30,6,$row->jk,1,0);
            $pdf->Cell(25,6,$row->kontak,1,1); 
        }
        $pdf->Output();
	}

    public function auditee()
    {
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'AUDIT MUTU INTERNAL',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR AUDITEE',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NIK',1,0);
        $pdf->Cell(55,6,'NAMA',1,0);
        $pdf->Cell(27,6,'ALAMAT',1,0);
        $pdf->Cell(35,6,'TANGGAL LAHIR',1,0);
        $pdf->Cell(30,6,'JENIS KELAMIN',1,0);
        $pdf->Cell(25,6,'KONTAK',1,1);
        $pdf->SetFont('Arial','',10);
        $data = $this->db->query("SELECT * FROM users WHERE level='Auditee'")->result();
        foreach ($data as $row){
            $pdf->Cell(20,6,$row->nik,1,0);
            $pdf->Cell(55,6,$row->nama,1,0);
            $pdf->Cell(27,6,$row->alamat,1,0);
            $pdf->Cell(35,6,$row->tnggal_lahir,1,0);
            $pdf->Cell(30,6,$row->jk,1,0);
            $pdf->Cell(25,6,$row->kontak,1,1); 
        }
        $pdf->Output();
    }

    public function jadwal()
    {
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(290,7,'AUDIT MUTU INTERNAL',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(290,7,'JADWAL AUDIT',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,9,'',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'JENIS',1,0,'C');
        $pdf->Cell(35,6,'AUDITEE',1,0,'C');
        $pdf->Cell(35,6,'TUJUAN',1,0,'C');
        $pdf->Cell(40,6,'AUDITOR 1',1,0,'C');
        $pdf->Cell(40,6,'AUDITOR 2',1,0,'C');
        $pdf->Cell(40,6,'AUDITOR 3',1,0,'C');
        $pdf->Cell(25,6,'MULAI',1,0,'C');
        $pdf->Cell(25,6,'SELESAI',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $data = $this->db->query("SELECT * FROM jadwal")->result();
        foreach ($data as $row){
            $pdf->Cell(30,6,$row->jenis,1,0);
            $pdf->Cell(35,6,$row->auditee,1,0);
            $pdf->Cell(35,6,$row->tujuan,1,0);
            $pdf->Cell(40,6,$row->auditor1,1,0);
            $pdf->Cell(40,6,$row->auditor2,1,0);
            $pdf->Cell(40,6,$row->auditor3,1,0);
            $pdf->Cell(25,6,$row->tgl_mulai,1,0);
            $pdf->Cell(25,6,$row->tgl_selesai,1,1);  
        }
        $pdf->Output();
    }

}

/* End of file LaporanPdf.php */
/* Location: ./application/controllers/LaporanPdf.php */