<?= $this->extend('template/template_admin') ?>
<?= $this->section('content') ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Gambar Wisata</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Gambar Wisata</li>
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
                    <th>Nama Wisata</th>
                    <th>Deskripsi Gambar</th>
                    <th>Sumber Gambar</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($tb_gambar_wisata as $row):?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_wisata; ?></td>
                    <td><?= $row->deskripsi_gambar_wisata;?></td>
                    <td><?= substr($row->sumber_gambar_wisata,0,50);?></td>
                    <td><img width="250px" class="rounded" src="<?= base_url() . "/uploads/gambarwisata/" . $row->nama_gambar_wisata; ?>"></td>
                    <td>            
                        <a style="width:100%;" class="btn btn-primary btn-sm btn-edit" data-id="<?= $row->id_gambar_wisata;?>" data-deskripsi="<?= $row->deskripsi_gambar_wisata;?>" data-gambar="<?= $row->nama_gambar_wisata;?>" data-wisata="<?= $row->id_nama_wisata;?>" data-sumber="<?= $row->sumber_gambar_wisata;?>">Edit</a>

                        <a style="width:100%; margin-top: 10%" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->id_gambar_wisata;?>" data-gambar="<?= $row->nama_gambar_wisata;?>">Hapus</a>
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
<form action="<?= base_url(); ?>/admingambar/save" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Gambar Wisata</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Tempat Wisata</label>
                        <select name="id_nama_wisata" class="form-control">
                            <option value="">-Pilih-</option>
                            <?php foreach($tb_wisata as $row):?>
                                <option value="<?= $row->id_wisata;?>"><?= $row->nama_wisata;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>                        

                    <div class="form-group">
                        <label>Deskripsi Gambar</label>
                        <input type="text" class="form-control" name="deskripsi_gambar_wisata" placeholder=" Deskripsi maksimal 100 karakter" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" maxlength="100">
                    </div>

                    <div class="form-group">
                        <label>Sumber Gambar</label>
                        <input type="text" class="form-control" name="sumber_gambar_wisata" placeholder="Sumber Gambar" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" maxlength="200">
                    </div>   

                    <div class="form-group">
                        <label>Gambar Wisata</label>
                        <input type="file" class="form-control" name="nama_gambar_wisata">
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
<form action="<?= base_url(); ?>/admingambar/update" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Gambar Wisata</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Tempat Wisata</label>
                        <select name="id_nama_wisata" id="id_nama_wisata" class="form-control">
                            <option value="">-Pilih-</option>
                            <?php foreach($tb_wisata as $row):?>
                                <option value="<?= $row->id_wisata;?>"><?= $row->nama_wisata;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>                        
                    
                    <div class="form-group">
                        <label>Deskripsi Gambar</label>
                        <input type="text" class="form-control" name="deskripsi_gambar_wisata" id="deskripsi_gambar_wisata" placeholder="Deskripsi maksimal 100 karakter" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" maxlength="100">
                    </div>

                    <div class="form-group">
                        <label>Sumber Gambar</label>
                        <input type="text" class="form-control" name="sumber_gambar_wisata" id="sumber_gambar_wisata" placeholder="Sumber Gambar" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" maxlength="200">
                    </div>                         

                    <div class="form-group">
                        <div class="row">
                            <div class="col-9">
                                <label>Gambar Wisata</label>
                                <input type="file" class="form-control" name="nama_gambar_wisata" id="nama_gambar_wisata">
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
                    <input type="hidden" name="id_gambar_wisata" class="id_gambar_wisata">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Product-->
<form action="<?= base_url(); ?>/admingambar/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Gambar</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                 <h4>Apakah Anda yakin akan menghapus gambar ini?</h4>
                 
             </div>
             <div class="modal-footer">
                <input type="hidden" name="id_gambar_wisata" class="id_gambar_wisata">
                <input type="hidden" name="nama_gambar_wisata" id="nama_gambar_wisata">
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
                    const deskripsi = $(this).data('deskripsi');
                    const wisata = $(this).data('wisata');
                    const gambar = $(this).data('gambar');
                    const sumber = $(this).data('sumber');
                    // Set data to Form Edit
                    $('.id_gambar_wisata').val(id);
                    $('.modal-body #deskripsi_gambar_wisata').val(deskripsi);
                    $('.modal-body #sumber_gambar_wisata').val(sumber);
                    $('.modal-body #id_nama_wisata').val(wisata).trigger('change');
                    $('.modal-body #nama_gambar_lama').val(gambar);
                    $('#tampil_gambar_wisata').attr('src','<?= base_url(); ?>/uploads/gambarwisata/'+gambar);
                    // Call Modal Edit
                    $('#editModal').modal('show');
                });
                
                // get Delete Product
                $('.btn-delete').on('click',function(){
                    // get data from button delete
                    const id = $(this).data('id');
                    const gambar = $(this).data('gambar');
                    // Set data to Form delete
                    $('.id_gambar_wisata').val(id);
                    $('.modal-footer #nama_gambar_wisata').val(gambar);
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