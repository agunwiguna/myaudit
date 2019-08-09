  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Capaian Pembelajaran
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Capaian Pembelajaran</a></li>
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
                <th rowspan="2" style="vertical-align : middle;text-align:center;">No.</th>
                <th rowspan="2" style="vertical-align : middle;text-align:center;">Program Pendidikan</th>
                <th rowspan="2" style="vertical-align : middle;text-align:center;">Jumlah PS</th>
                <th colspan="3"><center>Jumlah Lulusan pada</center></th>
                <th colspan="3"><center>Rata-rata IPK Lulusan pada</center></th>
              </tr>
              <tr>
                <th style="text-align:center;">TS-2</th>
                <th style="text-align:center;">TS-1</th>
                <th style="text-align:center;">TS</th>
                <th style="text-align:center;">TS-2</th>
                <th style="text-align:center;">TS-1</th>
                <th style="text-align:center;">TS</th>
              </tr>
               <tr>
                <th><center>(1)</center></th>
                <th><center>(2)</center></th>
                <th><center>(3)</center></th>
                <th><center>(4)</center></th>
                <th><center>(5)</center></th>
                <th><center>(6)</center></th>
                <th><center>(7)</center></th>
                <th><center>(8)</center></th>
                <th><center>(9)</center></th>
              </tr>
            </thead>
            <form action="<?=base_url('input_capel')?>" method="POST">
            <tbody>
              <?php $no=1;foreach($prog as $d){?>
              <tr>
                <td><?=$no++;?></td>
                <td><?=$d['nama_program']?></td>
                <td>
                   <input type="number" step="any" class="form-control" name="jps[]" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" step="any" class="form-control" name="ts2j[]" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" step="any" class="form-control" name="ts1j[]" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" step="any" class="form-control" name="tsj[]" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" step="any" class="form-control" name="ts2r[]" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" step="any" class="form-control" name="ts1r[]" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" step="any" class="form-control" name="tsr[]" placeholder="0" size="1" required>
                </td>
               </tr>
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