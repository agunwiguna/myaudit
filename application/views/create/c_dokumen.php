<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Upload Dokumen
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dokumen</a></li>
        <li class="active">Upload Dokumen</li>
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
          

          <div class="container">
            <div class="form-group">
              <form name="add_name" method="POST" action="<?=base_url('input_dokumen')?>" enctype="multipart/form-data">
                <table class="table table-bordered" id="dynamic_field">
                  <tr>
                    <td></td>
                    <td>Keterangan Dokumen</td>
                    <td>Dokumen</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><input type="hidden" name="id_users[]" value="<?php echo $this->session->userdata('id_users');?>"></td>
                    <td><input type="text" name="ket[]" placeholder="Keterangan" class="form-control" required></td>
                    <td><input type="file" name="berkas[]" class="form-control name_list" required/></td> 
                     <td><input type="hidden" name="status[]" value="0"></td> 
                    <td><button type="button" name="add" id="add" class="btn btn-success">Tambah File</button></td>
                  </tr>
                </table>
                <button type="submit" class="btn btn-info">Simpan</button>
                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Simpan" /> -->  
              </form>
            </div>
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
<script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="hidden" name="id_users[]" value="<?php echo $this->session->userdata('id_users');?>"></td><td><input type="text" name="ket[]" placeholder="Keterangan" class="form-control" required></td><td><input type="file" name="berkas[]" class="form-control name_list" required/></td><td><input type="hidden" name="status[]" value="0"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      // $('#submit').click(function(){  

      //     $.ajax({  
      //           url:"<?=base_url('input_dokumen')?>",  
      //           method:"POST",         
      //           processData : false,
      //           contentType : false,  
      //           data:$('#add_name').serialize(),  
      //           success:function(data)  
      //           {  
      //                alert(data);  
      //                $('#add_name')[0].reset();  
      //           }  
      //      }); 
 
      // });  
 });  
 </script>