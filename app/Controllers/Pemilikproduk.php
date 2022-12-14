<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Produk_model;

class Pemilikproduk extends Controller
{

	public function __construct()
    {
        if (session()->get('role') != 2) {
            echo view('/errors/error-403.php');
            exit;
        }
    }
	
	public function index()
	{
		$model 				= new Produk_model();
		$data['tb_produk'] 	= $model->getProdukPemilik()->getResult();
		$data['tb_toko'] 	= $model->getTokoPemilik()->getResult();
		$data['session']	= session();
		echo view('/pemilik/produk_view', $data);
	}

	public function save()
	{
		// validasi upload gambar
		if (!$this->validate([
			'gambar_sampul_produk' 	=> [
				'rules'				=> 'uploaded[gambar_sampul_produk]|mime_in[gambar_sampul_produk,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_sampul_produk,2048]',
				'errors'			=> [
					'uploaded'		=> 'Harus Ada File yang diupload',
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
			],
			'gambar_produk_1' 	=> [
				'rules'			=> 'uploaded[gambar_produk_1]|mime_in[gambar_produk_1,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_produk_1,2048]',
				'errors'		=> [
					'uploaded'	=> 'Harus Ada File yang diupload',
					'mime_in'	=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'	=> 'Ukuran File Maksimal 2 MB'
				]
			],
			'gambar_produk_2' 	=> [
				'rules'			=> 'uploaded[gambar_produk_2]|mime_in[gambar_produk_2,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_produk_2,2048]',
				'errors'		=> [
					'uploaded'	=> 'Harus Ada File yang diupload',
					'mime_in'	=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'	=> 'Ukuran File Maksimal 2 MB'
				]
			],
			'gambar_produk_3' 	=> [
				'rules'			=> 'uploaded[gambar_produk_3]|mime_in[gambar_produk_3,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_produk_3,2048]',
				'errors'		=> [
					'uploaded'	=> 'Harus Ada File yang diupload',
					'mime_in'	=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'	=> 'Ukuran File Maksimal 2 MB'
				]
			],
			'nama_produk' 		=> [
				'rules'			=> 'is_unique[tb_produk.nama_produk]',
				'errors'		=> [
					'is_unique'	=> 'Produk sudah terdaftar!',
				]
			]
		])){
			// notifikasi jika ada error
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/pemilikproduk'));
		}
		$model 					= new Produk_model();
		$id_user				= session()->get('id_user');
		$gambar_sampul_produk 	= $this->request->getFile('gambar_sampul_produk');
		$gambar_produk_1 		= $this->request->getFile('gambar_produk_1');
		$gambar_produk_2 		= $this->request->getFile('gambar_produk_2');
		$gambar_produk_3 		= $this->request->getFile('gambar_produk_3');
		$nama_file_sampul		= $gambar_sampul_produk->getRandomName();
		$nama_file_1			= $gambar_produk_1->getRandomName();
		$nama_file_2			= $gambar_produk_2->getRandomName();
		$nama_file_3			= $gambar_produk_3->getRandomName();
		$data 					= [
			'nama_produk'			=> $this->request->getPost('nama_produk'),
			'deskripsi_produk'		=> $this->request->getPost('deskripsi_produk'),
			'harga_produk'			=> $this->request->getPost('harga_produk'),
			'gambar_sampul_produk'	=> $nama_file_sampul,
			'gambar_produk_1'		=> $nama_file_1,
			'gambar_produk_2'		=> $nama_file_2,
			'gambar_produk_3'		=> $nama_file_3,
			'toko_produk'			=> $id_user,
		];
		\Config\Services::image()->withFile($gambar_sampul_produk)->fit(1280, 720, 'center')->save('uploads/gambarproduk/' . $nama_file_sampul);
		\Config\Services::image()->withFile($gambar_produk_1)->fit(1280, 720, 'center')->save('uploads/gambarproduk/' . $nama_file_1);
		\Config\Services::image()->withFile($gambar_produk_2)->fit(1280, 720, 'center')->save('uploads/gambarproduk/' . $nama_file_2);
		\Config\Services::image()->withFile($gambar_produk_3)->fit(1280, 720, 'center')->save('uploads/gambarproduk/' . $nama_file_3);
		$model->saveProduk($data);
		session()->setFlashdata('message', 'Data berhasil ditambahkan!');
		return redirect()->to(base_url('/pemilikproduk'));
	}

	public function update()
	{
		$model 	= new Produk_model();
		$id 	= $this->request->getPost('id_produk');
		$data 	= [
			'nama_produk' 		=> $this->request->getPost('nama_produk'),
			'deskripsi_produk'	=> $this->request->getPost('deskripsi_produk'),
			'harga_produk'		=> $this->request->getPost('harga_produk')
		];		
		$model->updateProduk($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/pemilikproduk'));
	}

	public function updategambarsampul()
	{
		if (!$this->validate([
			'gambar_sampul_produk'	=> [
				'rules'				=> 'mime_in[gambar_sampul_produk,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_sampul_produk,2048]',
				'errors'			=> [
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/pemilikproduk'));
		}
		$model 			= new Produk_model();
		$id 			= $this->request->getPost('id_produk');
		$gambar_sampul_produk 	= $this->request->getFile('gambar_sampul_produk');
		if($gambar_sampul_produk->isValid() && !$gambar_sampul_produk->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarproduk/" . $nama_file_lama)){
				unlink("uploads/gambarproduk/" . $nama_file_lama);
			}
			$nama_file = $gambar_sampul_produk->getRandomName();
			\Config\Services::image()->withFile($gambar_sampul_produk)->fit(1280, 720, 'center')->save('uploads/gambarproduk/' . $nama_file);
			$data = [
				'gambar_sampul_produk'	=> $nama_file			
			];
		}		
		$model->updateProduk($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/pemilikproduk'));
	}

	public function updategambar1()
	{
		if (!$this->validate([
			'gambar_produk_1'	=> [
				'rules'				=> 'mime_in[gambar_produk_1,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_produk_1,2048]',
				'errors'			=> [
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/pemilikproduk'));
		}
		$model 			= new Produk_model();
		$id 			= $this->request->getPost('id_produk');
		$gambar_produk_1 	= $this->request->getFile('gambar_produk_1');
		if($gambar_produk_1->isValid() && !$gambar_produk_1->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarproduk/" . $nama_file_lama)){
				unlink("uploads/gambarproduk/" . $nama_file_lama);
			}
			$nama_file = $gambar_produk_1->getRandomName();
			\Config\Services::image()->withFile($gambar_produk_1)->fit(1280, 720, 'center')->save('uploads/gambarproduk/' . $nama_file);
			$data = [
				'gambar_produk_1'	=> $nama_file			
			];
		}		
		$model->updateProduk($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/pemilikproduk'));
	}

	public function updategambar2()
	{
		if (!$this->validate([
			'gambar_produk_2'	=> [
				'rules'				=> 'mime_in[gambar_produk_2,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_produk_2,2048]',
				'errors'			=> [
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/pemilikproduk'));
		}
		$model 			 = new Produk_model();
		$id 			 = $this->request->getPost('id_produk');
		$gambar_produk_2 = $this->request->getFile('gambar_produk_2');
		if($gambar_produk_2->isValid() && !$gambar_produk_2->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarproduk/" . $nama_file_lama)){
				unlink("uploads/gambarproduk/" . $nama_file_lama);
			}
			$nama_file = $gambar_produk_2->getRandomName();
			\Config\Services::image()->withFile($gambar_produk_2)->fit(1280, 720, 'center')->save('uploads/gambarproduk/' . $nama_file);
			$data = [
				'gambar_produk_2'	=> $nama_file			
			];
		}		
		$model->updateProduk($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/pemilikproduk'));
	}

	public function updategambar3()
	{
		if (!$this->validate([
			'gambar_produk_3'	=> [
				'rules'				=> 'mime_in[gambar_produk_3,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_produk_3,2048]',
				'errors'			=> [
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/pemilikproduk'));
		}
		$model 			= new Produk_model();
		$id 			= $this->request->getPost('id_produk');
		$gambar_produk_3 	= $this->request->getFile('gambar_produk_3');
		if($gambar_produk_3->isValid() && !$gambar_produk_3->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarproduk/" . $nama_file_lama)){
				unlink("uploads/gambarproduk/" . $nama_file_lama);
			}
			$nama_file = $gambar_produk_3->getRandomName();
			\Config\Services::image()->withFile($gambar_produk_3)->fit(1280, 720, 'center')->save('uploads/gambarproduk/' . $nama_file);
			$data = [
				'gambar_produk_3'	=> $nama_file			
			];
		}		
		$model->updateProduk($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/pemilikproduk'));
	}

	public function delete()
	{
		$model 					= new Produk_model();
		$id 					= $this->request->getPost('id_produk');
		$gambar_sampul_produk 	= $this->request->getPost('gambar_sampul_produk');
		$gambar_produk_1 		= $this->request->getPost('gambar_produk_1');
		$gambar_produk_2 		= $this->request->getPost('gambar_produk_2');
		$gambar_produk_3 		= $this->request->getPost('gambar_produk_3');
		if(file_exists("uploads/gambarproduk/" . $gambar_sampul_produk)){
			unlink("uploads/gambarproduk/" . $gambar_sampul_produk);}
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