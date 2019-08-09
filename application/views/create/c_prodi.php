  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Prodi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Identitas Prodi</a></li>
        <li class="active">Input Prodi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          

          <form role="form" action="<?=base_url('input_prodi')?>" method="post" autocomplete="off">
            <div class="box-body">
              <div class="form-group col-md-3">
                <label for="id_ins">Instrumen</label>
                <select class="form-control" name="id_ins" required>
                  <option value="">-- Pilih --</option>
                  <?php foreach ($ins as $g){ ?>
                    <option value="<?=$g['id_ins']?>"><?=$g['nama_ins']?></option>    
                  <?php } ?>
                </select> 
              </div>
              <div class="form-group col-md-3">
                <label for="nama">Prodi</label>
                <select class="form-control" name="prodi" required>
                  <option value="">-- Pilih --</option>
                  <option value="Agroteknologi">Agroteknologi</option>
                  <option value="Sistem Informasi">Sistem Informasi</option>
                </select> 
              </div>
              <div class="form-group col-md-3">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan.." required> 
              </div>
              <div class="form-group col-md-3">
                <label for="no_sk">No. SK</label>
                <input type="text" class="form-control" id="no_sk" name="no_sk" placeholder="No. SK.." required>
              </div>
              <div class="form-group col-md-3">
                <label for="tgl_sk">Tanggal SK</label>
                <input type="date" class="form-control" id="tgl_sk" name="tgl_sk" required>
              </div>
              <div class="form-group col-md-3">
                <label for="pejabat">Pejabat</label>
                <input type="text" class="form-control" id="pejabat" name="pejabat" placeholder="Pejabat.." required>
              </div>
              <div class="form-group col-md-3">
                <label for="thn_mulai">Tahun Mulai</label>
                <input type="text" class="form-control" id="thn_mulai" name="thn_mulai" placeholder="Tahun Mulai.." required>
              </div>
              <div class="form-group col-md-3">
                <label for="no_sk_izin">Izin No. SK</label>
                <input type="text" class="form-control" id="no_sk_izin" name="no_sk_izin" placeholder="Pejabat.." required>
              </div>
              <div class="form-group col-md-4">
                <label for="tgl_sk_izin">Izin Tanggal SK</label>
                <input type="date" class="form-control" id="tgl_sk_izin" name="tgl_sk_izin" required>
              </div>
              <div class="form-group col-md-4">
                <label for="akreditas">Akreditas</label>
                <input type="text" class="form-control" id="akreditas" name="akreditas" placeholder="Akreditas.." required>
              </div>
              <div class="form-group col-md-4">
                <label for="no_sk_ban">BAN No. SK</label>
                <input type="text" class="form-control" id="no_sk_ban" name="no_sk_ban" placeholder="BAN No. SK.." required>
              </div>
              <div class="form-group col-md-4">
                <label for="kontak">Kontak</label>
                <input type="text" class="form-control" id="kontak" placeholder="08XXX.." name="kontak" required>
              </div>
              <div class="form-group col-md-4">
                <label for="faks">Faks</label>
                <input type="text" class="form-control" id="faks" name="faks" placeholder="Faks.." required>
              </div>
              <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
              </div>
            </div>
            <input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users');?>">
            <input type="hidden" name="status" value="0">
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->