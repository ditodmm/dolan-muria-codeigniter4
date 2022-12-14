<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;
use App\Models\Toko_model;

class Pemilikuser extends Controller
{

	public function __construct()
	{
		if (session()->get('role') != 2 && session()->get('role') != 3) {
			echo view('/errors/error-403.php');
			exit;
		}
	}
	
	public function index()
	{
		$model 				= new User_model();
		$data['tb_user'] 	= $model->getPemilik()->getRow();
		$data['session']	= session();
		echo view('/pemilik/profil_view', $data);
	}

	public function updatepassword()
	{
		if (!$this->validate([
			'password_baru' 		=> [
				'rules'				=> 'min_length[6]|max_length[200]',
				'errors'			=> [
					'min_length'	=> 'Password minimal 6 karakter!',
					'max_length'	=> 'Password tidak boleh lebih dari 200 karakter!',
				]
			],
			'konfirmasi_password'	=> [
				'rules'				=> 'matches[password_baru]',
				'errors'			=> [
					'matches'		=> 'Password tidak sesuai!',
				]
			],			
		])){
			// notifikasi jika ada error
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/pemilikuser'));
		}
		$model 				= new User_model();
		$id					= $this->request->getPost('id_user');
		$password_lama 		= $this->request->getPost('password_lama');
		$konf_password_lama = $this->request->getPost('konfpasswordlama');
		if(password_verify($password_lama, $konf_password_lama)){
			$data 	= [
				'password'	=> password_hash($this->request->getPost('password_baru'), PASSWORD_DEFAULT),
			];
			$model->updateUser($data,$id);
			session()->setFlashdata('message', 'Password berhasil diubah!');		
			return redirect()->to(base_url('/pemilikuser'));
		}
		else{
			session()->setFlashdata('error', 'Password lama tidak sesuai!');
			return redirect()->to(base_url('/pemilikuser'));
		}

	}

	public function updatetoko()
	{
		if (!$this->validate([
			'gambar_toko'		=> [
				'rules'			=> 'mime_in[gambar_toko,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_toko,2048]',
				'errors'		=> [
					'mime_in'	=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'	=> 'Ukuran File Maksimal 2 MB'
				]

			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/pemilikuser'));
		}
		$model 			= new Toko_model();
		$nik 			= $this->request->getPost('nik_pemilik_toko');
		$gambar_toko 	= $this->request->getFile('gambar_toko');
		$gmaps_toko 	= $this->request->getPost('gmaps_toko');
		$split_gmaps 	= explode(" ",$gmaps_toko);
		$src_gmaps 		= $split_gmaps[1];
		if($gambar_toko->isValid() && !$gambar_toko->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambartoko/" . $nama_file_lama)){
				unlink("uploads/gambartoko/" . $nama_file_lama);
			}
			$nama_file = $gambar_toko->getRandomName();
			\Config\Services::image()->withFile($gambar_toko)->fit(1280, 720, 'center')->save('uploads/gambartoko/' . $nama_file);
			$data = [
				'nama_pemilik_toko'	=> $this->request->getPost('nama_pemilik_toko'),
				'nama_toko'			=> $this->request->getPost('nama_toko'),
				'email_toko'		=> $this->request->getPost('email_toko'),
				'alamat_toko'		=> $this->request->getPost('alamat_toko'),
				'no_telepon'		=> $this->request->getPost('no_telepon'),
				'gmaps_toko'		=> htmlspecialchars($src_gmaps),
				'gambar_toko'		=> $nama_file,
				'hari_buka_dari'	=> $this->request->getPost('hari_buka_dari'),
				'hari_buka_sampai'	=> $this->request->getPost('hari_buka_sampai'),
				'jam_buka_dari'		=> $this->request->getPost('jam_buka_dari'),
				'jam_buka_sampai'	=> $this->request->getPost('jam_buka_sampai'),
			];
		}else
		{
			$data = [
				'nama_pemilik_toko'	=> $this->request->getPost('nama_pemilik_toko'),
				'nama_toko'			=> $this->request->getPost('nama_toko'),
				'email_toko'		=> $this->request->getPost('email_toko'),
				'alamat_toko'		=> $this->request->getPost('alamat_toko'),
				'no_telepon'		=> $this->request->getPost('no_telepon'),
				'gmaps_toko'		=> htmlspecialchars($src_gmaps),
				'hari_buka_dari'	=> $this->request->getPost('hari_buka_dari'),
				'hari_buka_sampai'	=> $this->request->getPost('hari_buka_sampai'),
				'jam_buka_dari'		=> $this->request->getPost('jam_buka_dari'),
				'jam_buka_sampai'	=> $this->request->getPost('jam_buka_sampai'),			
			];
		}		
		$model->updatePemilik($data,$nik);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/pemilikuser'));
	}

	public function delete()
	{
		$model 					= new Produk_model();
		$id 					= $this->request->getPost('id_produk');
		$gambar_toko 	= $this->request->getPost('gambar_toko');
		$gambar_produk_1 		= $this->request->getPost('gambar_produk_1');
		$gambar_produk_2 		= $this->request->getPost('gambar_produk_2');
		$gambar_produk_3 		= $this->request->getPost('gambar_produk_3');
		if(file_exists("uploads/gambarproduk/" . $gambar_toko)){
			unlink("uploads/gambarproduk/" . $gambar_toko);}
			if(file_exists("uploads/gambarproduk/" . $gambar_produk_1)){
				unlink("uploads/gambarproduk/" . $gambar_produk_1);}
				if(file_exists("uploads/gambarproduk/" . $gambar_produk_2)){
					unlink("uploads/gambarproduk/" . $gambar_produk_2);}
					if(file_exists("uploads/gambarproduk/" . $gambar_produk_3)){
						unlink("uploads/gambarproduk/" . $gambar_produk_3);}
						$model->deleteproduk($id);
						session()->setFlashdata('message', 'Data berhasil dihapus!');
						return redirect()->to(base_url('/pemilikproduk'));
					}
				}