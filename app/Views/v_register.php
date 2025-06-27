<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        <section class="section register d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-11 d-flex flex-column align-items-center justify-content-center">
                        <div class="login-card w-100" style="max-width: 700px;">
                            <div class="login-logo">
                                <img src="<?= base_url()?>/assets/images/logo-indochips.png" alt="Logo">
                                <span class="fs-3 fw-bold">by IndoChips</span>
                            </div>
                            <div class="login-title">Create Your Account</div>
                            <div class="login-subtitle">Isi data di bawah untuk membuat akun baru</div>
                            <?php if(session()->getFlashdata('failed')): ?>
                                <div class="alert alert-danger"><?php echo session()->getFlashdata('failed'); ?></div>
                            <?php endif; ?>
                            <?php if(session()->getFlashdata('success')): ?>
                                <div class="alert alert-success"><?php echo session()->getFlashdata('success'); ?></div>
                            <?php endif; ?>
                            <form action="<?= base_url('register') ?>" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" required minlength="6" placeholder="Enter your username">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required placeholder="Enter your email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required minlength="7" placeholder="Enter your password">
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirm" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" required minlength="7" placeholder="Confirm your password">
                                </div>
                                <div class="d-grid mb-2">
                                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                </div>
                            </form>
                            <div class="login-footer">
                                Sudah punya akun? <a href="<?= base_url('login') ?>">Login di sini</a>
                            </div>
                        </div>
                        <div class="credits mt-3">
                            Designed by <a href="https://alann39.github.io/portfolio/">Alann</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html> 