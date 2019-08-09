
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
                        <th style="vertical-align : middle;text-align:center;">Tahun Lulus.</th>
                        <th style="vertical-align : middle;text-align:center;">Jumlah Lulusan</th>
                        <th colspan="3"><center>Indeks Prestasi Kumulatif(IPK)</center></th>
                    </tr>
                    <tr>
                        <th><center>1</center></th>
                        <th><center>2</center></th>
                        <th><center>3</center></th>
                        <th><center>4</center></th>
                        <th><center>5</center></th>
                    </tr>
                </thead>
                 <tbody>
                      <?php $no=1;foreach($tahun_lulus as $index => $key){?>
                      <tr>
                        <td style="text-align:center;"><?=$key['nama_tahun']?></td>
                        <td style="text-align:center;">
                           <?=$content[$index]['jum_lulusan']?>
                        </td>
                        <td style="text-align:center;">
                            <?=$content[$index]['min_ipk']?>
                        </td>
                        <td style="text-align:center;">
                            <?=$content[$index]['rata_ipk']?>
                        </td>
                        <td style="text-align:center;">
                            <?=$content[$index]['maks_ipk']?>
                        </td>
                       </tr>
                        <?php } ?>
                        <?php foreach($sum as $t){?>
                        <tr>
                            <td colspan="2" style="text-align:center;"><strong>Rata-Rata</strong></td>
                            <td style="text-align:center;"><?=number_format($t['min_ipk']/3,2);?></td>
                            <td style="text-align:center;"><?=number_format($t['rata_ipk']/3,2);?></td>
                            <td style="text-align:center;"><?=number_format($t['maks_ipk']/3,2);?></td>
                        </tr> 
                        <?php } ?> 
                    </tbody>
                </table>    

            </div>
        </div>
    </div>