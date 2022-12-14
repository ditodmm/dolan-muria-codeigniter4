<?= $this->extend('template/template_admin') ?>
<?= $this->section('content') ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Toko</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Toko</li>
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
                <   /div>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Nama Pemilik</th>
                        <th>NIK Pemilik</th>
                        <th>Jenis Toko</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Hari Buka</th>
                        <th>Jam Buka</th>
                        <th>Gambar</th>
                        <th>Maps</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($tb_toko as $row):?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama_toko;?></td>
                        <td><?= $row->nama_pemilik_toko;?></td>
                        <td><?= $row->nik_pemilik_toko;?></td>
                        <?php if($row->role == 2): ?>
                            <td>Toko Oleh-Oleh</td>
                            <?php elseif($row->role == 3): ?>
                                <td>Warung Makan</td>
                            <?php endif; ?>
                            <td><?= $row->email_toko;?></td>
                            <td><?= $row->alamat_toko;?></td>
                            <td><?= $row->no_telepon;?></td>
                            <td><?= $row->hari_buka_dari." - ".$row->hari_buka_sampai; ?></td>
                            <td><?= substr($row->jam_buka_dari,0,5)." - ".substr($row->jam_buka_sampai,0,5); ?></td>
                            <td><img width="300px" class="img-thumbnail" src="<?= base_url() . "/uploads/gambartoko/" . $row->gambar_toko; ?>">
                            </td>
                            <td><?= substr(htmlspecialchars_decode($row->gmaps_toko),5,15).'...';?></td>
                            <td>
                                <a style="width:100%;" class="btn btn-primary btn-sm btn-edit icon" data-id="<?= $row->id_toko;?>" data-nama="<?= $row->nama_toko;?>" data-pemilik="<?= $row->nama_pemilik_toko; ?>" data-nik="<?= $row->nik_pemilik_toko; ?>" data-email="<?= $row->email_toko; ?>" data-alamat="<?= $row->alamat_toko; ?>" data-no_telepon="<?= $row->no_telepon; ?>" data-gambar="<?= $row->gambar_toko; ?>" data-gmaps="<?= $row->gmaps_toko; ?>" data-hari_buka_dari="<?= $row->hari_buka_dari;?>" data-hari_buka_sampai="<?= $row->hari_buka_sampai;?>" data-jam_buka_dari="<?= $row->jam_buka_dari;?>" data-jam_buka_sampai="<?= $row->jam_buka_sampai;?>">Edit</a>

                                <a style="width:100%; margin-top:10%;" class="btn btn-danger btn-sm btn-delete sicon" data-id_toko="<?= $row->id_toko;?>" data-gambar="<?= $row->gambar_toko;?>" data-id_user="<?= $row->id_user_pemilik_toko;?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>

<!-- Modal Edit Product-->
<form action="<?= base_url(); ?>/admintoko/update" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Toko</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>NIK Pemilik</label>
                        <input type="text" class="form-control" name="nik_pemilik_toko" placeholder="NIK Pemilik Toko" id="nik_pemilik_toko" required  oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Toko</label>
                        <input type="text" class="form-control" name="nama_toko" placeholder="Nama Toko" id="nama_toko" required  oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label>Nama Pemilik</label>
                        <input type="text" class="form-control" name="nama_pemilik_toko" placeholder="Nama Pemilik Toko" id="nama_pemilik_toko" required  oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label>Email Toko</label>
                        <input type="email" class="form-control" name="email_toko" placeholder="Email Toko" id="email_toko" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label>Alamat Toko</label>
                        <input type="text" class="form-control" name="alamat_toko" placeholder="Alamat Toko" id="alamat_toko" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="No Telepon" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" maxlength="13" onkeypress="return hanyaAngka(event)">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Hari Buka Dari</label>
                                <select name="hari_buka_dari" id="hari_buka_dari" class="form-control">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>Sampai</label>
                                <select name="hari_buka_sampai" id="hari_buka_sampai" class="form-control">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Jam Buka</label>
                                <input type="time" class="form-control" id="jam_buka_dari" name="jam_buka_dari">
                            </div>
                            <div class="col-6">
                                <label>Jam Tutup</label>
                                <input type="time" class="form-control" id="jam_buka_sampai" name="jam_buka_sampai">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Google Maps Toko</label>
                        <input type="text" class="form-control" name="gmaps_toko" placeholder="Google Maps toko" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>                                                

                    <div class="form-group">
                        <div class="row">
                            <div class="col-9">
                                <label>Gambar Sampul Toko</label>
                                <input type="file" class="form-control" name="gambar_toko" id="gambar_toko">
                                Format file: .jpg, .jpeg, .png<br>
                                Ukuran maksimal: 2 MB
                                <input type="hidden" name="nama_gambar_lama" id="nama_gambar_lama">
                            </div>
                            <div class="col-3">
                                <img width="100%" class="img-thumbnail" id="tampil_gambar_toko">
                            </div>
                        </div>                            
                    </div>  

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_toko" class="id_toko">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Product-->
<form action="<?= base_url(); ?>/admintoko/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Tempat toko</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                 <h4>Apakah Anda yakin akan menghapus data ini?</h4>

             </div>
             <div class="modal-footer">
                <input type="hidden" name="id_toko" class="id_toko">
                <input type="hidden" name="gambar_toko" id="gambar_toko">
                <input type="hidden" name="id_user" id="id_user">
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

                // get Edit Product
                $('body').on('click','.btn-edit',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    const nama = $(this).data('nama');
                    const pemilik = $(this).data('pemilik');
                    const nik = $(this).data('nik');
                    const email = $(this).data('email');
                    const alamat = $(this).data('alamat');
                    const no_telepon = $(this).data('no_telepon');
                    const gambar = $(this).data('gambar');
                    const gmaps = $(this).data('gmaps');
                    const hari_buka_dari = $(this).data('hari_buka_dari');
                    const hari_buka_sampai = $(this).data('hari_buka_sampai');
                    const jam_buka_dari = $(this).data('jam_buka_dari');
                    const jam_buka_sampai = $(this).data('jam_buka_sampai');
                    // Set data to Form Edit
                    $('.id_toko').val(id);
                    $('.modal-body #nama_toko').val(nama);
                    $('.modal-body #nama_pemilik_toko').val(pemilik);
                    $('.modal-body #nik_pemilik_toko').val(nik);
                    $('.modal-body #email_toko').val(email);
                    $('.modal-body #alamat_toko').val(alamat);
                    $('.modal-body #no_telepon').val(no_telepon);
                    $('.modal-body #gmaps').val('google ' + gmaps);
                    $('.modal-body #nama_gambar_lama').val(gambar);
                    $('.modal-body #hari_buka_dari').val(hari_buka_dari).trigger('change');
                    $('.modal-body #hari_buka_sampai').val(hari_buka_sampai).trigger('change');
                    $('.modal-body #jam_buka_dari').val(jam_buka_dari);
                    $('.modal-body #jam_buka_sampai').val(jam_buka_sampai);
                    $('#tampil_gambar_toko').attr('src','<?= base_url(); ?>/uploads/gambartoko/'+gambar);
                    // Call Modal Edit
                    $('#editModal').modal('show');
                });
                
                // get Delete Product
                $('body').on('click','.btn-delete',function(){
                    // get data from button delete
                    const id_toko = $(this).data('id_toko');
                    const id_user = $(this).data('id_user');
                    const gambar = $(this).data('gambar');
                    // Set data to Form delete
                    $('.id_toko').val(id_toko);
                    $('.modal-footer #id_user').val(id_user);
                    $('.modal-footer #gambar_toko').val(gambar);
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