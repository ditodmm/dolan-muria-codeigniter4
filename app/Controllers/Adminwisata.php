<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Wisata_model;

class Adminwisata extends Controller
{

	public function __construct()
	{
		if (session()->get('role') != 1) {
			echo view('/errors/error-403.php');
			exit;
		}
	}
	
	public function index()
	{
		$model 					= new Wisata_model();
		$data['tb_wisata'] 		= $model->getWisata()->getResult();
		$data['tb_kategori'] 	= $model->getKategori()->getResult();
		$data['session']		= session();
		echo view('/admin/wisata_view', $data);
	}

	public function save()
	{
		// validasi upload gambar
		if (!$this->validate([
			'gambar_wisata' 	=> [
				'rules'			=> 'uploaded[gambar_wisata]|mime_in[gambar_wisata,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_wisata,2048]',
				'errors'		=> [
					'uploaded'	=> 'Harus Ada File yang diupload',
					'mime_in'	=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'	=> 'Ukuran File Maksimal 2 MB'
				]
			],
			'nama_wisata' 		=> [
				'rules'			=> 'is_unique[tb_wisata.nama_wisata]',
				'errors'		=> [
					'is_unique'	=> 'Nama wisata sudah terdaftar!',
				]
			],
		])){
			// notifikasi jika ada error
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/adminwisata'));
		}
		$model 			= new Wisata_model();
		$gambar_wisata 	= $this->request->getFile('gambar_wisata');
		$nama_file 		= $gambar_wisata->getRandomName();
		$gmaps_wisata 	= $this->request->getPost('gmaps_wisata');
		$split_gmaps 	= explode(" ",$gmaps_wisata);
		$src_gmaps 		= $split_gmaps[1];
		$data 			= [
			'nama_wisata'		=> $this->request->getPost('nama_wisata'),
			'deskripsi_wisata'	=> $this->request->getPost('deskripsi_wisata'),
			'kategori_wisata'	=> $this->request->getPost('kategori_wisata'),
			'alamat_wisata'		=> $this->request->getPost('alamat_wisata'),
			'tiket_wisata'		=> $this->request->getPost('tiket_wisata'),
			'gambar_wisata'		=> $nama_file,
			'gmaps_wisata'		=> htmlspecialchars($src_gmaps),
			'hari_buka_dari'	=> $this->request->getPost('hari_buka_dari'),
			'hari_buka_sampai'	=> $this->request->getPost('hari_buka_sampai'),
			'jam_buka_dari'		=> $this->request->getPost('jam_buka_dari'),
			'jam_buka_sampai'	=> $this->request->getPost('jam_buka_sampai'),
		];
		\Config\Services::image()->withFile($gambar_wisata)->fit(1280, 720, 'center')->save('uploads/gambarwisata/' . $nama_file);
		$model->saveWisata($data);
		session()->setFlashdata('message', 'Data berhasil ditambahkan!');
		return redirect()->to(base_url('/adminwisata'));
	}

	public function update()
	{
		if (!$this->validate([
			'gambar_wisata'		=> [
				'rules'			=> 'mime_in[gambar_wisata,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_wisata,2048]',
				'errors'		=> [
					'mime_in'	=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'	=> 'Ukuran File Maksimal 2 MB'
				]
				
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/adminwisata'));
		}
		$model 			= new Wisata_model();
		$id 			= $this->request->getPost('id_wisata');
		$gambar_wisata 	= $this->request->getFile('gambar_wisata');
		$gmaps_wisata 	= $this->request->getPost('gmaps_wisata');
		$split_gmaps 	= explode(" ",$gmaps_wisata);
		$src_gmaps 		= $split_gmaps[1];
		if($gambar_wisata->isValid() && !$gambar_wisata->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarwisata/" . $nama_file_lama)){
				unlink("uploads/gambarwisata/" . $nama_file_lama);
			}
			$nama_file = $gambar_wisata->getRandomName();
			\Config\Services::image()->withFile($gambar_wisata)->fit(1280, 720, 'center')->save('uploads/gambarwisata/' . $nama_file);
			$data = [
				'nama_wisata'		=> $this->request->getPost('nama_wisata'),
				'deskripsi_wisata'	=> $this->request->getPost('deskripsi_wisata'),
				'kategori_wisata'	=> $this->request->getPost('kategori_wisata'),
				'alamat_wisata'		=> $this->request->getPost('alamat_wisata'),
				'tiket_wisata'		=> $this->request->getPost('tiket_wisata'),
				'gambar_wisata'		=> $nama_file,
				'gmaps_wisata'		=> htmlspecialchars($src_gmaps),
				'hari_buka_dari'	=> $this->request->getPost('hari_buka_dari'),
				'hari_buka_sampai'	=> $this->request->getPost('hari_buka_sampai'),
				'jam_buka_dari'		=> $this->request->getPost('jam_buka_dari'),
				'jam_buka_sampai'	=> $this->request->getPost('jam_buka_sampai'),
			];
		}else
		{
			$data = [
				'nama_wisata'		=> $this->request->getPost('nama_wisata'),
				'deskripsi_wisata'	=> $this->request->getPost('deskripsi_wisata'),
				'kategori_wisata'	=> $this->request->getPost('kategori_wisata'),
				'alamat_wisata'		=> $this->request->getPost('alamat_wisata'),
				'tiket_wisata'		=> $this->request->getPost('tiket_wisata'),
				'gmaps_wisata'		=> htmlspecialchars($src_gmaps),
				'hari_buka_dari'	=> $this->request->getPost('hari_buka_dari'),
				'hari_buka_sampai'	=> $this->request->getPost('hari_buka_sampai'),
				'jam_buka_dari'		=> $this->request->getPost('jam_buka_dari'),
				'jam_buka_sampai'	=> $this->request->getPost('jam_buka_sampai'),
			];
		}		
		$model->updateWisata($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/adminwisata'));
	}

	public function delete()
	{
		$model 		= new Wisata_model();
		$id 		= $this->request->getPost('id_wisata');
		$nama_file 	= $this->request->getPost('gambar_wisata');
		if(file_exists("uploads/gambarwisata/" . $nama_file)){
			unlink("uploads/gambarwisata/" . $nama_file);}
			$model->deleteWisata($id);
			session()->setFlashdata('message', 'Data berhasil dihapus!');
			return redirect()->to(base_url('/adminwisata'));
		}
	}