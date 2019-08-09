
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
                            <td width="100px">Jenis Auditee</td>
                            <td width="50px">:</td>
                            <td><?=$d['jenis'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Auditee</td>
                            <td width="50px">:</td>
                            <td><?=$d['auditee'] ?></td>
                        </tr>
                         <tr>
                            <td width="30px"></td>
                            <td width="100px">Tujuan</td>
                            <td width="50px">:</td>
                            <td><?=$d['tujuan'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Auditor 1</td>
                            <td width="50px">:</td>
                            <td><?=$d['auditor1'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Auditor 2</td>
                            <td width="50px">:</td>
                            <td><?=$d['auditor2'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Auditor 3</td>
                            <td width="50px">:</td>
                            <td><?=$d['auditor3'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Tanggal Mulai</td>
                            <td width="50px">:</td>
                            <td><?=$d['tgl_mulai'] ?></td>
                        </tr>
                        <tr>
                            <td width="30px"></td>
                            <td width="100px">Tanggal Selesai</td>
                            <td width="50px">:</td>
                            <td><?=$d['tgl_mulai'] ?></td>
                        </tr>
                     <?php } ?>     
                    </tbody>
                </table>
            </div>
        </div>
    </div>