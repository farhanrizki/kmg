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
                <img src="<?php echo base_url();?>assets/images/staffapp.jpeg">
            </div><br>
            <button class="btn btn-primary ag-grid-export-btn" data-toggle="modal" data-target="#tambah">
                <i class="fa fa-plus"></i>&nbsp;Input Data
            </button>
            <button class="btn btn-primary ag-grid-export-btn" data-toggle="modal" data-target="#import">
                <i class="fa fa-download"></i>&nbsp;Import Data
            </button>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table id="tb_staff" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>PN</th>
                                    <th>NAMA</th>
                                    <th>BIDANG</th>
                                    <th>BAGIAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($staffApp as $data) { ?>
                                <tr>
                                    <td><?=$data['pn']?></td>
                                    <td><?=$data['nama']?></td>
                                    <td><?=$data['nama_bidang']?></td>
                                    <td><?=$data['nama_bagian']?></td>
                                    <td align="center">
                                        <button type="button" class="btn btn-warning" data-toggle='modal' 
                                        data-target="#edit<?php echo $data['pn'];?>"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-danger" data-toggle='modal' 
                                        data-target="#hapus<?php echo $data['pn'];?>"><i class="fa fa-trash-o bigger-130"></i>&nbsp;Hapus</button>
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

    <?php foreach($staffApp as $data): ?>
    <!-- Modal Edit -->
    <div class="modal fade text-left" id="edit<?php echo $data['pn'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel140" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning white">
                    <h5 class="modal-title" id="myModalLabel140">Edit Staff App</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('staff_app'); ?>" method="post">
                    <div class="modal-body">
                        <label>PN </label>
                        <div class="form-group">
                            <input type="text" placeholder="PN" class="form-control" name="pn" value="<?php echo $data['pn']; ?>" readonly>
                        </div>
                        <label>Nama </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" required>
                        </div>
                        <label>Bagian </label>
                        <div class="form-group">
                            <select name="bagian[<?=$data['pn']?>]" class="form-control" required>
                                <?php 
                                    foreach($getBagian as $row){ 
                                        $id_bagian = $row['id_bagian'];
                                        if($data['id_bagian'] == $id_bagian){
                                            echo "<option selected ='selected' value=".$row['id_bagian'].">".$row['nama_bagian']."</option>";
                                        }else{
                                            echo "<option value=".$row['id_bagian'].">".$row['nama_bagian']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <label>Bidang </label>
                        <div class="form-group">
                            <select name="bidang[<?=$data['pn']?>]" class="form-control" required>
                                <?php 
                                    foreach($getBidang as $row){ 
                                        $id_bidang = $row['id_bidang'];
                                        if($data['id_bidang'] == $id_bidang){
                                            echo "<option selected ='selected' value=".$row['id_bidang'].">".$row['nama_bidang']."</option>";
                                        }else{
                                            echo "<option value=".$row['id_bidang'].">".$row['nama_bidang']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="pn[]" value="<?php echo $data['pn'];?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning" name="updatestaff"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade text-left" id="hapus<?php echo $data['pn'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h5 class="modal-title" id="myModalLabel120">Hapus Staff App</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('staff_app'); ?>" method="post">
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                    </div>
                    <input type="hidden" name="pn" value="<?php echo $data['pn'];?>">
                    <div class="modal-footer">
                        <button type="submit" name="hapusstaff" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;Hapus</button>
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
                    <h5 class="modal-title" id="myModalLabel160">Input Staff App</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('staff_app'); ?>" method="post">
                    <div class="modal-body">
                        <label>PN </label>
                        <div class="form-group">
                            <input type="text" placeholder="PN" class="form-control" name="pn" required>
                        </div>
                        <label>Nama </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama" class="form-control" name="nama" required>
                        </div>
                        <label>Bagian </label>
                        <div class="form-group">
                            <select name="bagian" class="form-control" required>
                                <option class="option" value="">Pilih Bagian</option>
                                <?php foreach($getBagian as $row) { ?>
                                    <option value="<?php echo $row['id_bagian']; ?>">
                                        <?php echo $row['nama_bagian']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <label>Bidang </label>
                        <div class="form-group">
                            <select name="bidang" class="form-control" required>
                                <option class="option" value="">Pilih Bidang</option>
                                <?php foreach($getBidang as $row) { ?>
                                    <option value="<?php echo $row['id_bidang']; ?>">
                                        <?php echo $row['nama_bidang']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="tambahstaff"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                <form action="<?php echo base_url('staff_app'); ?>" method="post" enctype="multipart/form-data">
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
            $('#tb_staff').DataTable();
        });
    </script>

    <!-- Stop refresh -->
    <script>
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
    </script>