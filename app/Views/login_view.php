<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">

    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.css">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="<?= base_url(); ?>/assets/images/favicon.png" height="48" class='mb-4'>
                                <h3>Login</h3>
                                <p>Silakan masukkan username dan password yang sudah terdaftar.</p>
                                <?php if (!empty(session()->getFlashdata('message'))) : ?>
                                <div class="alert alert-light-success" id="alert" role="alert">
                                <?php echo session()->getFlashdata('message'); ?>
                                </div>
                                <?php endif; ?>
                                <?php if (!empty(session()->getFlashdata('errors'))) : ?>
                                <div class="alert alert-light-danger" id="alert" role="alert">
                                    <?php echo session()->getFlashdata('errors'); ?>
                                </div>
                                <?php endif; ?>                                
                            </div>
                            <form action="<?= base_url(); ?>/login/auth" method="post">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                    <div style="margin-top: 1%;" class="clearfix">
                                        <input type="checkbox" onclick="lihatPassword()"> Tampilkan Password
                                    </div>
                                </div>

                                <div class='form-check clearfix my-4'>
                                    <div class="float-end">
                                        <a href="register">Belum memiliki akun? Daftar di sini</a>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button class="btn btn-primary float-end">Login</button>
                                </div>
                            </form>
                            <div class="divider">
                                <div class="divider-text">ATAU</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?= base_url() ?>" class="btn btn-block mb-2 btn-secondary">Beranda</a>
                                </div>
                                <div class="col-sm-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="<?= base_url(); ?>/assets/js/feather-icons/feather.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/app.js"></script>

    <script src="<?= base_url(); ?>/assets/js/main.js"></script>
    <script type="text/javascript">
        function lihatPassword() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
    </script>
</body>

</html>