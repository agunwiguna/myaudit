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
            <form action="<?=base_url('kecukupan/add')?>" method="POST">
            <div class="form-group col-md-12">
              <label for="matpel">Pilih Instrumen</label>
              <select class="form-control" name="id_ins" required>
                <option value="">-- Pilih --</option>
                <?php foreach ($ins as $k){ ?>
                  <option value="<?=$k['id_ins']?>"><?=$k['nama_ins']?></option>    
                <?php } ?>
              </select> 
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Selanjutnya</button>
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