  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ubah Data Jadwal</h4>
        </div>
        <div class="modal-body">
          <?php foreach($content as $d){?>
          <form action="<?=base_url('update_jadwal')?>" method="POST" autocomplete="off">
            <input type="hidden" name="id_jadwal" value="<?=$d['id_jadwal']?>">
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
              <input type="text" class="form-control" value="<?=$d['tujuan']?>" name="tujuan" placeholder="Tujuan" required>
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
              <input type="date" class="form-control" name="tgl_mulai" value="<?=$d['tgl_mulai']?>" required>
            </div>
            <div class="form-group col-md-6">
              <label for="matpel">Tanggal Selesai</label>
              <input type="date" class="form-control" name="tgl_selesai" value="<?=$d['tgl_selesai']?>" required>
            </div>
            <input type="hidden" name="status" value="0">
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
          <div class="modal-footer">
          </div>
        </form>
        <?php } ?> 
      </div>
      <!-- /.modal-content -->
    </div>