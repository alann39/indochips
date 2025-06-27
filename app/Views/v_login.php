<?= $this->extend('clear_layout') ?>
<?= $this->section('content') ?>
<?php
$username = [
    'name' => 'username',
    'id' => 'username',
    'class' => 'form-control',
    'placeholder' => 'Enter your username',
    'autocomplete' => 'username',
];

$password = [
    'name' => 'password',
    'id' => 'password',
    'class' => 'form-control',
    'placeholder' => 'Enter your password',
    'autocomplete' => 'current-password',
];
?>

<div class="container">
    <section class="section register d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 d-flex flex-column align-items-center justify-content-center">
                    <div class="login-card">
                        <div class="login-logo">
                            <img src="<?php echo base_url() ?>NiceAdmin/assets/img/logo.png" alt="Logo">
                            <span class="fs-3 fw-bold">SCND</span>
                        </div>
                        <div class="login-title">Login to Your Account</div>
                        <div class="login-subtitle">Enter your username & password to login</div>
                        <?php if (session()->getFlashData('failed')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashData('failed') ?>
                            </div>
                        <?php endif; ?>
                        <?= form_open('login', 'class = "row g-3 needs-validation"') ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <?= form_input($username) ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <?= form_password($password) ?>
                            </div>
                            <div class="d-grid mb-2">
                                <?= form_submit('submit', 'Login', ['class' => 'btn btn-primary btn-lg']) ?>
                            </div>
                        <?= form_close() ?>
                        <div class="login-footer">
                            Belum punya akun? <a href="<?= base_url('register') ?>">Register di sini</a>
                        </div>
                    </div>
                    <div class="credits mt-3">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                        Designed by <a href="https://alann39.github.io/portfolio/">Alann</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>