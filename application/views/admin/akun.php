<section class="content">
    <div class="container-fluid">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?= $sub; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?= site_url('admin'); ?>"><?= $title; ?></a></li>
                            <li><a href="<?= site_url('admin/akun'); ?>"><?= $bab; ?></a></li>
                            <li class="active"><?= $sub; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?= $sub; ?></strong>
                                <button type="button" class="btn btn-secondary mb-1 float-right" data-toggle="modal" data-target="#akuntambahModal">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('password', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('role_id', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('aktif', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('profile', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?php if ($this->session->flashdata('message')) { ?>
                    <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('message'); ?></div>
                    <?= $this->session->unset_userdata('message'); ?>
                <?php } ?>

                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Aktif</th>
                            <th>Profile</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($akun as $a) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?= $a['email']; ?></td>
                                <td><?= $a['password']; ?></td>
                                <td><?= $a['role_id']; ?></td>
                                <td><?= $a['aktif']; ?></td>
                                <td><img width='100' src="<?= base_url('media/images/profile/' . $a['profile']); ?>"></td>
                                <td>
                                    <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#akuneditModal<?php echo $a['id_akun']; ?>">Ubah</button>
                                    <a type="button" class="btn btn-danger mb-1" href="<?= site_url('admin/delete_akun/' . md5($a['id_akun'])) ?>">Hapus</a>

                                </td>
                            </tr> <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div> <!-- .animated -->
    </div><!-- .content -->

    <!-- Button trigger modal -->

    <!-- Modal Tambah-->
    <div class="modal fade" id="akuntambahModal" tabindex="-1" aria-labelledby="akuntambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('admin/akun'); ?>
                    <input type="hidden" name="id_akun">
                    <div class="form-group">
                        <label for="email" class="control-label mb-1">Email</label>
                        <input id="email" name="email" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label mb-1">Password</label>
                        <input id="password" name="password" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                    <div class="form-group">
                        <label for="role_id" class="control-label mb-1">Role</label>
                        <input id="role_id" name="role_id" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                    <div class="form-group">
                        <label for="aktif" class="control-label mb-1">Aktif</label>
                        <input id="aktif" name="aktif" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                    <div class="form-group">
                        <label for="profile" class="control-label mb-1">Profile</label>
                        <input type="file" id="fileprofile" name="fileprofile" class="form-control-file">
                        <small class="form-text text-muted">Format : gif, png, jpg, jpeg, bpm.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php $no = 0;
    foreach ($akun as $a) : $no++; ?>
        <div class="modal fade" id="akuneditModal<?php echo $a['id_akun']; ?>" tabindex="-1" aria-labelledby="akuneditModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('admin/akun'); ?>
                        <input type="hidden" name="id_akun" value="<?= md5($a['id_akun']); ?>">

                        <div class="form-group">
                            <label for="email" class="control-label mb-1">Email</label>
                            <input id="email" name="email" type="text" class="form-control" readonly="readonly" aria-required="true" aria-invalid="false" value="<?= $a['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label mb-1">Password</label>
                            <input id="password" name="password" type="text" class="form-control" readonly="readonly" aria-required="true" aria-invalid="false">
                        </div>
                        <div class="form-group">
                            <label for="role_id" class="control-label mb-1">Role</label>
                            <input id="role_id" name="role_id" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?= $a['role_id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="aktif" class="control-label mb-1">Aktif</label>
                            <input id="aktif" name="aktif" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?= $a['aktif']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="profile" class="control-label mb-1">Profile</label>
                            <input type="file" id="fileprofile" name="fileprofile" class="form-control-file" value="<?= $a['profile']; ?>"><?= $a['profile']; ?>
                            <small class="form-text text-muted">Format : gif, png, jpg, jpeg, bpm.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <?php echo form_close() ?>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>

    </div>
</section>