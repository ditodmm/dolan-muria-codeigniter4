<?= $this->extend('template/template_admin') ?>
<?= $this->section('content') ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Tempat Wisata</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Tempat Wisata</li>
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
        <button type="button" class="btn btn-secondary mb-2 icon-left" data-bs-toggle="modal" data-bs-target="#addModal"><i data-feather="plus-circle"></i> Tambah Data</button>
    </div>
    <div class="card-body">
        <table class='table table-striped' id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Alamat</th>
                    <th>Harga Tiket</th>
                    <th>Gambar Sampul</th>
                    <th>Maps</th>
                    <th>Hari Buka</th>
                    <th>Jam Buka</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($tb_wisata as $row):?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_wisata;?></td>
                    <td><?= substr($row->deskripsi_wisata,0,50).'...';?></td>
                    <td><?= $row->nama_kategori;?></td>
                    <td><?= substr($row->alamat_wisata,0,50).'...';?></td>
                    <td><?= number_format($row->tiket_wisata,0,",","."); ?></td>
                    <td><img width="250px" class="rounded" src="<?= base_url() . "/uploads/gambarwisata/" . $row->gambar_wisata; ?>">
                    </td>
                    <td><?= substr(htmlspecialchars_decode($row->gmaps_wisata),5,15).'...';?></td>
                    <td><?= $row->hari_buka_dari." - ".$row->hari_buka_sampai ?></td>
                    <td><?= substr($row->jam_buka_dari,0,5)." - ".substr($row->jam_buka_sampai,0,5) ?></td>
                    <td>
                        <a style="width:100%;" class="btn btn-primary btn-sm btn-edit icon" data-id="<?= $row->id_wisata;?>" data-nama="<?= $row->nama_wisata;?>" data-deskripsi="<?= $row->deskripsi_wisata;?>" data-kategori="<?= $row->kategori_wisata;?>" data-alamat="<?= $row->alamat_wisata;?>" data-gambar="<?= $row->gambar_wisata;?>" data-gmaps="<?= $row->gmaps_wisata;?>" data-hari_buka_dari="<?= $row->hari_buka_dari;?>" data-hari_buka_sampai="<?= $row->hari_buka_sampai;?>" data-jam_buka_dari="<?= $row->jam_buka_dari;?>" data-jam_buka_sampai="<?= $row->jam_buka_sampai;?>" data-tiket="<?= $row->tiket_wisata;?>">Edit</a>

                        <a style="width:100%; margin-top:10%;" class="btn btn-danger btn-sm btn-delete icon" data-id="<?= $row->id_wisata;?>" data-gambar="<?= $row->gambar_wisata;?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
</div>
</section>
</div>

<!-- Modal Add Product-->
<form action="<?= base_url(); ?>/adminwisata/save" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Tempat Wisata</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Wisata</label>
                        <input type="text" class="form-control" name="nama_wisata" placeholder="Nama Wisata" required  oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" maxlength="100">
                    </div>
                    
                    <div class="form-group">
                        <label>Deskripsi Wisata</label>
                        <textarea class="form-control" name="deskripsi_wisata" placeholder="Deskripsi Wisata" required  oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Kategori Wisata</label>
                        <select name="kategori_wisata" class="form-control">
                            <option value="">-Pilih-</option>
                            <?php foreach($tb_kategori as $row):?>
                                <option value="<?= $row->id_kategori;?>"><?= $row->nama_kategori;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Alamat Wisata</label>
                        <input type="text" class="form-control" name="alamat_wisata" placeholder="Alamat Wisata" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label>Harga Tiket Wisata</label>
                        <input type="text" class="form-control" name="tiket_wisata" placeholder="Harga Tiket Wisata" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" onkeypress="return hanyaAngka(event)" maxlength="10">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Hari Buka Dari</label>
                                <select name="hari_buka_dari" class="form-control">
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
                                <select name="hari_buka_sampai" class="form-control">
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
                                <input type="time" class="form-control" name="jam_buka_dari">
                            </div>
                            <div class="col-6">
                                <label>Jam Tutup</label>
                                <input type="time" class="form-control" name="jam_buka_sampai">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Google Maps Wisata</label>
                        <input type="text" class="form-control" name="gmaps_wisata" placeholder="Google Maps Wisata" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label>Gambar Sampul Wisata</label>
                        <input type="file" class="form-control" name="gambar_wisata">
                        Format file: .jpg, .jpeg, .png<br>
                        Ukuran maksimal: 2 MB
                    </div>                
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Product-->

