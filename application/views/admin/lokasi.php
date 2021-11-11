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
                        <li><a href="<?= site_url('admin'); ?>">Admin</a></li>
                        <li><a href="<?= site_url('admin/lokasi'); ?>"><?= $bab; ?></a></li>
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
                                        <th>Id</th>
                                        <th>Nama Lokasi</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($lokasi as $l) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?= $l['title']; ?></td>
                                            <td><?= $l['deskripsi']; ?></td>
                                            <td><a type="button" class="btn btn-danger mb-1" href="<?= base_url('admin/edit_lokasi/' . $l['id_lokasi']) ?>">edit</a>
                                                <a type="button" class="btn btn-danger mb-1" href="<?= base_url('admin/detail_lokasi/' . $l['id_lokasi']) ?>">detail</a>
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
</section>