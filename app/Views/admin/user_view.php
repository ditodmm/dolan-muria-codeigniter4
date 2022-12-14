<?= $this->extend('template/template_admin') ?>
<?= $this->section('content') ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data User</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data User</li>
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
        <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#addModal"><i data-feather="plus-circle"></i> Tambah Admin</button>
    </div>
    <div class="card-body">
        <table class='table table-striped' id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($tb_user as $row):?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->username;?></td>
                    <td>
                        <?php
                        if($row->role == 1){
                            echo 'Admin';
                        }
                        elseif($row->role == 2){
                            echo 'Pemilik Toko Oleh-Oleh';
                        }
                        else{
                            echo 'Pemilik Warung Makan';
                        };
                        ?>
                    </td>
                    <td style="text-align: center;">
                        <?php
                        if($row->status == 1){
                            echo '<span class="badge bg-primary">Aktif</span>';
                        }
                        else{
                            echo '<span class="badge bg-danger">Tidak Aktif</span>';
                        };
                        ?>
                    </td>
                    <td>
                        <a style="width:100%;" href="#" class="btn btn-primary btn-sm btn-edit" data-id="<?= $row->id_user;?>" data-username="<?= $row->username;?>" data-password="<?= $row->password;?>" data-role="<?= $row->role;?>" data-status="<?= $row->status;?>">Edit Data</a>

                        <a style="width:100%; margin-top:10%;" href="#" class="btn btn-info btn-sm btn-edit-password" data-id="<?= $row->id_user;?>" data-password="<?= $row->password;?>">Edit Password</a>

                        <a style="width:100%; margin-top:10%;" href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->id_user;?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
</div>
</section>
</div>

<!-- Modal Add Admin-->
<form action="<?= base_url(); ?>/adminuser/save" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Admin</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username Minimal 3 Karakter" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password Minimal 6 Karakter" id="password" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                        <input type="checkbox" onclick="lihatPassword()"> Tampilkan Password
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" class="form-control" name="konfirmasipassword" placeholder="Password" id="konfirmasipassword" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                        <input type="checkbox" onclick="lihatKonfirmasiPassword()"> Tampilkan Password
                    </div>                        

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" readonly>
                            <option value="1">Admin</option>
                        </select>
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
<!-- End Modal Add Admin-->

<!-- Modal Edit Product-->
<form action="<?= base_url(); ?>/adminuser/updatedata" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username Minimal 3 Karakter" id="username" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')" readonly>
                    </div>                       

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" id="role">
                            <option value="1">Admin</option>
                            <option value="2">Pemilik Toko Oleh-Oleh</option>
                            <option value="3">Pemilik Warung Makan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                    </div> 

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_user" class="id_user">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Edit Product-->
<form action="<?= base_url(); ?>/adminuser/updatepassword" method="post">
    <div class="modal fade" id="editpasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password" class="form-control" name="password_lama" placeholder="Password" id="password_lama" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                        <input type="checkbox" onclick="lihatPasswordLama()"> Tampilkan Password
                    </div>

                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" class="form-control" name="password_baru" placeholder="Password" id="password_baru" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                        <input type="checkbox" onclick="lihatPasswordBaru()"> Tampilkan Password
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" name="konfirmasi_password" placeholder="Password" id="konfirmasi_password" required oninvalid="this.setCustomValidity('Wajib diisi!')" oninput="this.setCustomValidity('')">
                        <input type="checkbox" onclick="lihatKonfirmasiPasswords()"> Tampilkan Password
                    </div>                         

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_user" class="id_user">
                    <input type="hidden" name="konfpasswordlama" id="konfpasswordlama" class="konfpasswordlama">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->            

<!-- Modal Delete Product-->
<form action="<?= base_url(); ?>/adminuser/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                <input type="hidden" name="id_user" class="id_user">
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
                    const username = $(this).data('username');
                    const role = $(this).data('role');
                    const status = $(this).data('status');
                    // Set data to Form Edit
                    $('.id_user').val(id);
                    $('.modal-body #username').val(username);
                    $('.modal-body #role').val(role).trigger('change');
                    $('.modal-body #status').val(status).trigger('change');
                    // Call Modal Edit
                    $('#editModal').modal('show');
                });

                $('.btn-edit-password').on('click',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    const password = $(this).data('password');
                    // Set data to Form Edit
                    $('.id_user').val(id);
                    $('.modal-footer #konfpasswordlama').val(password);
                    // Call Modal Edit
                    $('#editpasswordModal').modal('show');
                });

                // get Delete Product
                $('.btn-delete').on('click',function(){
                    // get data from button delete
                    const id = $(this).data('id');
                    // Set data to Form delete
                    $('.id_user').val(id);
                    // Call Modal delete
                    $('#deleteModal').modal('show');
                });

            });

    function lihatPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function lihatKonfirmasiPasswords() {
        var x = document.getElementById("konfirmasi_password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function lihatKonfirmasiPassword() {
        var x = document.getElementById("konfirmasipassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function lihatPasswordLama() {
        var x = document.getElementById("password_lama");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function lihatPasswordBaru() {
        var x = document.getElementById("password_baru");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }                        

    $("#alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert").slideUp(500);
    });            
</script>
</body>

</html>

<?= $this->endSection() ?>