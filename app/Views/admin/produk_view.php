<?= $this->extend('template/template_admin') ?>
<?= $this->section('content') ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Produk</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Produk</li>
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

    </div>
    <div class="card-body">
        <table class='table table-striped' id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Toko</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Gambar Sampul</th>
                    <th>Gambar Detail 1</th>
                    <th>Gambar Detail 2</th>
                    <th>Gambar Detail 3</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($tb_produk as $row):?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_produk;?></td>
                    <td><?= $row->nama_toko;?></td>
                    <td><?= $row->deskripsi_produk;?></td>
                    <td><?= number_format($row->harga_produk,0,",",".");?></td>
                    <td>
                        <a class="btn-edit-gambar-sampul" data-id="<?= $row->id_produk;?>" data-gambar="<?= $row->gambar_sampul_produk;?>">
                            <img style="cursor: pointer; transition: 0.3s;" width="150px" class="img-thumbnail" src="<?= base_url() . "/uploads/gambarproduk/" . $row->gambar_sampul_produk; ?>">
                        </a>
                    </td>
                    <td>
                        <a class="btn-edit-gambar-1" data-id="<?= $row->id_produk;?>" data-gambar="<?= $row->gambar_produk_1;?>">
                            <img style="cursor: pointer; transition: 0.3s;" width="150px" class="img-thumbnail" src="<?= base_url() . "/uploads/gambarproduk/" . $row->gambar_produk_1; ?>">
                        </a>
                    </td>
                    <td>
                        <a class="btn-edit-gambar-2" data-id="<?= $row->id_produk;?>" data-gambar="<?= $row->gambar_produk_2;?>">
                            <img style="cursor: pointer; transition: 0.3s;" width="150px" class="img-thumbnail" src="<?= base_url() . "/uploads/gambarproduk/" . $row->gambar_produk_2; ?>">
                        </a>
                    </td>
                    <td>
                        <a class="btn-edit-gambar-3" data-id="<?= $row->id_produk;?>" data-gambar="<?= $row->gambar_produk_3;?>">
                            <img style="cursor: pointer; transition: 0.3s;" width="150px" class="img-thumbnail" src="<?= base_url() . "/uploads/gambarproduk/" . $row->gambar_produk_3; ?>">
                        </a>
                    </td>
                    <td>
                        <a style="width:100%;" class="btn btn-primary btn-sm btn-edit icon" data-id="<?= $row->id_produk;?>" data-nama="<?= $row->nama_produk;?>" data-deskripsi="<?= $row->deskripsi_produk;?>" data-harga="<?= $row->harga_produk;?>">Edit</a>

                        <a style="width:100%; margin-top:10%;" class="btn btn-danger btn-sm btn-delete icon" data-id="<?= $row->id_produk;?>" data-gambar_sampul="<?= $row->gambar_sampul_produk;?>" data-gambar_1="<?= $row->gambar_produk_1;?>" data-gambar_2="<?= $row->gambar_produk_2;?>" data-gambar_3="<?= $row->gambar_produk_3;?>">Hapus</a>
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
<form action="<?= base_url(); ?>/adminproduk/update" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama produk</label>
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama produk"  oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>
                    
                    <div class="form-group">
                        <label>Deskripsi produk</label>
                        <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk" placeholder="Deskripsi Wsiata" oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Harga produk</label>
                        <input type="text" class="form-control" name="harga_produk" id="harga_produk" placeholder="Harga produk"  oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" onkeypress="return hanyaAngka(event)">
                    </div>  
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_produk" class="id_produk">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Edit Gambar sampul-->
<form action="<?= base_url(); ?>/adminproduk/updategambarsampul" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editgambarsampulModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gambar Sampul Produk</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <img width="100%" class="img-thumbnail" id="tampil_gambar_produk">
                    </div>                        

                    <div class="form-group">
                        <label>Gambar Sampul Produk</label>
                        <input type="file" class="form-control" name="gambar_sampul_produk" id="gambar_sampul_produk">
                        Format file: .jpg, .jpeg, .png<br>
                        Ukuran maksimal: 2 MB
                        <input type="hidden" name="nama_gambar_lama" id="nama_gambar_lama">                          
                    </div>  
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_produk" class="id_produk">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit gambar sampul-->

