
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Detail Data</h4>
            </div>

            <div class="modal-body">
                <center>
                    <?php foreach($content as $d){?>
                    <img src="<?=base_url()?>assets/img/<?=$d['foto'] ?>" width="200" height="200" class="img-thumbnail">   
                    <?php } ?>
                </center>
                <br/>
                <div class="table-responsive">
                <table class="table table-striped" id="users">
                    <tbody>
                    <?php foreach($content as $d){?>                 
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">NIK</td>
                            <td width="50px">:</td>
                            <td><?=$d['nik'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Nama</td>
                            <td width="50px">:</td>
                            <td><?=$d['nama'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Username</td>
                            <td width="50px">:</td>
                            <td><?=$d['username'] ?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Tanggal Lahir</td>
                            <td width="50px">:</td>
                            <td><?=$d['tnggal_lahir'] ?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Jenis Kelamin</td>
                            <td width="50px">:</td>
                            <td><?=$d['jk'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Alamat</td>
                            <td width="50px">:</td>
                            <td><?=$d['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Status</td>
                            <td width="50px">:</td>
                            <td><?=$d['level'] ?></td>
                        </tr>
                     <?php } ?>     
                    </tbody>
                </table>
            </div>
        </div>
    </div>