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
                <img src="<?php echo base_url();?>assets/images/databidang.jpeg">
            </div><br>
            <button class="btn btn-primary ag-grid-export-btn" data-toggle="modal" data-target="#tambah">
                <i class="fa fa-plus"></i>&nbsp;Input Data
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table id="tb_bidang" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NOMOR</th>
                                    <th>NAMA BIDANG</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($getBidang as $data) { ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$data['nama_bidang']?></td>
                                    <td align="center">
                                        <button type="button" class="btn btn-warning" data-toggle='modal' 
                                        data-target="#edit<?php echo $data['id_bidang'];?>"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-danger" data-toggle='modal' 
                                        data-target="#hapus<?php echo $data['id_bidang'];?>"><i class="fa fa-trash-o bigger-130"></i>&nbsp;Hapus</button>
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

    <?php foreach($getBidang as $data): ?>
    <!-- Modal Edit -->
    <div class="modal fade text-left" id="edit<?php echo $data['id_bidang'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel140" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning white">
                    <h5 class="modal-title" id="myModalLabel140">Edit Bidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('bidang'); ?>" method="post">
                    <div class="modal-body">
                        <label>Nama Bidang</label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama Bidang" class="form-control" name="nama_bidang" value="<?php echo $data['nama_bidang']; ?>" required>
                        </div>
                        <input type="hidden" name="id_bidang" value="<?php echo $data['id_bidang'];?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning" name="updatebidang"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade text-left" id="hapus<?php echo $data['id_bidang'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h5 class="modal-title" id="myModalLabel120">Hapus Bidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('bidang'); ?>" method="post">
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                    </div>
                    <input type="hidden" name="id_bidang" value="<?php echo $data['id_bidang'];?>">
                    <div class="modal-footer">
                        <button type="submit" name="hapusbidang" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach;?>

    <!-- Modal Tambah -->
    <div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h5 class="modal-title" id="myModalLabel160">Input Bidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('bidang'); ?>" method="post">
                    <div class="modal-body">
                        <label>Nama Bidang</label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama Bidang" class="form-control" name="nama_bidang" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="tambahbidang"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
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
            $('#tb_bidang').DataTable();
        });
    </script>

    <!-- Stop refresh -->
    <script>
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
    </script>