
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Detail Data</h4>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                <table class="table table-striped" id="users">
                    <tbody>
                    <?php foreach($content as $d){?>                 
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Instrumen</td>
                            <td width="50px">:</td>
                            <td><?=$d['nama_ins'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Prodi</td>
                            <td width="50px">:</td>
                            <td><?=$d['prodi'] ?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Jurusan</td>
                            <td width="50px">:</td>
                            <td><?=$d['jurusan'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">No. SK</td>
                            <td width="50px">:</td>
                            <td><?=$d['no_sk'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Tanggal SK</td>
                            <td width="50px">:</td>
                            <td><?=$d['tgl_sk'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Pejabat</td>
                            <td width="50px">:</td>
                            <td><?=$d['pejabat'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Tahun Mulai</td>
                            <td width="50px">:</td>
                            <td><?=$d['thn_mulai'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Izin No. SK</td>
                            <td width="50px">:</td>
                            <td><?=$d['no_sk_izin'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Tanggal Izin No. SK</td>
                            <td width="50px">:</td>
                            <td><?=$d['tgl_sk_izin'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Akreditas</td>
                            <td width="50px">:</td>
                            <td><?=$d['akreditas'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">No. SK BAN</td>
                            <td width="50px">:</td>
                            <td><?=$d['no_sk_ban'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Kontak</td>
                            <td width="50px">:</td>
                            <td><?=$d['kontak'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Faks</td>
                            <td width="50px">:</td>
                            <td><?=$d['faks'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Email</td>
                            <td width="50px">:</td>
                            <td><?=$d['email'] ?></td>
                        </tr>
                     <?php } ?>     
                    </tbody>
                </table>
            </div>
        </div>
    </div>