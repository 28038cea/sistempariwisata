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
                    </div>
                    <div class="body">
                        <div id="mapid" style="height: 600px;">
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            Lokasi
                        </h2>
                    </div>
                    <div class="body">
                        <b><?php echo $lokasi['title'] ?></b>
                        <small><?php echo $lokasi['deskripsi'] ?></small>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h2>
                            Galeri
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#mediatambahModal">Tambah Data</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="row">
                                    <?php foreach ($gambar as $row): ?>
                                        <div class="col-6">
                                            <img class="img-thumbnail" src="<?= base_url('media/images/gambar_lokasi/' . $row['gambar'])  ?>" alt="">
                                            <a class="btn btn-danger" href="<?= site_url('admin/delete_gambar/' . md5($row['id_gambar'])) ?>">Hapus</a>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Table -->
        <!-- #END# Striped Rows -->
    </div>

    <!-- Modal Tambah-->
    <div class="modal fade" id="mediatambahModal" tabindex="-1" aria-labelledby="mediatambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Galeri</h5>
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
</section>

<script>
     $('#detailModal').on('hidden.bs.modal', function () {
        location.reload();
    });

    var map = L.map('mapid').setView([-8.337392, 115.182068], 15);
    var base_url = '<?=base_url()?>';

    // create custom icon
    iconClicked = L.icon({
        iconUrl: base_url + 'assets/marker-icon-2x-custom.png'
    });

    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    }).addTo(map);

    console.log(<?=  json_encode($lokasi) ?>);
    latlng = [
        <?=  json_encode($lokasi['lat']) ?>,
        <?=  json_encode($lokasi['lng']) ?>
    ];
    options = {
        'title': <?=  json_encode($lokasi['title']) ?>
    };
    body = <?=  json_encode($lokasi['body']) ?>;
    var marker = L.marker(latlng, options).addTo(map)
    .bindPopup(body);
</script>