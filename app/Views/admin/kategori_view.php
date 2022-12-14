<?= $this->extend('template/template_admin') ?>
<?= $this->section('content') ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kategori Wisata</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Kategori Wisata</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <?php if (!empty(session()->getFlashdata('error'))) : ?> 
                <div class="alert alert-light-danger" role="alert" id="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
            <div class="alert alert-light-success" role="alert" id="alert">
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($tb_kategori as $row):?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_kategori;?></td>
                    <td>
                        <a class="btn btn-primary btn-sm btn-edit" data-id="<?= $row->id_kategori;?>" data-nama="<?= $row->nama_kategori;?>">Edit</i></a>

                        <a class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->id_kategori;?>">Hapus</i></a>
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
<form action="<?= base_url(); ?>/adminkategori/save" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Kategori Wisata</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori">
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
<form action="<?= base_url(); ?>/adminkategori/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_kategori" class="id_kategori">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Product-->
<form action="<?= base_url(); ?>/adminkategori/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                 <h4>Apakah Anda yakin akan menghapus data ini?</h4>
                 
             </div>
             <div class="modal-footer">
                <input type="hidden" name="id_kategori" class="id_kategori">
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
                    // Set data to Form Edit
                    $('.id_kategori').val(id);
                    $('.modal-body #nama_kategori').val(nama);
                    // Call Modal Edit
                    $('#editModal').modal('show');
                });
                
                // get Delete Product
                $('.btn-delete').on('click',function(){
                    // get data from button delete
                    const id = $(this).data('id');
                    // Set data to Form delete
                    $('.id_kategori').val(id);
                    // Call Modal delete
                    $('#deleteModal').modal('show');
                });
                
            });

    $("#alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert").slideUp(500);
    });            
</script>
</body>

</html>

<?= $this->endSection() ?>