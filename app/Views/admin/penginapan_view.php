<?= $this->extend('template/template_admin') ?>
<?= $this->section('content') ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Penginapan</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Penginapan</li>
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
        <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#addModal"><i data-feather="plus-circle"></i> Tambah Data</button>
    </div>
    <div class="card-body">
        <table class='table table-striped' id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Gambar Sampul</th>
                    <th>Gambar Detail 1</th>
                    <th>Gambar Detail 2</th>
                    <th>Google Maps</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($tb_penginapan as $row):?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_penginapan;?></td>
                    <td><?= $row->deskripsi_penginapan;?></td>
                    <td><?= $row->alamat_penginapan;?></td>
                    <td><?= $row->no_telepon;?></td>
                    <td>
                        <a class="btn-edit-gambar-sampul" data-id="<?= $row->id_penginapan;?>" data-gambar="<?= $row->gambar_sampul_penginapan;?>">
                            <img width="150px" class="img-thumbnail" src="<?= base_url() . "/uploads/gambarpenginapan/" . $row->gambar_sampul_penginapan; ?>">
                        </a>
                    </td>
                    <td>
                        <a class="btn-edit-gambar-1" data-id="<?= $row->id_penginapan;?>" data-gambar="<?= $row->gambar_penginapan_1;?>">
                            <img width="150px" class="img-thumbnail" src="<?= base_url() . "/uploads/gambarpenginapan/" . $row->gambar_penginapan_1; ?>">
                        </a>
                    </td>
                    <td>
                        <a class="btn-edit-gambar-2" data-id="<?= $row->id_penginapan;?>" data-gambar="<?= $row->gambar_penginapan_2;?>">
                            <img width="150px" class="img-thumbnail" src="<?= base_url() . "/uploads/gambarpenginapan/" . $row->gambar_penginapan_2; ?>">
                        </a>
                    </td>
                    <td><?= $row->gmaps_penginapan;?></td>
                    <td>            
                        <a style="width:100%;" class="btn btn-primary btn-sm btn-edit" data-id="<?= $row->id_penginapan;?>" data-nama="<?= $row->nama_penginapan;?>" data-deskripsi="<?= $row->deskripsi_penginapan;?>" data-alamat="<?= $row->alamat_penginapan;?>" data-no_telepon="<?= $row->no_telepon;?>" data-gmaps="<?= $row->gmaps_penginapan; ?>">Edit</a>

                        <a style="width:100%; margin-top: 10%" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->id_penginapan;?>" data-gambar_sampul="<?= $row->gambar_sampul_penginapan;?>" data-gambar_1="<?= $row->gambar_penginapan_1;?>" data-gambar_2="<?= $row->gambar_penginapan_2;?>">Hapus</a>
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
<form action="<?= base_url(); ?>/adminpenginapan/save" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Penginapan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama penginapan</label>
                        <input type="text" class="form-control" name="nama_penginapan" placeholder="Nama Penginapan" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>
                    
                    <div class="form-group">
                        <label>Deskripsi Penginapan</label>
                        <textarea class="form-control" name="deskripsi_penginapan" placeholder="Deskripsi" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat_penginapan" placeholder="Alamat" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telepon" placeholder="Nomor Telepon Maksimal 13 Angka" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" onkeypress="return hanyaAngka(event)">
                    </div>

                    <div class="form-group">
                        <label>Google Maps</label>
                        <input type="text" class="form-control" name="gmaps_penginapan" placeholder="Google Maps" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>                          

                    <div class="form-group">
                        <label>Gambar Sampul</label>
                        <input type="file" class="form-control" name="gambar_sampul_penginapan">
                        Format file: .jpg, .jpeg, .png<br>
                        Ukuran maksimal: 2 MB
                    </div>

                    <div class="form-group">
                        <label>Gambar Detail 1</label>
                        <input type="file" class="form-control" name="gambar_penginapan_1">
                        Format file: .jpg, .jpeg, .png<br>
                        Ukuran maksimal: 2 MB
                    </div> 

                    <div class="form-group">
                        <label>Gambar Detail 2</label>
                        <input type="file" class="form-control" name="gambar_penginapan_2">
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
<form action="<?= base_url(); ?>/adminpenginapan/update" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data penginapan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Penginapan</label>
                        <input type="text" class="form-control" name="nama_penginapan" id="nama_penginapan" placeholder="Nama penginapan" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>
                    
                    <div class="form-group">
                        <label>Deskripsi Penginapan</label>
                        <textarea class="form-control" name="deskripsi_penginapan" id="deskripsi_penginapan" placeholder="Deskripsi" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat_penginapan" id="alamat_penginapan" placeholder="Alamat" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="Nomor Telepon" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" onkeypress="return hanyaAngka(event)">
                    </div>

                    <div class="form-group">
                        <label>Google Maps</label>
                        <input type="text" class="form-control" name="gmaps_penginapan" id="gmaps_penginapan" placeholder="Google Maps" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>         
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_penginapan" class="id_penginapan">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Edit Gambar sampul-->
<form action="<?= base_url(); ?>/adminpenginapan/updategambarsampul" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editgambarsampulModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gambar Sampul Penginapan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <img width="100%" class="img-thumbnail" id="tampil_gambar_penginapan">
                    </div>                        

                    <div class="form-group">
                        <label>Gambar Sampul Penginapan</label>
                        <input type="file" class="form-control" name="gambar_sampul_penginapan" id="gambar_sampul_penginapan">
                        Format file: .jpg, .jpeg, .png<br>
                        Ukuran maksimal: 2 MB
                        <input type="hidden" name="nama_gambar_lama" id="nama_gambar_lama">                          
                    </div>  
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_penginapan" class="id_penginapan">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit gambar sampul-->

