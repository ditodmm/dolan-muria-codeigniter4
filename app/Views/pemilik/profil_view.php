<?= $this->extend('template/template_pemilik') ?>
<?= $this->section('content') ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pengaturan Akun</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengaturan Akun</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
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
        <h4 class="card-title">Edit Password</h4>
    </div>
    <div class="card-body">
        <form action="<?= base_url(); ?>/pemilikuser/updatepassword" method="post">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" value="<?= $tb_user->username; ?>" readonly>
                        <input type="hidden" name="konfpasswordlama" value="<?= $tb_user->password; ?>">
                        <input type="hidden" name="id_user" value="<?= $tb_user->id_user; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password" name="password_lama" id="password" class="form-control"  placeholder="Password Lama" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password_baru" id="password" class="form-control"  placeholder="Password Baru" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmasi_password" id="password" class="form-control"  placeholder="Konfirmasi Password Baru" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <button class="btn btn-primary float-end">Edit Password</button>
            </div>
        </form>
        <!-- end form edit username password -->
        <form style="margin-top: 5%;" action="<?= base_url(); ?>/pemilikuser/updatetoko" method="post" enctype="multipart/form-data">
            <h4 style="margin-bottom: 30px;" class="card-title">Edit Data Toko dan Pemilik Toko</h4>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>NIK Pemilik Toko</label>
                        <input type="text" name="nik_pemilik_toko" id="nik_pemilik_toko" class="form-control" placeholder="NIK Pemilik Toko" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" readonly value="<?= $tb_user->nik_pemilik_toko; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>Nama Pemilik Toko</label>
                        <input type="text" name="nama_pemilik_toko" id="nama_pemilik_toko" class="form-control"  placeholder="Nama Pemilik" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" value="<?= $tb_user->nama_pemilik_toko; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>Nama Toko</label>
                        <input type="text" name="nama_toko" id="nama_toko" class="form-control"  placeholder="Nama Toko" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" value="<?= $tb_user->nama_toko; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>Email Toko</label>
                        <input type="email" name="email_toko" id="email_toko" class="form-control" placeholder="Email Toko" required oninvalid="this.setCustomValidity('email@email.com')" oninput="this.setCustomValidity('')" value="<?= $tb_user->email_toko; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>Alamat Toko</label>
                        <input type="text" name="alamat_toko" id="alamat_toko" class="form-control" placeholder="Alamat Toko" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" value="<?= $tb_user->alamat_toko; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" name="no_telepon" id="no_telepon" class="form-control" placeholder="Nomor Telepon" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" maxlength="13" value="<?= $tb_user->no_telepon; ?>" onkeypress="return hanyaAngka(event)">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Hari Buka Dari</label>
                                <select name="hari_buka_dari" id="hari_buka_dari" class="form-control">
                                    <option value="Senin" <?php if($tb_user->hari_buka_dari == 'Senin'){echo 'selected';} ?>>Senin</option>
                                    <option value="Selasa" <?php if($tb_user->hari_buka_dari == 'Selasa'){echo 'selected';} ?>>Selasa</option>
                                    <option value="Rabu" <?php if($tb_user->hari_buka_dari == 'Rabu'){echo 'selected';} ?>>Rabu</option>
                                    <option value="Kamis" <?php if($tb_user->hari_buka_dari == 'Kamis'){echo 'selected';} ?>>Kamis</option>
                                    <option value="Jumat" <?php if($tb_user->hari_buka_dari == 'Jumat'){echo 'selected';} ?>>Jumat</option>
                                    <option value="Sabtu" <?php if($tb_user->hari_buka_dari == 'Sabtu'){echo 'selected';} ?>>Sabtu</option>
                                    <option value="Minggu" <?php if($tb_user->hari_buka_dari == 'Minggu'){echo 'selected';} ?>>Minggu</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>Sampai</label>
                                <select name="hari_buka_sampai" id="hari_buka_sampai" class="form-control" >
                                    <option value="Senin" <?php if($tb_user->hari_buka_sampai == 'Senin'){echo 'selected';} ?>>Senin</option>
                                    <option value="Selasa" <?php if($tb_user->hari_buka_sampai == 'Selasa'){echo 'selected';} ?>>Selasa</option>
                                    <option value="Rabu" <?php if($tb_user->hari_buka_sampai == 'Rabu'){echo 'selected';} ?>>Rabu</option>
                                    <option value="Kamis" <?php if($tb_user->hari_buka_sampai == 'Kamis'){echo 'selected';} ?>>Kamis</option>
                                    <option value="Jumat" <?php if($tb_user->hari_buka_sampai == 'Jumat'){echo 'selected';} ?>>Jumat</option>
                                    <option value="Sabtu" <?php if($tb_user->hari_buka_sampai == 'Sabtu'){echo 'selected';} ?>>Sabtu</option>
                                    <option value="Minggu" <?php if($tb_user->hari_buka_sampai == 'Minggu'){echo 'selected';} ?>>Minggu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Jam Buka</label>
                                <input type="time" class="form-control" id="jam_buka_dari" name="jam_buka_dari" value="<?= $tb_user->jam_buka_dari; ?>">
                            </div>
                            <div class="col-6">
                                <label>Jam Tutup</label>
                                <input type="time" class="form-control" id="jam_buka_sampai" name="jam_buka_sampai" value="<?= $tb_user->jam_buka_sampai; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>Google Maps Toko</label>
                        <input type="text" name="gmaps_toko" id="gmaps_toko" class="form-control" placeholder="Google Maps Toko" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" value="google <?= $tb_user->gmaps_toko; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label>Gambar Sampul Toko</label>
                                <input type="file" class="form-control" name="gambar_toko">
                                Format file: .jpg, .jpeg, .png<br>
                                Ukuran maksimal: 2 MB
                                <input type="hidden" name="nama_gambar_lama" id="nama_gambar_lama" value="<?= $tb_user->gambar_toko ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <img src="<?= base_url() . "/uploads/gambartoko/" . $tb_user->gambar_toko; ?>" width="100%" class="img-thumbnail" id="tampil_gambar_wisata">
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <button class="btn btn-primary float-end">Edit Data Toko</button>
            </div>
        </form>
    </div>
