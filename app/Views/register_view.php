<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">

    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.css">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="<?= base_url(); ?>/assets/images/favicon.png" height="48" class='mb-4'>
                                <h3>Daftar</h3>
                                <p>Isi form pendaftaran dengan data yang sesuai.</p>
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-light-danger" id="alert" role="alert">
                                    <?php echo session()->getFlashdata('error'); ?>
                                </div>
                                <?php endif; ?>
                                <?php if (!empty(session()->getFlashdata('message'))) : ?>
                                <div class="alert alert-light-success" id="alert" role="alert">
                                    <?php echo session()->getFlashdata('message'); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <form action="<?= base_url(); ?>/register/save" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Toko</label>
                                            <input type="text" name="nama_toko" id="nama_toko" class="form-control" placeholder="Nama Toko" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Pemilik Toko</label>
                                            <input type="text" name="nama_pemilik_toko" id="nama_pemilik_toko" class="form-control"  placeholder="Nama Pemilik" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>NIK Pemilik Toko</label>
                                            <input type="text" name="nik_pemilik_toko" id="nik_pemilik_toko" class="form-control"  placeholder="NIK Pemilik Harus 16 Angka" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" minlength="16" maxlength="16" onkeypress="return hanyaAngka(event)">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email Toko</label>
                                            <input type="email" name="email_toko" id="email_toko" class="form-control" placeholder="Email Toko" required oninvalid="this.setCustomValidity('email@email.com')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Alamat Toko</label>
                                            <input type="text" name="alamat_toko" id="alamat_toko" class="form-control" placeholder="Alamat Toko" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nomor Telepon</label>
                                            <input type="text" name="no_telepon" id="no_telepon" class="form-control" placeholder="Nomor Telepon" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" maxlength="13" onkeypress="return hanyaAngka(event)">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Jenis Toko</label>
                                            <select name="role" id="role" class="form-control">
                                                <option value="" disabled>-Pilih-</option>
                                                <option value="2">Toko Oleh-Oleh</option>
                                                <option value="3">Warung Makan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Username Minimal 3 Karakter" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password Minimal 6 Karakter" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                                            <input type="checkbox" onclick="lihatPassword()"> Tampilkan Password
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                                            <input type="checkbox" onclick="lihatKonfirmasiPassword()"> Tampilkan Password
                                        </div>
                                    </div>                                  
                                </div>

                                <a href="<?= base_url();?>/login">Sudah memiliki akun? Login di sini</a>
                                <div class="clearfix">
                                    <button class="btn btn-primary float-end">Daftar</button>
                                </div>
                            </form>
                            <div class="divider">
                                <div class="divider-text">ATAU</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?= base_url();?>" class="btn btn-block mb-2 btn-secondary">Beranda</a>
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

            function lihatKonfirmasiPassword() {
                var x = document.getElementById("konfirmasi_password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            function hanyaAngka(evt) {
                var charCode = (evt.which) ? evt.which : evt.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }       
    </script>
</body>

</html>