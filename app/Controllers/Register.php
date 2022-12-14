<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;

class Register extends Controller
{
	public function __construct()
	{
		$this->email = \Config\Services::email();
	}

	public function index()
	{
		$data = [];
		echo view('register_view',$data);
	}

	public function save()
	{
		if (!$this->validate([
			'username' 			=> [
				'rules'			=> 'min_length[3]|max_length[50]|is_unique[tb_user.username]',
				'errors'		=> [
					'is_unique'	=> 'Username sudah digunakan!',
					'min_length'=> 'Username minimal 3 karakter!',
					'max_length'=> 'Username tidak boleh lebih dari 50 karakter!',
				]				
			],
			'nik_pemilik_toko'	=> [
				'rules'			=> 'min_length[16]|max_length[16]|is_unique[tb_toko.nik_pemilik_toko]',
				'errors'		=> [
					'is_unique'	=> 'NIK sudah terdaftar!',
					'min_length'=> 'NIK harus berjumlah 16 karakter!',
					'max_length'=> 'NIK harus berjumlah 16 karakter!',
				]				
			],
			'email_toko'		=> [
				'rules'			=> 'is_unique[tb_toko.email_toko]',
				'errors'		=> [
					'is_unique'	=> 'Email sudah terdaftar!',
				]				
			],			
			'password' 			=> [
				'rules'			=> 'min_length[6]|max_length[200]',
				'errors'		=> [
					'min_length'=> 'Password minimal 6 karakter!',
					'max_length'=> 'Password tidak boleh lebih dari 200 karakter!',
				]
			],
			'konfirmasi_password'=> [
				'rules'			=> 'matches[password]',
				'errors'		=> [
					'matches'	=> 'Password tidak sesuai!',
				]
			],			
		])){
			// notifikasi jika ada error
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/register'));
		}
			$model 		= new User_model();
			$username 	= $this->request->getPost('username');
			$password 	= $this->request->getPost('password');
			$email 		= $this->request->getPost('email_toko');
			$set 		= '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    		$kode 		= substr(str_shuffle($set), 0, 12);
			$data_user	= [
				'username'				=> $username,
				'password'				=> password_hash($password, PASSWORD_DEFAULT),
				'kode'					=> $kode,
				'role'					=> $this->request->getPost('role')
			];
			$model->saveUser($data_user);
			$id_user = $model->db->insertID();
			$data_toko	= [
				'nik_pemilik_toko'		=> $this->request->getPost('nik_pemilik_toko'),
				'nama_pemilik_toko'		=> $this->request->getPost('nama_pemilik_toko'),
				'nama_toko'				=> $this->request->getPost('nama_toko'),
				'email_toko'			=> $this->request->getPost('email_toko'),
				'alamat_toko'			=> $this->request->getPost('alamat_toko'),
				'no_telepon'			=> $this->request->getPost('no_telepon'),
				'gambar_toko'			=> 'kosong',
				'id_user_pemilik_toko'	=> $id_user
			];
			$model->saveToko($data_toko);
			$message = 	"
    						<html>
    						<head>
    							<title>Kode Verifikasi</title>
    						</head>
    						<body>
    							<h4>Terima kasih sudah mendaftar.</h4>
    							<p>Akun anda:</p>
    							<p>Username: ".$username."</p>
    							<p>Password: ".$password."</p>
    							<p>Klik link di bawah ini untuk aktivasi akun anda.</p>
    							<h4><a href='".base_url()."/register/verifikasi/".$id_user."/".$kode."'>Verifikasi Akun</a></h4>
    						</body>
    						</html>
    						";
			$this->email->setFrom('shoyo3232@gmail.com','Admin Dolan Muria');
			$this->email->setTo($email);
			$this->email->setSubject('Verifikasi Akun Dolan Muria');
			$this->email->setMessage($message);
			if(! $this->email->send()){
				session()->setFlashdata('error', 'Pengiriman link verifikasi akun gagal! Silahkan hubungi Admin <a href="https://wa.me/6281227708593">di sini</a>');
				return redirect()->to(base_url('/register'));
			}else{
				session()->setFlashdata('message', 'Akun berhasil dibuat. Silahkan cek email untuk verifikasi akun.');
				return redirect()->to(base_url('/register'));
			}
	}

	public function verifikasi()
	{
		$model = new User_model();
		$request = \Config\Services::request();
		$id =  $request->uri->getSegment(3);
    	$code = $request->uri->getSegment(4);

    	//fetch user details
    	$user = $model->getKodeUser($id)->getRow();
    	$kode = $user->kode;
     
    	//if code matches
    	if($kode == $code){
    		//update user active status
    		$data['status'] = 1;
    		$query = $model->verifikasiAkun($data, $id);
     
    		if($query){
    			session()->setFlashdata('message', 'Verifikasi akun berhasil! Silahkan Login dengan username dan password Anda!');
    		}
    		else{
    			session()->setFlashdata('error', 'Ada kesalahan dalam verifikasi akun!');
    		}
    	}
    	else{
    		session()->setFlashdata('error', 'Tidak bisa verifikasi akun! Kode verifikasi tidak sama!');
    	}
     
    	return redirect()->to(base_url('/login'));   	
	}
}