<section class="content">
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
                        <li><a href="<?= site_url('admin/role'); ?>"><?= $bab; ?></a></li>
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
                            <button type="button" class="btn btn-secondary mb-1 float-right" data-toggle="modal" data-target="#roletambahModal">
                                Tambah Data
                            </button>
                        </div>
                        <div class="card-body">
                            <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                            <?php if ($this->session->flashdata('message')) { ?>
                                <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('message'); ?></div>
                                <?= $this->session->unset_userdata('message'); ?>
                            <?php } ?>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($role as $r) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?= $r['role']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#roleeditModal<?php echo $r['id_role']; ?>">Ubah</button>
                                                <a type="button" class="btn btn-danger mb-1" href="<?= site_url('admin/delete_role/' . md5($r['id_role'])) ?>">Hapus</a>

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
    <div class="modal fade" id="roletambahModal" tabindex="-1" aria-labelledby="roletambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('admin/role'); ?>
                    <div class="form-group">
                        <label for="role" class="control-label mb-1">Role</label>
                        <input id="role" name="role" type="text" class="form-control" aria-required="true" aria-invalid="false">
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
    foreach ($role as $r) : $no++; ?>
        <div class="modal fade" id="roleeditModal<?php echo $r['id_role']; ?>" tabindex="-1" aria-labelledby="roleeditModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('admin/role'); ?>
                        <input type="hidden" name="id_role" value="<?= md5($r['id_role']); ?>">
                        <div class="form-group">
                            <label for="role" class="control-label mb-1">Role</label>
                            <input id="role" name="role" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?= $r['role']; ?>">
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

    </div><!-- /#right-panel -->
</section>