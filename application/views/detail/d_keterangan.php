
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Beri Keterangan</h4>
            </div>

            <div class="modal-body">
             <?php foreach($content as $d){?> 
                <form action="<?=base_url('input_keterangan')?>" method="POST" autocomplete="off">
                  <input type="hidden" name="id_lapangan" value="<?=$d['id_lapangan']?>">
                  <input type="hidden" name="id_users" value="<?=$this->session->userdata('id_users');?>">
                  <div class="form-group col-md-12">
                    <label for="matpel">Instrumen</label>
                    <input type="text" class="form-control" value="<?=$d['nama_ins']?>" name="nama_ins" disabled>
                </div>
                  <div class="form-group col-md-12">
                    <label for="matpel">Keterangan</label>
                    <textarea name="ket" class="form-control" rows="10"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form> 
            <?php } ?> 
            </div>
        </div>
    </div>