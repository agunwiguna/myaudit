<link href="<?=base_url()?>assets/back/dist/swt/sweetalert.css" rel="stylesheet" />
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jadwal
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jadwal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <?php if ($this->session->userdata('level')=='Admin'): ?>

          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
            <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
          </button>
            
          <?php endif ?>

          <a href="<?=base_url('jadwalpdf')?>">
            <button type="button" class="btn btn-danger">Cetak PDF</button>
          </a>

          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Input Data Jadwal</h4>
                  </div>
                  <div class="modal-body">
                    <form action="<?=base_url('input_jadwal')?>" method="POST" autocomplete="off">

                    <div class="form-group col-md-6">
                      <label for="matpel">Jenis Auditee</label>
                      <select class="form-control" name="jenis" required>
                        <option value="">-- Pilih --</option>
                        <option value="Program Studi">Program Studi</option>
                        <option value="Unit Kerja">Unit Kerja</option>
                        <option value="Pimpinan">Pimpinan</option>
                      </select> 
                    </div>
                    <div class="form-group col-md-6">
                      <label for="matpel">Auditee</label>
                      <select class="form-control" name="auditee" required>
                        <option value="">-- Pilih --</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Agroindustri">Agroindustri</option>
                        <option value="TPPM">TPPM</option>
                         <option value="Akademik">Akademik</option>
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="matpel">Tujuan</label>
                      <input type="text" class="form-control" name="tujuan" placeholder="Tujuan" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="matpel">Auditor 1</label>
                      <select class="form-control" name="auditor1" required>
                        <option value="">-- Pilih --</option>
                        <?php foreach ($users as $k){ ?>
                          <option value="<?=$k['nama']?>"><?=$k['nama']?></option>    
                        <?php } ?>
                      </select> 
                    </div>
                    <div class="form-group col-md-4">
                      <label for="matpel">Auditor 2</label>
                      <select class="form-control" name="auditor2" required>
                        <option value="">-- Pilih --</option>
                        <?php foreach ($users as $k){ ?>
                          <option value="<?=$k['nama']?>"><?=$k['nama']?></option>    
                        <?php } ?>
                      </select> 
                    </div>
                    <div class="form-group col-md-4">
                      <label for="matpel">Auditor 3</label>
                      <select class="form-control" name="auditor3" required>
                        <option value="">-- Pilih --</option>
                        <?php foreach ($users as $k){ ?>
                          <option value="<?=$k['nama']?>"><?=$k['nama']?></option>    
                        <?php } ?>
                      </select> 
                    </div>
                    <div class="form-group col-md-6">
                      <label for="matpel">Tanggal Mulai</label>
                      <input type="date" class="form-control" name="tgl_mulai" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="matpel">Tanggal Selesai</label>
                      <input type="date" class="form-control" name="tgl_selesai" required>
                    </div>
                  </div>
                  <input type="hidden" name="status" value="0">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </form>
              </div>
                <!-- /.modal-content -->
            </div>
              <!-- /.modal-dialog -->
          </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
           <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Jenis Auditee</th>
                    <th>Auditee</th>
                    <th>Tujuan</th>              
                    <th>Auditor 1</th>
                    <th>Auditor 2</th>
                    <th>Auditor 3</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach($content as $d){?>               
                   <tr>
                    <td><?=$no++;?></td>
                    <td><?=$d['jenis']?></td>
                    <td><?=$d['auditee']?></td>
                    <td><?=$d['tujuan']?></td>
                    <td><?=$d['auditor1']?></td>
                    <td><?=$d['auditor2']?></td>
                    <td><?=$d['auditor3']?></td>
                    <td>

                      <?php if ($this->session->userdata('level')=='Admin'): ?>

                        <a href="#" class="open_modal" id='<?=$d['id_jadwal']?>'>
                          <button class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-eye-open"></span>
                          </button>
                        </a>
                        <a href="#" class="open_modals" id='<?=$d['id_jadwal']?>'>
                          <button class="btn btn-info btn-sm">
                            <span class="glyphicon glyphicon-edit"></span>
                          </button>
                        </a>
                        <a href="<?=base_url('jadwal/delete/'.$d['id_jadwal']) ?>" class="delete-link" >
                          <button class="btn btn-danger btn-sm">
                            <span class="glyphicon glyphicon-trash"></span>
                          </button>
                        </a>
                        
                      <?php else: ?>

                        <a href="#" class="open_modal" id='<?=$d['id_jadwal']?>'>
                          <button class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Detail
                          </button>
                        </a>
                        
                      <?php endif ?>
                    </td>
                  </tr>
            <?php } ?>              
          </tbody>
          <tfoot>
            <tr>
             <th>No.</th>
             <th>Jenis Auditee</th>
             <th>Auditee</th>
             <th>Tujuan</th>              
             <th>Auditor 1</th>
             <th>Auditor 2</th>
             <th>Auditor 3</th>
             <th>Aksi</th>
            </tr>
          </tfoot>
        </table>

        <!-- Modal Detail -->
        <div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        </div>

        <!-- Modal Update -->
        <div id="ModalJadwalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        </div>

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
<!-- DataTables -->
<script src="<?=base_url()?>assets/back/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/back/dist/swt/sweetalert.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable();
  })
</script>

<script>
  $('#example1').dataTable({
  
      "autoWidth": false,
      "deferRender": true,
  
      "drawCallback": function() {
          $('.orderNumber').on('click', function () {
              var orderNum = $(this).text();
              console.log(orderNum);
          });
      }
  });
</script>

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "<?=base_url('jadwal/detail')?>",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#ModalDetail").html(ajaxData);
            $("#ModalDetail").modal('show',{backdrop: 'true'});
           }
         });
        });
      });
</script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modals").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "<?=base_url('jadwal/edit')?>",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#ModalJadwalUpdate").html(ajaxData);
            $("#ModalJadwalUpdate").modal('show',{backdrop: 'true'});
           }
         });
        });
      });
</script>

<script>
  jQuery(document).ready(function($){
    $('.delete-link').on('click',function(){
      var getLink = $(this).attr('href');
      swal({
        title: "Apa kamu yakin?",
        text: "Setelah di hapus, data akan hilang permanen!!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "Hapus!",
        cancelButtonText: "Batal !",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          window.location.href = getLink;
        } else {
          swal("Batal", "Data Batal di Hapus :)", "error");
        }
      });
      return false;
    });
  });
</script>

<script>
  
    //swal tambah berhasil
    <?php if($this->session->userdata('proses')){ ?>
      swal("Berhasil!", "Data Berhasl Tersimpan!", "success")
      <?php
      $this->session->unset_userdata('proses');
    } ?>

    //swal tambah hapus
    <?php if($this->session->userdata('proses_hapus')){ ?>
      swal("Berhasil!", "Data Berhasl Terhapus!", "success")
      <?php
      $this->session->unset_userdata('proses_hapus');
    } ?>

   //swal tambah gagal
   <?php if($this->session->userdata('gagal_proses')){ ?>
     swal("Gagal!", "Data Gagal Tersimpan!", "error")
     <?php
     $this->session->unset_userdata('gagal_proses');
   } ?>

</script>