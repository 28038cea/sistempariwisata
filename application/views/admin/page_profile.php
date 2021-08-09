<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><?= $title; ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?= site_url('masuk/profile'); ?>"><?= $title; ?></a></li>

                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"><?= $title; ?></strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center"><?= $title; ?></h3>
                                    <img class="rounded-circle mx-auto d-block" height=250 src="<?= base_url('media/images/profile/' . $akun['profile']); ?>" alt="<?= $akun['profile']; ?>">
                                </div>
                                <hr>
                                <form action="#" method="post" novalidate="novalidate">
                                    <input type="hidden" name="id_akun" value="<?php echo $this->session->userdata('id_akun'); ?>"></input>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="email" class="control-label mb-1">Email</label>
                                                <input id="email" name="email" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?= $akun['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="password" class="control-label mb-1">Password</label>
                                                <input id="password" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" value="<?= $akun['password']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Simpan</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->

            </div>
            <!--/.col-->
        </div>