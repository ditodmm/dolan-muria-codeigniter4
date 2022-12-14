<?= $this->extend('template/template_admin') ?>
<?= $this->section('content') ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Transportasi</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Transportasi</li>
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
                    <th>Google Maps</th>
                    <th>Gambar</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($tb_transportasi as $row):?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_transportasi;?></td>
                    <td><?= substr($row->deskripsi_transportasi,0,50).'...';?></td>
                    <td><?= substr($row->alamat_transportasi,0,50).'...';?></td>
                    <td><?= substr(htmlspecialchars_decode($row->gmaps_transportasi),5,15).'...'?></td>
                    <td><img width="150px" class="img-thumbnail" src="<?= base_url() . "/uploads/gambartransportasi/" . $row->gambar_transportasi; ?>"></td>
                    <td>            
                        <a style="width:100%;" class="btn btn-primary btn-sm btn-edit" data-id="<?= $row->id_transportasi;?>" data-nama="<?= $row->nama_transportasi;?>" data-deskripsi="<?= $row->deskripsi_transportasi;?>" data-alamat="<?= $row->alamat_transportasi;?>" data-gmaps="<?= $row->gmaps_transportasi; ?>" data-gambar="<?= $row->gambar_transportasi;?>">Edit</a>

                        <a style="width:100%; margin-top: 10%" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->id_transportasi;?>" data-gambar="<?= $row->gambar_transportasi;?>">Hapus</a>
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
<form action="<?= base_url(); ?>/admintransportasi/save" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Transportasi</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <div class="form-group">
                        <label>Nama Transportasi</label>
                        <input type="text" class="form-control" name="nama_transportasi" placeholder="Nama transportasi">
                    </div>
                    
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi_transportasi" placeholder="Deskripsi"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat_transportasi" placeholder="Alamat">
                    </div>

                    <div class="form-group">
                        <label>Google Maps</label>
                        <input type="text" class="form-control" name="gmaps_transportasi" placeholder="Google Maps">
                    </div>                          

                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar_transportasi">
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
<form action="<?= base_url(); ?>/admintransportasi/update" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data transportasi</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <div class="form-group">
                        <label>Nama transportasi</label>
                        <input type="text" class="form-control" name="nama_transportasi" id="nama_transportasi" placeholder="Nama transportasi">
                    </div>
                    
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi_transportasi" id="deskripsi_transportasi" placeholder="Deskripsi"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat_transportasi" id="alamat_transportasi" placeholder="Alamat">
                    </div>

                    <div class="form-group">
                        <label>Google Maps</label>
                        <input type="text" class="form-control" name="gmaps_transportasi" id="gmaps_transportasi" placeholder="Google Maps">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-9">
                                <label>Gambar Sampul Transportasi</label>
                                <input type="file" class="form-control" name="gambar_transportasi" id="gambar_transportasi">
                                Format file: .jpg, .jpeg, .png<br>
                                Ukuran maksimal: 2 MB
                                <input type="hidden" name="nama_gambar_lama" id="nama_gambar_lama">
                            </div>
                            <div class="col-3">
                                <img width="100%" class="img-thumbnail" id="tampil_gambar_transportasi">
                            </div>
                        </div>                            
                    </div>         
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_transportasi" class="id_transportasi">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Product-->
<form action="<?= base_url(); ?>/admintransportasi/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data transportasi</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                 <h4>Apakah Anda yakin akan menghapus data ini?</h4>
                 
             </div>
             <div class="modal-footer">
                <input type="hidden" name="id_transportasi" class="id_transportasi">
                <input type="hidden" name="gambar_transportasi" id="gambar_transportasi">
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
                    const gmaps = $(this).data('gmaps');
                    const gambar = $(this).data('gambar');
                    // Set data to Form Edit
                    $('.id_transportasi').val(id);
                    $('.modal-body #nama_transportasi').val(nama);
                    $('.modal-body #deskripsi_transportasi').val(deskripsi);
                    $('.modal-body #alamat_transportasi').val(alamat);
                    $('.modal-body #gmaps_transportasi').val('google ' + gmaps);
                    $('.modal-body #nama_gambar_lama').val(gambar);
                    $('#tampil_gambar_transportasi').attr('src','<?= base_url(); ?>/uploads/gambartransportasi/'+gambar);
                    // Call Modal Edit
                    $('#editModal').modal('show');
                });
                
                // get Delete Product
                $('.btn-delete').on('click',function(){
                    // get data from button delete
                    const id = $(this).data('id');
                    const gambar = $(this).data('gambar');
                    // Set data to Form delete
                    $('.id_transportasi').val(id);
                    $('.modal-footer #gambar_transportasi').val(gambar);
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