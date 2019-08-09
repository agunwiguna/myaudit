<link href="<?=base_url()?>assets/back/dist/swt/sweetalert.css" rel="stylesheet" />
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Capaian Pembelajaran
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Capaian Pembelajaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <?php if ($this->session->userdata('level')== 'Auditee' || $this->session->userdata('level')== 'Auditor'): ?>

    

            <?php if ($tots == 0): ?>

              <a href="<?=base_url('capaian/add')?>">
                <button type="button" class="btn btn-info">
                  <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
                </button>
              </a>
              
            <?php else: ?>

                  <button type="button" class="btn btn-info" disabled>
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
                  </button>
              
            <?php endif ?>  

          
            
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


          <?php if ($this->session->userdata('level')=='Admin'): ?>

            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <td>No.</td>
                <td>Uploader</td>
                <td>Status</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;foreach($content_admin as $d){?>
              <tr>
                <td><?=$no++;?></td>
                <td><?= $d['nama']; ?></td>
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
                    <a href="<?=base_url('capaian/verifikasi/'.$d['id_users'])?>">
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
                    <button class="btn btn-success btn-sm disabled">
                      <span class="glyphicon glyphicon-eye-open"></span>
                    </button>
                <?php else: ?>
                    <a href="#" class="open_modal" id='<?=$d['id_users']?>'>
                    <button class="btn btn-success btn-sm">
                      <span class="glyphicon glyphicon-eye-open"></span>
                    </button>
                  </a>
                <?php endif ?>            
                </td>
              </tr>
              <?php } ?> 
            </tbody>
          </table>

          <?php else: ?>

          <table class="table table-bordered">
            <thead>
              <tr>
                <td>No.</td>
                <td>Uploader</td>
                <td>Status</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;foreach($content as $d){?>
              <tr>
                <td><?=$no++;?></td>
                <td><?= $this->session->userdata('nama'); ?></td>
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
                  <a href="<?=base_url('capaian/edit/').$d['id_users']?>">
                  <button class="btn btn-info btn-sm">
                    <span class="glyphicon glyphicon-edit"></span>
                  </button>
                </a>
                <?php else: ?>

                  <button class="btn btn-info btn-sm disabled">
                    <span class="glyphicon glyphicon-edit"></span>
                  </button>

                <?php endif ?>
                
                    <a href="#" class="open_modal" id='<?=$d['id_users']?>'>
                    <button class="btn btn-success btn-sm">
                      <span class="glyphicon glyphicon-eye-open"></span>
                    </button>
                  </a>          
                </td>
              </tr>
              <?php } ?> 
            </tbody>
          </table>
            
          <?php endif ?>

           <!-- Modal Detail -->
           <div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
          url: "<?=base_url('capaian/detail')?>",
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