<link href="<?=base_url()?>assets/back/dist/swt/sweetalert.css" rel="stylesheet" />
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assesmen Kecukupan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Assesmen Kecukupan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

              <?php if ($this->session->userdata('level')=='Auditee'): ?>

                <?php if ($check_add>0): ?>

                  <button type="button" class="btn btn-info" disabled>
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
                  </button>
                  
                <?php else: ?>

                <a href="<?=base_url('kecukupan/instrumen')?>">
                  <button type="button" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
                  </button>
                </a>
                  
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

            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <td>No.</td>
                <td>Instrumen Audit</td>
                <td>Uploader</td>
                <td>Status</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;foreach($content as $d){?>
              <tr>
                <td><?=$no++;?></td>
                <td><?=$d['nama_ins']?></td>
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

                  <?php if ($this->session->userdata('level')=='Admin') { ?>

                    <?php if ($d['status']==0): ?>
              
                      <button class="btn btn-success btn-sm" disabled>
                        <span class="glyphicon glyphicon-eye-open"></span>
                      </button>
                   
                      <a href="<?=base_url('kecukupan/verifikasi/'.$d['id_users'])?>">
                       <button class="btn btn-success btn-sm">
                        <span class="glyphicon glyphicon-ok"></span> Verifikasi
                      </button>
                      </a>

                    <?php else: ?>

                      <a href="#" class="open_modal" id='<?=$d['id_users']?>'>
                        <button class="btn btn-success btn-sm">
                          <span class="glyphicon glyphicon-eye-open"></span>
                        </button>
                      </a>
                      <button class="btn btn-danger btn-sm disabled">
                        <span class="glyphicon glyphicon-ok"></span> Di Verifikasi
                      </button>

                  <?php endif ?>

                  <?php } else if ($this->session->userdata('level')=='Auditor'){ ?>

                      <?php if ($d['status']==0): ?>

                        <button class="btn btn-success btn-sm" disabled>
                          <span class="glyphicon glyphicon-eye-open"></span>
                        </button>
                                 
                        <button class="btn btn-info btn-sm" disabled>
                          Komentar
                        </button>
                                         
                      <?php else: ?>

                       <a href="#" class="open_modal" id='<?=$d['id_users']?>'>
                        <button class="btn btn-success btn-sm">
                          <span class="glyphicon glyphicon-eye-open"></span>
                        </button>
                      </a>
                      <a href="#" class="open_modals" id='<?=$d['id_users']?>'>
                        <button class="btn btn-info btn-sm">
                          Komentar
                        </button>
                      </a> 
                        
                      <?php endif ?>
               

                  <?php }else{ ?>

                    <a href="#" class="open_modal" id='<?=$d['id_users']?>'>
                      <button class="btn btn-success btn-sm">
                        <span class="glyphicon glyphicon-eye-open"></span>
                      </button>
                    </a>


                  <?php } ?>                      

                </td>
              </tr>  
            </tbody>
            <?php } ?>
            <tfoot>
              <tr>
                <td>No.</td>
                <td>Instrumen Audit</td>
                <td>Uploader</td>
                <td>Status</td>
                <td>Aksi</td>
              </tr>
            </tfoot>
          </table>

           <!-- Modal Detail -->
           <div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           </div>
           <!-- Modal Detail -->
           <div id="ModalDetails" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
          url: "<?=base_url('kecukupan/detail')?>",
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
          url: "<?=base_url('kecukupan/komentar')?>",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#ModalDetails").html(ajaxData);
            $("#ModalDetails").modal('show',{backdrop: 'true'});
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