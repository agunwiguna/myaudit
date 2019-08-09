<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Data Dokumen</h4>
      </div>
      <div class="modal-body">
        <?php foreach($content as $d){?> 
        <form action="<?=base_url('update_dokumen')?>" method="POST" autocomplete="off" enctype="multipart/form-data">
          <input type="hidden" name="id_dokumen" value="<?=$d['id_dokumen']?>">
          <div class="form-group col-md-12">
            <label for="matpel">Keterangan</label>
            <input type="text" class="form-control" value="<?=$d['ket']?>" name="ket" placeholder="Keterangan Dokumen"  required>
          </div>
          <div class="form-group col-md-12">
            <label for="matpel">Dokumen</label>
            <input type="file" class="form-control" name="berkas">
          </div>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
        <div class="modal-footer">
          
        </div>
      </form>
       <?php } ?> 
    </div>
    <!-- /.modal-content -->
  </div>