<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Data Auditor</h4>
      </div>
      <div class="modal-body">
        <?php foreach($content as $d){?> 
        <form action="<?=base_url('update_auditor')?>" method="POST" autocomplete="off" enctype="multipart/form-data">
          <input type="hidden" name="id_users" value="<?=$d['id_users']?>">
          <div class="form-group col-md-6">
            <label for="matpel">NIK</label>
            <input type="text" class="form-control" value="<?=$d['nik']?>" name="nik" placeholder="NIK Auditor"  required>
          </div>
          <div class="form-group col-md-6">
            <label for="matpel">Nama</label>
            <input type="text" class="form-control" value="<?=$d['nama']?>" name="nama" placeholder="Nama Auditor"  required>
          </div>
          <div class="form-group col-md-6">
            <label for="matpel">Tanggal Lahir</label>
            <input type="date" class="form-control" value="<?=$d['tnggal_lahir']?>" name="tnggal_lahir" required>
          </div>
          <div class="form-group col-md-6">
            <label for="jk">Jenis Kelamin</label>
            <select class="form-control" name="jk" required>
              <option value="">-- Pilih --</option>
              <option value="Laki-Laki" <?php if($d['jk'] == 'Laki-Laki') { echo 'selected'; } ?>>Laki-Laki</option>
              <option value="Perempuan" <?php if($d['jk'] == 'Perempuan') { echo 'selected'; } ?>>Perempuan</option>
            </select> 
          </div>
          <div class="form-group col-md-12">
            <label for="matpel">Alamat</label>
            <textarea name="alamat" class="form-control"><?=$d['alamat']?></textarea>
          </div>
          <div class="form-group col-md-6">
            <label for="matpel">Kontak</label>
            <input type="text" class="form-control" value="<?=$d['kontak']?>" name="kontak" placeholder="Kontak" required>
          </div>
          <div class="form-group col-md-6">
            <label for="matpel">Foto</label>
            <input type="file" class="form-control" name="foto">
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