</div>
</div>
</section>
</div>

<!-- Modal Delete Product-->
<form action="<?= base_url(); ?>/pemilikproduk/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Tempat produk</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                 <h4>Apakah Anda yakin akan menghapus data ini?</h4>

             </div>
             <div class="modal-footer">
                <input type="hidden" name="id_produk" class="id_produk">
                <input type="hidden" name="gambar_sampul_produk" id="gambar_sampul_produk">
                <input type="hidden" name="gambar_produk_1" id="gambar_produk_1">
                <input type="hidden" name="gambar_produk_2" id="gambar_produk_2">
                <input type="hidden" name="gambar_produk_3" id="gambar_produk_3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Ya</button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- End Modal Delete Product-->
<script src="<?= base_url(); ?>/assets/js/feather-icons/feather.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/app.js"></script>

<script src="<?= base_url(); ?>/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="<?= base_url(); ?>/assets/js/vendors.js"></script>

<script src="<?= base_url(); ?>/assets/js/main.js"></script>
<script src="<?= base_url(); ?>/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>/js/bootstrap.bundle.min.js"></script>
<!--             <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> -->

<script>
    $(document).ready(function(){

                // get Delete Product
                $('body').on('click','.btn-delete',function(){
                    // get data from button delete
                    const id = $(this).data('id');
                    const gambar_sampul = $(this).data('gambar_sampul');
                    const gambar_1      = $(this).data('gambar_1');
                    const gambar_2      = $(this).data('gambar_2');
                    const gambar_3      = $(this).data('gambar_3');
                    // Set data to Form delete
                    $('.id_produk').val(id);
                    $('.modal-footer #gambar_sampul_produk').val(gambar_sampul);
                    $('.modal-footer #gambar_produk_1').val(gambar_1);
                    $('.modal-footer #gambar_produk_2').val(gambar_2);
                    $('.modal-footer #gambar_produk_3').val(gambar_3);
                    // Call Modal delete
                    $('#deleteModal').modal('show');
                });
                
            });

    $("#alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert").slideUp(500);
    });

    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

</script>
</body>

</html>

<?= $this->endSection() ?>