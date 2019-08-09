<link href="<?=base_url()?>assets/back/dist/swt/sweetalert.css" rel="stylesheet" />
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Auditee
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Auditee</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
            <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
          </button>
          <a href="<?=base_url('auditeepdf')?>">
            <button type="button" class="btn btn-danger">Cetak PDF</button>
          </a>

          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Input Data Auditee</h4>
                  </div>
                  <div class="modal-body">
                    <form action="<?=base_url('input_auditee')?>" method="POST" autocomplete="off" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                      <label for="matpel">NIK</label>
                      <input type="text" class="form-control" name="nik" placeholder="NIK Auditee"  required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="matpel">Nama</label>
                      <input type="text" class="form-control" name="nama" placeholder="Nama Auditee"  required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="matpel">Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Username"  required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="matpel">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password"  required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="matpel">Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tnggal_lahir" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="matpel">Jenis Kelamin</label>
                      <select class="form-control" name="jk" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select> 
                    </div>
                    <div class="form-group col-md-12">
                      <label for="matpel">Alamat</label>
                      <textarea name="alamat" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="matpel">Kontak</label>
                      <input type="text" class="form-control" name="kontak" placeholder="Kontak" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="matpel">Foto</label>
                      <input type="file" class="form-control" name="foto" required>
                    </div>

                  </div>
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
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>              
                    <th>Jenis Kelamin</th>
                    <th>Kontak</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach($content as $d){?>               
                   <tr>
                    <td><?=$no++;?></td>
                    <td><?=$d['nik']?></td>
                    <td><?=$d['nama']?></td>
                    <td><?=$d['tnggal_lahir']?></td>
                    <td><?=$d['jk']?></td>
                    <td><?=$d['kontak']?></td>
                    <td>
                      <img src="<?=base_url()?>assets/img/<?=$d['foto']?>" width="100" height="100" class="img-thumbnail">
                    </td>
                    <td>
                      <a href="#" class="open_modal" id='<?=$d['id_users']?>'>
                        <button class="btn btn-success btn-sm">
                          <span class="glyphicon glyphicon-eye-open"></span>
                        </button>
                      </a>
                      <a href="#" class="open_modals" id='<?=$d['id_users']?>'>
                        <button class="btn btn-info btn-sm">
                          <span class="glyphicon glyphicon-edit"></span>
                        </button>
                      </a>
                      <a href="<?=base_url('auditor/delete/'.$d['id_users']) ?>" class="delete-link" >
                        <button class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-trash"></span>
                        </button>
                      </a>
                    </td>
                  </tr>
            <?php } ?>              
          </tbody>
          <tfoot>
            <tr>
             <th>No.</th>
             <th>NIK</th>
             <th>Nama</th>
             <th>Tanggal Lahir</th>              
             <th>Jenis Kelamin</th>
             <th>Kontak</th>
             <th>Foto</th>
             <th>Aksi</th>
            </tr>
          </tfoot>
        </table>

        <!-- Modal Detail -->
        <div id="ModalAuditor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        </div>

        <!-- Modal Update -->
        <div id="ModalAuditorUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
          url: "<?=base_url('auditor/detail')?>",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#ModalAuditor").html(ajaxData);
            $("#ModalAuditor").modal('show',{backdrop: 'true'});
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
          url: "<?=base_url('auditee/edit')?>",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#ModalAuditorUpdate").html(ajaxData);
            $("#ModalAuditorUpdate").modal('show',{backdrop: 'true'});
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