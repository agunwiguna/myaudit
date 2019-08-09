<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Data Capaian</h4>
      </div>
      <div class="modal-body">
      
        <form action="<?=base_url('update_capaian')?>" method="post">
          <table class="table table-bordered">
          <thead>
            <tr>
              <th rowspan="2" style="vertical-align : middle;text-align:center;">Jumlah PS</th>
              <th colspan="3"><center>Jumlah Lulusan pada</center></th>
              <th colspan="3"><center>Rata-rata IPK Lulusan pada</center></th>
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
            <?php foreach($content as $d){?>
            <input type="hidden" name="id" value="<?=$d['id']?>">
            <input type="hidden" name="status" value="0">
            <input type="hidden" name="id_users" value="<?=$d['id_users']?>"> 
            <tr>
                <td>
                   <input type="number" class="form-control" value="<?=$d['jps']?>" name="jps" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" class="form-control" value="<?=$d['ts2j']?>" name="ts2j" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" class="form-control" value="<?=$d['ts1j']?>" name="ts1j" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" class="form-control" value="<?=$d['tsj']?>" name="tsj" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" class="form-control" value="<?=$d['ts2r']?>" name="ts2r" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" class="form-control" value="<?=$d['ts1r']?>" name="ts1r" placeholder="0" size="1" required>
                </td>
                <td>
                  <input type="number" class="form-control" value="<?=$d['tsr']?>" name="tsr" placeholder="0" size="1" required>
                </td>
            </tr>
            <?php } ?>
            <tr>
              <td colspan="7" style="text-align: right;"><button type="submit" class="btn btn-primary">Ubah</button></td>
            </tr>
        
          </tbody> 
        </table>
        </form>

        
        <div class="modal-footer">
          
        </div>
    </div>
    <!-- /.modal-content -->
  </div>