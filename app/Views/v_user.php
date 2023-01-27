<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"></i>Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }

            ?>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Nama User</th>
                        <th>E-mail</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1;
                    foreach ($user as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value["nama_user"] ?></td>
                            <td><?= $value["email"] ?></td>
                            <td><?= $value["password"] ?></td>
                            <td class="text-center">
                                <?php if ($value["level"] == 1) { ?>
                                    <span class="badge badge-success">Admin</span>
                                <?php } else { ?>
                                    <span class="badge badge-warning">Kasir</span>
                                <?php } ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_user'] ?>"><i class="fa fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value['id_user'] ?>"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- add data -->
<div class="modal fade" id="add-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('user/insertdata') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama User</label>
                    <input name="nama_user" class="form-control" placeholder="Nama User" required>
                </div>
                <div class="form-group">
                    <label for="">E-Mail</label>
                    <input name="email" class="form-control" placeholder="E-Mail" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="">Level User</label>
                    <select name="level" id="level" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">Kasir</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- edit data -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit-data<?= $value['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('user/updatedata/' . $value['id_user']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input name="nama_user" value="<?= $value['nama_user'] ?>" class="form-control" placeholder="Nama User" required>
                    </div>
                    <div class="form-group">
                        <label for="">E-Mail</label>
                        <input name="email" value="<?= $value['email'] ?>" class="form-control" placeholder="E-Mail" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input name="password" value="<?= $value['password'] ?>" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Level User</label>
                        <select name="level" id="level" class="form-control">
                            <option value="1" <?= $value["level"] == 1 ? 'Selected' : '' ?>>Admin</option>
                            <option value="2" <?= $value["level"] == 2 ? 'Selected' : '' ?>>Kasir</option>

                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>

<!-- hapus data -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete-data<?= $value['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Akan Hapus User <?= $value['nama_user'] ?>???</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('user/deletedata/' . $value['id_user']) ?>" class="btn btn-danger btn-flat">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>