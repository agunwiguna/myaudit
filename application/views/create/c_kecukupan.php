  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Assesmen Kecukupan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Assesmen Kecukupan</a></li>
        <li class="active">Form Input</li>
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
            
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="vertical-align : middle;text-align:center;">Tahun Lulus.</th>
                <th style="vertical-align : middle;text-align:center;">Jumlah Lulusan</th>
                <th colspan="3"><center>Indeks Prestasi Kumulatif(IPK)</center></th>
              </tr>
               <tr>
                <th><center>1</center></th>
                <th><center>2</center></th>
                <th><center>3</center></th>
                <th><center>4</center></th>
                <th><center>5</center></th>
              </tr>
            </thead>
            <form action="<?=base_url('input_kecukupan')?>" method="POST">
            <tbody>
              <?php $no=1;foreach($tahun_lulus as $d){?>
              <tr>
                <td><?=$d['nama_tahun']?></td>
                <td>
                   <input type="number" step="any" class="form-control" name="jum_lulusan[]" placeholder="0" size="1" required>
                </td>
                <td>
                   <input type="number" step="any" class="form-control" name="min_ipk[]" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" step="any" class="form-control" name="rata_ipk[]" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" step="any" class="form-control" name="maks_ipk[]" placeholder="0" size="1" required>
                </td>
               </tr>
               <input type="hidden" name="id_ins[]" value="<?=$id_ins?>">
                <input type="hidden" name="status[]" value="0">
                <input type="hidden" name="id_users[]" value="<?= $this->session->userdata('id_users'); ?>">
                <?php } ?> 
              <tr>
                <td colspan="9" style="vertical-align : right;text-align:right;"><button type="submit" class="btn btn-info">Simpan</button></td>
              </tr>
            </tbody>
            </form>
              
          </table>


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