<!-- Modal Edit Product-->
<form action="<?= base_url(); ?>/adminwisata/update" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tempat Wisata</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Wisata</label>
                        <input type="text" class="form-control" name="nama_wisata" id="nama_wisata" placeholder="Nama Wisata"  oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>
                    
                    <div class="form-group">
                        <label>Deskripsi Wisata</label>
                        <textarea class="form-control" name="deskripsi_wisata" id="deskripsi_wisata" placeholder="Deskripsi Wsiata" oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Kategori Wisata</label>
                        <select name="kategori_wisata" id="kategori_wisata" class="form-control product_category">
                            <option value="">-Pilih-</option>
                            <?php foreach($tb_kategori as $row):?>
                                <option value="<?= $row->id_kategori;?>"><?= $row->nama_kategori;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Alamat Wisata</label>
                        <input type="text" class="form-control" name="alamat_wisata" id="alamat_wisata" placeholder="Alamat Wisata"  oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label>Harga Tiket Wisata</label>
                        <input type="text" class="form-control" name="tiket_wisata" id="tiket_wisata" placeholder="Harga Tiket Wisata" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" onkeypress="return hanyaAngka(event)">
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
                        <label>Google Maps Wisata</label>
                        <input type="text" class="form-control" name="gmaps_wisata" id="gmaps_wisata" placeholder="Google Maps Wisata" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>                        

                    <div class="form-group">
                        <div class="row">
                            <div class="col-9">
                                <label>Gambar Sampul Wisata</label>
                                <input type="file" class="form-control" name="gambar_wisata" id="gambar_wisata">
                                Format file: .jpg, .jpeg, .png<br>
                                Ukuran maksimal: 2 MB
                                <input type="hidden" name="nama_gambar_lama" id="nama_gambar_lama">
                            </div>
                            <div class="col-3">
                                <img width="100%" class="img-thumbnail" id="tampil_gambar_wisata">
                            </div>
                        </div>                            
                    </div>  
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_wisata" class="id_wisata">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Product-->
<form action="<?= base_url(); ?>/adminwisata/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Tempat Wisata</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                   <h4>Apakah Anda yakin akan menghapus data ini?</h4>

               </div>
               <div class="modal-footer">
                <input type="hidden" name="id_wisata" class="id_wisata">
                <input type="hidden" name="gambar_wisata" id="gambar_wisata">
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
                    const deskripsi = $(this).data('deskripsi');
                    const kategori = $(this).data('kategori');
                    const alamat = $(this).data('alamat');
                    const tiket = $(this).data('tiket');
                    const gmaps = $(this).data('gmaps');
                    const gambar = $(this).data('gambar');
                    const hari_buka_dari = $(this).data('hari_buka_dari');
                    const hari_buka_sampai = $(this).data('hari_buka_sampai');
                    const jam_buka_dari = $(this).data('jam_buka_dari');
                    const jam_buka_sampai = $(this).data('jam_buka_sampai');
                    // Set data to Form Edit
                    $('.id_wisata').val(id);
                    $('.modal-body #nama_wisata').val(nama);
                    $('.modal-body #deskripsi_wisata').val(deskripsi);
                    $('.modal-body #kategori_wisata').val(kategori).trigger('change');
                    $('.modal-body #alamat_wisata').val(alamat);
                    $('.modal-body #tiket_wisata').val(tiket);
                    $('.modal-body #hari_buka_dari').val(hari_buka_dari).trigger('change');
                    $('.modal-body #hari_buka_sampai').val(hari_buka_sampai).trigger('change');
                    $('.modal-body #jam_buka_dari').val(jam_buka_dari);
                    $('.modal-body #jam_buka_sampai').val(jam_buka_sampai);
                    $('.modal-body #gmaps_wisata').val('google ' + gmaps);
                    $('.modal-body #nama_gambar_lama').val(gambar);
                    $('#tampil_gambar_wisata').attr('src','<?= base_url(); ?>/uploads/gambarwisata/'+gambar);
                    // Call Modal Edit
                    $('#editModal').modal('show');
                });
                
                // get Delete Product
                $('body').on('click','.btn-delete',function(){
                    // get data from button delete
                    const id = $(this).data('id');
                    const gambar = $(this).data('gambar');
                    // Set data to Form delete
                    $('.id_wisata').val(id);
                    $('.modal-footer #gambar_wisata').val(gambar);
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