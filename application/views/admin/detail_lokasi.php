<?php $this->load->view('admin/master-layout') ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>NORMAL TABLES</h2>
        </div>
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            Titik Peta
                            <small>Basic example without any additional modification classes</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">

                    </div>
                </div>
            </div>



            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            Lokasi
                        </h2>
                        <h4><?php echo $lokasi['title'] ?></h4>
                        <ul class=" header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <h3>
                            Deskripsi
                            <small><?php echo $lokasi['deskripsi'] ?></small>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Table -->
        <!-- #END# Striped Rows -->

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Galeri
                            <button type="button" class="btn btn-secondary mb-4" data-toggle="modal" data-target="#mediatambahModal">
                                Tambah Data
                            </button>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <div class="row">
                            <?php foreach ($gambar as $row) { ?>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <img class="img-thumbnail" src="<?= base_url('media/images/gambar_lokasi/' . $row['gambar'])  ?>" alt="">
                                        </div>
                                        <div class="col-12">
                                            <a class="btn btn-danger" href="<?= site_url('admin/delete_gambar/' . md5($row['id_gambar'])) ?>">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Table -->

    </div>




    <!-- Modal Tambah-->
    <div class="modal fade" id="mediatambahModal" tabindex="-1" aria-labelledby="mediatambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Admin/tambah_gambar_lokasi') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input name="id_lokasi" type="hidden" value="<?php echo $lokasi['id_lokasi'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="filemedia" class="control-label mb-1">Gambar</label>
                            <input type="file" multiple id="filemedia" name="filemedia[]" class="form-control-file">
                            <small class="form-text text-muted">Format : png, jpg, jpeg</small>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
</section> -->