<!-- Modal Edit Gambar produk 1-->
<form action="<?= base_url(); ?>/adminproduk/updategambar1" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editgambar1Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gambar Produk</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <img width="100%" class="img-thumbnail" id="tampil_gambar_produk">
                    </div>                        

                    <div class="form-group">
                        <label>Gambar Sampul Produk</label>
                        <input type="file" class="form-control" name="gambar_produk_1" id="gambar_produk_1">
                        Format file: .jpg, .jpeg, .png<br>
                        Ukuran maksimal: 2 MB
                        <input type="hidden" name="nama_gambar_lama" id="nama_gambar_lama">                          
                    </div>  
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_produk" class="id_produk">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit gambar produk 1-->

<!-- Modal Edit Gambar produk 2-->
<form action="<?= base_url(); ?>/adminproduk/updategambar2" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editgambar2Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gambar Produk</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <img width="100%" class="img-thumbnail" id="tampil_gambar_produk">
                    </div>                        

                    <div class="form-group">
                        <label>Gambar Sampul Produk</label>
                        <input type="file" class="form-control" name="gambar_produk_2" id="gambar_produk_2">
                        Format file: .jpg, .jpeg, .png<br>
                        Ukuran maksimal: 2 MB
                        <input type="hidden" name="nama_gambar_lama" id="nama_gambar_lama">                          
                    </div>  
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_produk" class="id_produk">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit gambar 2-->

<!-- Modal Edit Gambar 3-->
<form action="<?= base_url(); ?>/adminproduk/updategambar3" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editgambar3Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gambar Produk</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <img width="100%" class="img-thumbnail" id="tampil_gambar_produk">
                    </div>                        

                    <div class="form-group">
                        <label>Gambar Sampul Produk</label>
                        <input type="file" class="form-control" name="gambar_produk_3" id="gambar_produk_3">
                        Format file: .jpg, .jpeg, .png<br>
                        Ukuran maksimal: 2 MB
                        <input type="hidden" name="nama_gambar_lama" id="nama_gambar_lama">                          
                    </div>  
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_produk" class="id_produk">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit gambar 3-->

<!-- Modal Delete Product-->
<form action="<?= base_url(); ?>/adminproduk/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
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

                // get Edit Product
                $('body').on('click','.btn-edit',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    const nama = $(this).data('nama');
                    const deskripsi = $(this).data('deskripsi');
                    const harga = $(this).data('harga');
                    // Set data to Form Edit
                    $('.id_produk').val(id);
                    $('.modal-body #nama_produk').val(nama);
                    $('.modal-body #deskripsi_produk').val(deskripsi);
                    $('.modal-body #harga_produk').val(harga);
                    // Call Modal Edit
                    $('#editModal').modal('show');
                });

                // get Edit Product
                $('body').on('click','.btn-edit-gambar-sampul',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    const gambar = $(this).data('gambar');
                    // Set data to Form Edit
                    $('.id_produk').val(id);
                    $('.modal-body #nama_gambar_lama').val(gambar);
                    $('.modal-body #tampil_gambar_produk').attr('src','<?= base_url(); ?>/uploads/gambarproduk/'+gambar);
                    // Call Modal Edit
                    $('#editgambarsampulModal').modal('show');
                });

                // get Edit Product
                $('body').on('click','.btn-edit-gambar-1',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    const gambar = $(this).data('gambar');
                    // Set data to Form Edit
                    $('.id_produk').val(id);
                    $('.modal-body #nama_gambar_lama').val(gambar);
                    $('.modal-body #tampil_gambar_produk').attr('src','<?= base_url(); ?>/uploads/gambarproduk/'+gambar);
                    // Call Modal Edit
                    $('#editgambar1Modal').modal('show');
                });

                // get Edit Product
                $('body').on('click','.btn-edit-gambar-2',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    const gambar = $(this).data('gambar');
                    // Set data to Form Edit
                    $('.id_produk').val(id);
                    $('.modal-body #nama_gambar_lama').val(gambar);
                    $('.modal-body #tampil_gambar_produk').attr('src','<?= base_url(); ?>/uploads/gambarproduk/'+gambar);
                    // Call Modal Edit
                    $('#editgambar2Modal').modal('show');
                });

                // get Edit Product
                $('body').on('click','.btn-edit-gambar-3',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    const gambar = $(this).data('gambar');
                    // Set data to Form Edit
                    $('.id_produk').val(id);
                    $('.modal-body #nama_gambar_lama').val(gambar);
                    $('.modal-body #tampil_gambar_produk').attr('src','<?= base_url(); ?>/uploads/gambarproduk/'+gambar);
                    // Call Modal Edit
                    $('#editgambar3Modal').modal('show');
                });
                
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