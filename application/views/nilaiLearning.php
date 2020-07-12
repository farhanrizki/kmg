    <style>
        #over{
            width:100%;margin:auto;
        }
        #over img {
            display:block;border-radius:10px;
        }
    </style>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row" id="over">
                <img src="<?php echo base_url();?>assets/images/nilailearning.jpeg">
            </div><br>
            <button class="btn btn-primary ag-grid-export-btn" data-toggle="modal" data-target="#import">
                <i class="fa fa-download"></i>&nbsp;Import Data
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table id="tb_nilai" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID NILAI</th>
                                    <th>PN</th>
                                    <th>SELF LEARNING</th>
                                    <th>NILAI</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($getNilai as $data) { ?>
                                <tr>
                                    <td><?=$data['id_nilai']?></td>
                                    <td><?=$data['nama']?></td>
                                    <td><?=$data['nama_selflearning']?></td>
                                    <td><?=$data['nilai']?></td>
                                    <td align="center">
                                        <button type="button" class="btn btn-danger" data-toggle='modal' 
                                        data-target="#hapus<?php echo $data['id_nilai'];?>"><i class="fa fa-trash-o bigger-130"></i>&nbsp;Hapus</button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php foreach($getNilai as $data): ?>
    <!-- Modal Hapus -->
    <div class="modal fade text-left" id="hapus<?php echo $data['id_nilai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h5 class="modal-title" id="myModalLabel120">Hapus Nilai Self Learning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('nilai_learning'); ?>" method="post">
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                    </div>
                    <input type="hidden" name="id_nilai" value="<?php echo $data['id_nilai'];?>">
                    <div class="modal-footer">
                        <button type="submit" name="hapusnilai" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach;?>

    <!-- Modal Import -->
    <div class="modal fade text-left" id="import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h5 class="modal-title" id="myModalLabel160">Import File Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('nilai_learning'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label>File Excel</label>
                        <div class="form-group">
                            <input type="file" class="form-control" name="file" required>
                            <span style="color:red;">Hanya file excel dengan ekstensi .xls</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="import"><i class="fa fa-download"></i>&nbsp;Import</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Datatable -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.12.4.js"></script>
    <script>
        $(document).ready(function(){
            $('#tb_nilai').DataTable();
        });
    </script>

    <!-- Stop refresh -->
    <script>
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
    </script>