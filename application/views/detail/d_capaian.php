
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Detail Data</h4>
            </div>

            <div class="modal-body">

                <table class="table table-bordered">
                   <thead>
                      <tr>
                        <th rowspan="2" style="vertical-align : middle;text-align:center;">No.</th>
                        <th rowspan="2" style="vertical-align : middle;text-align:center;">Program Pendidikan</th>
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
                <td style="text-align:center;">
                   <?=$content[$index]['jps']?>
                </td>
                <td style="text-align:center;">
                    <?=$content[$index]['ts2j']?>
                </td>
                <td style="text-align:center;">
                    <?=$content[$index]['ts1j']?>
                </td>
                <td style="text-align:center;">
                    <?=$content[$index]['tsj']?>
                </td>
                <td style="text-align:center;">
                    <?=$content[$index]['ts2r']?>
                </td>
                <td style="text-align:center;">
                    <?=$content[$index]['ts1r']?>
                </td>
                <td style="text-align:center;">
                    <?=$content[$index]['tsr']?>
                </td>
               </tr>
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

            </div>
        </div>
    </div>