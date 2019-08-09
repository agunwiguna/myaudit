  <link href="<?=base_url()?>assets/back/dist/swt/sweetalert.css" rel="stylesheet" />
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Capaian Pembelajaran
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
                <th rowspan="3" style="vertical-align : middle;text-align:center;">Aksi</th>
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
            <tbody>
              <?php $no=1;foreach($prog as $index => $key){?>
              <tr>
                <td style="text-align:center;"><?=$no++;?></td>
                <td style="text-align:center;"><?=$key['nama_program']?></td>
                <td style="text-align:center;"><?=$content[$index]['jps']?></td>
                <td style="text-align:center;"><?=$content[$index]['ts2j']?></td>
                <td style="text-align:center;"><?=$content[$index]['ts1j']?></td>
                <td style="text-align:center;"><?=$content[$index]['tsj']?></td>
                <td style="text-align:center;"><?=$content[$index]['ts2r']?></td>
                <td style="text-align:center;"><?=$content[$index]['ts1r']?></td>
                <td style="text-align:center;"><?=$content[$index]['tsr']?> </td>
                <td>
                  <a href="#" class="open_modals" id='<?=$content[$index]['id']?>'>
                    <button class="btn btn-info btn-sm">
                      <span class="glyphicon glyphicon-edit"></span> Ubah
                    </button>
                  </a>
                </td>
               </tr>
                <input type="hidden" name="status" value="0">
                <input type="hidden" name="id_users" value="<?=$content[$index]['id_users']?>">
                <?php } ?> 
                  <?php foreach($total as $t){?> 
               <tr>
                <td></td>
                <td>Total</td>
                <td style="text-align:center;"><?=$t['total'];?></td>
                <td style="text-align:center;"><?=$t['total_ts2'];?></td>
                <td style="text-align:center;"><?=$t['total_ts1j'];?></td>
                <td style="text-align:center;"><?=$t['total_tsj'];?></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>

          <!-- Modal Update -->
        <div id="ModalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


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
<script src="<?=base_url()?>assets/back/dist/swt/sweetalert.min.js"></script>

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modals").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "<?=base_url('capaian/edit_capel')?>",
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
  
    //swal tambah berhasil
    <?php if($this->session->userdata('proses')){ ?>
      swal("Berhasil!", "Data Berhasl Tersimpan!", "success")
      <?php
      $this->session->unset_userdata('proses');
    } ?>

   //swal tambah gagal
   <?php if($this->session->userdata('gagal_proses')){ ?>
     swal("Gagal!", "Data Gagal Tersimpan!", "error")
     <?php
     $this->session->unset_userdata('gagal_proses');
   } ?>

</script>