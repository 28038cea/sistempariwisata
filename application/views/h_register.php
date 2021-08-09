<?php $this->load->view('templates/a_head')?>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="<?= base_url('masuk/daftar'); ?>">
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password1" minlength="6" placeholder="Password" required>
                        </div>
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password2" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?= base_url('masuk') ?>">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
