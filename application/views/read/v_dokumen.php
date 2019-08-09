<link href="<?=base_url()?>assets/back/dist/swt/sweetalert.css" rel="stylesheet" />
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dokumen
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dokumen</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <?php if ($this->session->userdata('level')=='Auditor' || $this->session->userdata('level')=='Auditee'): ?>

          <a href="<?=base_url('dokumen/add')?>">
            <button type="button" class="btn btn-info">
              <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Upload Dokumen
            </button>
          </a>
            
          <?php endif ?>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          <?php if ($this->session->userdata('level')== 'Auditee' || $this->session->userdata('level')== 'Auditor'): ?>
                
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Keterangan</th>
                    <th>File Name</th>
                    <th>Uploader</th>              
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach($content_users as $d){?>               
                   <tr>
                    <td><?=$no++;?></td>
                    <td><?=$d['ket']?></td>
                    <td><?=$d['berkas']?></td>
                    <td><?=$d['nama']?></td>
                    <td>

                      <?php if ($d['status']==0): ?>
                        <button class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span>Belum di Verifkasi
                        </button>
                      <?php else: ?>
                        <button class="btn btn-success btn-sm">
                          <span class="glyphicon glyphicon-ok"> Terverifikasi</span>
                        </button>
                      <?php endif ?>
                      
                        
                    </td>
                    <td>                   
                      <a href="#" class="open_modals" id='<?=$d['id_dokumen']?>'>
                        <button class="btn btn-info btn-sm">
                          <span class="glyphicon glyphicon-edit"></span>
                        </button>
                      </a>
                      <a href="<?=base_url('dokumen/delete/'.$d['id_dokumen']) ?>" class="delete-link" >
                        <button class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-trash"></span>
                        </button>
                      </a>
                    </td>
                  </tr>
                  <?php } ?> 

          <?php else: ?>

                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Keterangan</th>
                    <th>File Name</th>
                    <th>Uploader</th>              
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach($content as $d){?>               
                   <tr>
                    <td><?=$no++;?></td>
                    <td><?=$d['ket']?></td>
                    <td><?=$d['berkas']?></td>
                    <td><?=$d['nama']?></td>
                    <td>
                      <?php if ($d['status']==0): ?>
                        <button class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span>Belum di Verifkasi
                        </button>
                      <?php else: ?>
                        <button class="btn btn-success btn-sm">
                          <span class="glyphicon glyphicon-ok"> Terverifikasi</span>
                        </button>
                      <?php endif ?>
                      
                        
                    </td>
                    <td>

                      <?php if ($d['status']==0): ?>
                        <a href="<?=base_url('dokumen/verifikasi/'.$d['id_dokumen'])?>">
                           <button class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-ok"></span> Verifikasi
                          </button>
                        </a>

                      <?php else: ?>

                       <button class="btn btn-danger btn-sm disabled">
                        <span class="glyphicon glyphicon-ok"></span> Di Verifikasi
                      </button>
                        
                      <?php endif ?>
                  
                      <?php if ($d['status']==0): ?>
                       <a href="#" class="open_modal">
                        <button class="btn btn-success btn-sm" disabled>
                          <span class="glyphicon glyphicon-download-alt"></span>
                        </button>
                      </a>
                      <?php else: ?>
                        <a href="<?=base_url('dokumen/download/'.$d['id_dokumen'])?>">
                          <button class="btn btn-success btn-sm">
                            <span class="glyphicon glyphicon-download-alt"></span>
                          </button>
                        </a>
                      <?php endif ?>                    
                 
                      <a href="<?=base_url('jadwal/delete/'.$d['id_dokumen']) ?>" class="delete-link" >
                        <button class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-trash"></span>
                        </button>
                      </a>
                    </td>
                  </tr>
                  <?php } ?> 
            
          <?php endif ?>
          
                       
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Keterangan</th>
              <th>File</th>
              <th>Uploader</th>              
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>

        <!-- Modal Update -->
        <div id="ModalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modals").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "<?=base_url('dokumen/edit')?>",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#ModalUpdate").html(ajaxData);
            $("#ModalUpdate").modal('show',{backdrop: 'true'});
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