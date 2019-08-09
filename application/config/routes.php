<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'AuthController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Auth
$route['login'] = 'AuthController/index';
$route['login/proses'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';

//Dashboard
$route['dashboard'] = 'HomeController/index';

//Pengaturan
$route['pengaturan'] = 'HomeController/setting';
$route['update_users'] = 'AuthController/update_akun';
$route['ubah_password'] = 'AuthController/update_password';

//Master
$route['auditor'] = 'MasterController/index';
$route['input_auditor'] = 'MasterController/input_auditor';
$route['auditor/detail'] = 'MasterController/detail_auditor';
$route['auditor/edit'] = 'MasterController/edit_auditor';
$route['update_auditor'] = 'MasterController/update_auditor';
$route['auditor/delete/(:any)'] = 'MasterController/delete_auditor/(:any)';
$route['auditee'] = 'MasterController/auditee';
$route['input_auditee'] = 'MasterController/input_auditee';
$route['auditee/edit'] = 'MasterController/edit_auditee';
$route['update_auditee'] = 'MasterController/update_auditee';
$route['auditee/delete/(:any)'] = 'MasterController/delete_auditee/(:any)';

//Jadwal
$route['jadwal'] = 'JadwalController/index';
$route['input_jadwal'] = 'JadwalController/input_jadwal';
$route['jadwal/detail'] = 'JadwalController/detail_jadwal';
$route['jadwal/edit'] = 'JadwalController/edit_jadwal';
$route['update_jadwal'] = 'JadwalController/update_jadwal';
$route['jadwal/delete/(:any)'] = 'JadwalController/delete_jadwal/(:any)';
$route['jadwal/view/(:any)'] = 'JadwalController/view_notif_jadwal/(:any)';

//Instrumen
$route['prodi'] = 'InstrumenController/index';
$route['prodi/add'] = 'InstrumenController/add_prodi';
$route['input_prodi'] = 'InstrumenController/insert_prodi';
$route['prodi/verifikasi/(:any)'] = 'InstrumenController/verifikasi/(:any)';
$route['prodi/detail'] = 'InstrumenController/detail_prodi';
$route['prodi/edit/(:any)'] = 'InstrumenController/edit_prodi/(:any)';
$route['prodi/delete/(:any)'] = 'InstrumenController/delete_prodi/(:any)';
$route['update_prodi'] = 'InstrumenController/update_prodi';
$route['capaian'] = 'InstrumenController/capaian';
$route['input_capaian'] = 'InstrumenController/insert_capaian';
$route['capaian/add'] = 'InstrumenController/add_capaian';
$route['input_capel'] = 'InstrumenController/insert_capel';
$route['capaian/detail'] = 'InstrumenController/detail_capaian';
$route['capaian/verifikasi/(:any)'] = 'InstrumenController/verifikasi_capel/(:any)';
$route['capaian/edit/(:any)'] = 'InstrumenController/edit_capel/(:any)';
$route['capaian/edit_capel'] = 'InstrumenController/edit_capel_row';
$route['update_capaian'] = 'InstrumenController/update_capaian';

//Assesmen Kecukupan
$route['kecukupan'] = 'KecukupanController/index';
$route['kecukupan/instrumen'] = 'KecukupanController/before_add';
$route['kecukupan/add'] = 'KecukupanController/add';
$route['input_kecukupan'] = 'KecukupanController/store';
$route['kecukupan/detail'] = 'KecukupanController/show';
$route['kecukupan/verifikasi/(:any)'] = 'KecukupanController/verifikasi/(:any)';
$route['kecukupan/komentar'] = 'KecukupanController/komentar';
$route['input_komentar'] = 'KecukupanController/input_komentar';

//Assesmen Lapangan
$route['lapangan'] = 'LapanganController/index';
$route['lapangan/detail'] = 'LapanganController/show';
$route['lapangan/nilai'] = 'LapanganController/nilai';
$route['input_nilai'] = 'LapanganController/store_nilai';
$route['input_keterangan'] = 'LapanganController/input_keterangan';
$route['lapangan/keterangan'] = 'LapanganController/keterangan';

//Dokumen
$route['dokumen'] = 'DokumenController/index';
$route['dokumen/add'] = 'DokumenController/add';
$route['input_dokumen'] = 'DokumenController/store';
$route['dokumen/edit'] = 'DokumenController/edit';
$route['update_dokumen'] = 'DokumenController/update';
$route['dokumen/download/(:any)'] = 'DokumenController/download/(:any)';
$route['dokumen/verifikasi/(:any)'] = 'DokumenController/verifikasi/(:any)';
$route['dokumen/delete/(:any)'] = 'DokumenController/delete/(:any)';

//PDF
$route['auditorpdf'] = 'LaporanPdf/index';
$route['auditeepdf'] = 'LaporanPdf/auditee';
$route['jadwalpdf'] = 'LaporanPdf/jadwal';


//Settingan 
$route['(:any)'] = 'errors/show_404';
$route['(:any)/(:any)'] = 'errors/show_404';
$route['(:any)/(:any)/(:any)'] = 'errors/show_404';