<!-- Modal Edit Gambar sampul-->
<form action="<?= base_url(); ?>/adminpenginapan/updategambar1" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editgambar1Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gambar Penginapan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <img width="100%" class="img-thumbnail" id="tampil_gambar_penginapan">
                    </div>                        

                    <div class="form-group">
                        <label>Gambar Penginapan</label>
                        <input type="file" class="form-control" name="gambar_penginapan_1" id="gambar_penginapan_1">
                        Format file: .jpg, .jpeg, .png<br>
                        Ukuran maksimal: 2 MB
                        <input type="hidden" name="nama_gambar_lama" id="nama_gambar_lama">                          
                    </div>  
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_penginapan" class="id_penginapan">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit gambar sampul-->

<!-- Modal Edit Gambar sampul-->
<form action="<?= base_url(); ?>/adminpenginapan/updategambar2" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editgambar2Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gambar Penginapan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <img width="100%" class="img-thumbnail" id="tampil_gambar_penginapan">
                    </div>                        

                    <div class="form-group">
                        <label>Gambar Penginapan</label>
                        <input type="file" class="form-control" name="gambar_penginapan_2" id="gambar_penginapan_2">
                        Format file: .jpg, .jpeg, .png<br>
                        Ukuran maksimal: 2 MB
                        <input type="hidden" name="nama_gambar_lama" id="nama_gambar_lama">                          
                    </div>  
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_penginapan" class="id_penginapan">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit gambar sampul-->

<!-- Modal Delete Product-->
<form action="<?= base_url(); ?>/adminpenginapan/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data penginapan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                   <h4>Apakah Anda yakin akan menghapus data ini?</h4>

               </div>
               <div class="modal-footer">
                <input type="hidden" name="id_penginapan" class="id_penginapan">
                <input type="hidden" name="gambar_sampul_penginapan" id="gambar_sampul_penginapan">
                <input type="hidden" name="gambar_penginapan_1" id="gambar_penginapan_1">
                <input type="hidden" name="gambar_penginapan_2" id="gambar_penginapan_2">
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

<script>
    $(document).ready(function(){

                // get Edit Product
                $('.btn-edit').on('click',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    const nama = $(this).data('nama');
                    const deskripsi = $(this).data('deskripsi');
                    const alamat = $(this).data('alamat');
                    const no_telepon = $(this).data('no_telepon');
                    const gmaps = $(this).data('gmaps');
                    // Set data to Form Edit
                    $('.id_penginapan').val(id);
                    $('.modal-body #nama_penginapan').val(nama);
                    $('.modal-body #deskripsi_penginapan').val(deskripsi);
                    $('.modal-body #alamat_penginapan').val(alamat);
                    $('.modal-body #no_telepon').val(no_telepon);
                    $('.modal-body #gmaps_penginapan').val('google ' + gmaps);
                    // Call Modal Edit
                    $('#editModal').modal('show');
                });

                // get Edit Product
                $('body').on('click','.btn-edit-gambar-sampul',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    const gambar = $(this).data('gambar');
                    // Set data to Form Edit
                    $('.id_penginapan').val(id);
                    $('.modal-body #nama_gambar_lama').val(gambar);
                    $('.modal-body #tampil_gambar_penginapan').attr('src','<?= base_url(); ?>/uploads/gambarpenginapan/'+gambar);
                    // Call Modal Edit
                    $('#editgambarsampulModal').modal('show');
                });

                // get Edit Product
                $('body').on('click','.btn-edit-gambar-1',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    const gambar = $(this).data('gambar');
                    // Set data to Form Edit
                    $('.id_penginapan').val(id);
                    $('.modal-body #nama_gambar_lama').val(gambar);
                    $('.modal-body #tampil_gambar_penginapan').attr('src','<?= base_url(); ?>/uploads/gambarpenginapan/'+gambar);
                    // Call Modal Edit
                    $('#editgambar1Modal').modal('show');
                });

                // get Edit Product
                $('body').on('click','.btn-edit-gambar-2',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    const gambar = $(this).data('gambar');
                    // Set data to Form Edit
                    $('.id_penginapan').val(id);
                    $('.modal-body #nama_gambar_lama').val(gambar);
                    $('.modal-body #tampil_gambar_penginapan').attr('src','<?= base_url(); ?>/uploads/gambarpenginapan/'+gambar);
                    // Call Modal Edit
                    $('#editgambar2Modal').modal('show');
                });
                
                // get Delete Product
                $('.btn-delete').on('click',function(){
                    // get data from button delete
                    const id = $(this).data('id');
                    const gambar_sampul = $(this).data('gambar_sampul');
                    const gambar_1 = $(this).data('gambar_1');
                    const gambar_2 = $(this).data('gambar_2');
                    // Set data to Form delete
                    $('.id_penginapan').val(id);
                    $('.modal-footer #gambar_sampul_penginapan').val(gambar_sampul);
                    $('.modal-footer #gambar_penginapan_1').val(gambar_1);
                    $('.modal-footer #gambar_penginapan_2').val(gambar_2);
                    // Call Modal delete
                    $('#deleteModal').modal('show');
                });
                
            });
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    } 
    $("#alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert").slideUp(500);
    });
</script>
</body>

</html>

<?= $this->endSection() ?>