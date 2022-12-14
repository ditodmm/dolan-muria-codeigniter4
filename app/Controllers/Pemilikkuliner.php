<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Kuliner_model;

class Pemilikkuliner extends Controller
{

	public function __construct()
    {
        if (session()->get('role') != 3) {
            echo view('/errors/error-403.php');
            exit;
        }
    }
	
	public function index()
	{
		$model 				= new kuliner_model();
		$data['tb_kuliner'] = $model->getKulinerPemilik()->getResult();
		$data['tb_toko'] 	= $model->getTokoPemilik()->getResult();
		$data['session']	= session();
		echo view('/pemilik/kuliner_view', $data);
	}

	public function save()
	{
		// validasi upload gambar
		if (!$this->validate([
			'gambar_sampul_kuliner' 	=> [
				'rules'				=> 'uploaded[gambar_sampul_kuliner]|mime_in[gambar_sampul_kuliner,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_sampul_kuliner,2048]',
				'errors'			=> [
					'uploaded'		=> 'Harus Ada File yang diupload',
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
			],
			'gambar_kuliner_1' 	=> [
				'rules'			=> 'uploaded[gambar_kuliner_1]|mime_in[gambar_kuliner_1,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_kuliner_1,2048]',
				'errors'		=> [
					'uploaded'	=> 'Harus Ada File yang diupload',
					'mime_in'	=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'	=> 'Ukuran File Maksimal 2 MB'
				]
			],
			'gambar_kuliner_2' 	=> [
				'rules'			=> 'uploaded[gambar_kuliner_2]|mime_in[gambar_kuliner_2,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_kuliner_2,2048]',
				'errors'		=> [
					'uploaded'	=> 'Harus Ada File yang diupload',
					'mime_in'	=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'	=> 'Ukuran File Maksimal 2 MB'
				]
			],
			'gambar_kuliner_3' 	=> [
				'rules'			=> 'uploaded[gambar_kuliner_3]|mime_in[gambar_kuliner_3,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_kuliner_3,2048]',
				'errors'		=> [
					'uploaded'	=> 'Harus Ada File yang diupload',
					'mime_in'	=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'	=> 'Ukuran File Maksimal 2 MB'
				]
			],
			'nama_kuliner' 		=> [
				'rules'			=> 'is_unique[tb_kuliner.nama_kuliner]',
				'errors'		=> [
					'is_unique'	=> 'Kuliner sudah terdaftar!',
				]
			]
		])){
			// notifikasi jika ada error
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/pemilikkuliner'));
		}
		$model 					= new kuliner_model();
		$id_user				= session()->get('id_user');
		$gambar_sampul_kuliner 	= $this->request->getFile('gambar_sampul_kuliner');
		$gambar_kuliner_1 		= $this->request->getFile('gambar_kuliner_1');
		$gambar_kuliner_2 		= $this->request->getFile('gambar_kuliner_2');
		$gambar_kuliner_3 		= $this->request->getFile('gambar_kuliner_3');
		$nama_file_sampul		= $gambar_sampul_kuliner->getRandomName();
		$nama_file_1			= $gambar_kuliner_1->getRandomName();
		$nama_file_2			= $gambar_kuliner_2->getRandomName();
		$nama_file_3			= $gambar_kuliner_3->getRandomName();
		$data 					= [
			'nama_kuliner'			=> $this->request->getPost('nama_kuliner'),
			'deskripsi_kuliner'		=> $this->request->getPost('deskripsi_kuliner'),
			'harga_kuliner'			=> $this->request->getPost('harga_kuliner'),
			'gambar_sampul_kuliner'	=> $nama_file_sampul,
			'gambar_kuliner_1'		=> $nama_file_1,
			'gambar_kuliner_2'		=> $nama_file_2,
			'gambar_kuliner_3'		=> $nama_file_3,
			'toko_kuliner'			=> $id_user,
		];
		\Config\Services::image()->withFile($gambar_sampul_kuliner)->fit(1280, 720, 'center')->save('uploads/gambarkuliner/' . $nama_file_sampul);
		\Config\Services::image()->withFile($gambar_kuliner_1)->fit(1280, 720, 'center')->save('uploads/gambarkuliner/' . $nama_file_1);
		\Config\Services::image()->withFile($gambar_kuliner_2)->fit(1280, 720, 'center')->save('uploads/gambarkuliner/' . $nama_file_2);
		\Config\Services::image()->withFile($gambar_kuliner_3)->fit(1280, 720, 'center')->save('uploads/gambarkuliner/' . $nama_file_3);
		$model->savekuliner($data);
		session()->setFlashdata('message', 'Data berhasil ditambahkan!');
		return redirect()->to(base_url('/pemilikkuliner'));
	}

	public function update()
	{
		$model 	= new kuliner_model();
		$id 	= $this->request->getPost('id_kuliner');
		$data 	= [
			'nama_kuliner' 		=> $this->request->getPost('nama_kuliner'),
			'deskripsi_kuliner'	=> $this->request->getPost('deskripsi_kuliner'),
			'harga_kuliner'		=> $this->request->getPost('harga_kuliner')
		];		
		$model->updatekuliner($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/pemilikkuliner'));
	}

	public function updategambarsampul()
	{
		if (!$this->validate([
			'gambar_sampul_kuliner'	=> [
				'rules'				=> 'mime_in[gambar_sampul_kuliner,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_sampul_kuliner,2048]',
				'errors'			=> [
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/pemilikkuliner'));
		}
		$model 			= new kuliner_model();
		$id 			= $this->request->getPost('id_kuliner');
		$gambar_sampul_kuliner 	= $this->request->getFile('gambar_sampul_kuliner');
		if($gambar_sampul_kuliner->isValid() && !$gambar_sampul_kuliner->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarkuliner/" . $nama_file_lama)){
				unlink("uploads/gambarkuliner/" . $nama_file_lama);
			}
			$nama_file = $gambar_sampul_kuliner->getRandomName();
			\Config\Services::image()->withFile($gambar_sampul_kuliner)->fit(1280, 720, 'center')->save('uploads/gambarkuliner/' . $nama_file);
			$data = [
				'gambar_sampul_kuliner'	=> $nama_file			
			];
		}		
		$model->updatekuliner($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/pemilikkuliner'));
	}

	public function updategambar1()
	{
		if (!$this->validate([
			'gambar_kuliner_1'	=> [
				'rules'				=> 'mime_in[gambar_kuliner_1,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_kuliner_1,2048]',
				'errors'			=> [
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/pemilikkuliner'));
		}
		$model 			= new kuliner_model();
		$id 			= $this->request->getPost('id_kuliner');
		$gambar_kuliner_1 	= $this->request->getFile('gambar_kuliner_1');
		if($gambar_kuliner_1->isValid() && !$gambar_kuliner_1->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarkuliner/" . $nama_file_lama)){
				unlink("uploads/gambarkuliner/" . $nama_file_lama);
			}
			$nama_file = $gambar_kuliner_1->getRandomName();
			\Config\Services::image()->withFile($gambar_kuliner_1)->fit(1280, 720, 'center')->save('uploads/gambarkuliner/' . $nama_file);
			$data = [
				'gambar_kuliner_1'	=> $nama_file			
			];
		}		
		$model->updatekuliner($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/pemilikkuliner'));
	}

	public function updategambar2()
	{
		if (!$this->validate([
			'gambar_kuliner_2'	=> [
				'rules'				=> 'mime_in[gambar_kuliner_2,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_kuliner_2,2048]',
				'errors'			=> [
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/pemilikkuliner'));
		}
		$model 			 = new kuliner_model();
		$id 			 = $this->request->getPost('id_kuliner');
		$gambar_kuliner_2 = $this->request->getFile('gambar_kuliner_2');
		if($gambar_kuliner_2->isValid() && !$gambar_kuliner_2->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarkuliner/" . $nama_file_lama)){
				unlink("uploads/gambarkuliner/" . $nama_file_lama);
			}
			$nama_file = $gambar_kuliner_2->getRandomName();
			\Config\Services::image()->withFile($gambar_kuliner_2)->fit(1280, 720, 'center')->save('uploads/gambarkuliner/' . $nama_file);
			$data = [
				'gambar_kuliner_2'	=> $nama_file			
			];
		}		
		$model->updatekuliner($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/pemilikkuliner'));
	}

	public function updategambar3()
	{
		if (!$this->validate([
			'gambar_kuliner_3'	=> [
				'rules'				=> 'mime_in[gambar_kuliner_3,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_kuliner_3,2048]',
				'errors'			=> [
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/pemilikkuliner'));
		}
		$model 			= new kuliner_model();
		$id 			= $this->request->getPost('id_kuliner');
		$gambar_kuliner_3 	= $this->request->getFile('gambar_kuliner_3');
		if($gambar_kuliner_3->isValid() && !$gambar_kuliner_3->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarkuliner/" . $nama_file_lama)){
				unlink("uploads/gambarkuliner/" . $nama_file_lama);
			}
			$nama_file = $gambar_kuliner_3->getRandomName();
			\Config\Services::image()->withFile($gambar_kuliner_3)->fit(1280, 720, 'center')->save('uploads/gambarkuliner/' . $nama_file);
			$data = [
				'gambar_kuliner_3'	=> $nama_file			
			];
		}		
		$model->updatekuliner($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/pemilikkuliner'));
	}

	public function delete()
	{
		$model 					= new kuliner_model();
		$id 					= $this->request->getPost('id_kuliner');
		$gambar_sampul_kuliner 	= $this->request->getPost('gambar_sampul_kuliner');
		$gambar_kuliner_1 		= $this->request->getPost('gambar_kuliner_1');
		$gambar_kuliner_2 		= $this->request->getPost('gambar_kuliner_2');
		$gambar_kuliner_3 		= $this->request->getPost('gambar_kuliner_3');
		if(file_exists("uploads/gambarkuliner/" . $gambar_sampul_kuliner)){
			unlink("uploads/gambarkuliner/" . $gambar_sampul_kuliner);}
		if(file_exists("uploads/gambarkuliner/" . $gambar_kuliner_1)){
			unlink("uploads/gambarkuliner/" . $gambar_kuliner_1);}
		if(file_exists("uploads/gambarkuliner/" . $gambar_kuliner_2)){
			unlink("uploads/gambarkuliner/" . $gambar_kuliner_2);}
		if(file_exists("uploads/gambarkuliner/" . $gambar_kuliner_3)){
			unlink("uploads/gambarkuliner/" . $gambar_kuliner_3);}
		$model->deletekuliner($id);
		session()->setFlashdata('message', 'Data berhasil dihapus!');
		return redirect()->to(base_url('/pemilikkuliner'));
	}
}