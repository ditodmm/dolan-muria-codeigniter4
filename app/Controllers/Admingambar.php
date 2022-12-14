<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Gambar_model;

class Admingambar extends Controller
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
		$model = new Gambar_model();
		$data['tb_wisata'] = $model->getWisata()->getResult();
		$data['tb_gambar_wisata'] = $model->getGambar()->getResult();
		$data['session']		= session();
		echo view('/admin/gambar_wisata_view', $data);
	}

	public function save()
	{
		if (!$this->validate([
			'nama_gambar_wisata'	=> [
				'rules' 			=> 'uploaded[nama_gambar_wisata]|mime_in[nama_gambar_wisata,image/jpg,image/jpeg,image/png]|max_size[nama_gambar_wisata,2048]',
				'errors'			=> [
					'uploaded'		=> 'Harus Ada File yang diupload',
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/admingambar'));
		}
		$model				= new Gambar_model();
		$nama_gambar_wisata = $this->request->getFile('nama_gambar_wisata');
		$nama_file 			= $nama_gambar_wisata->getRandomName();
		$data 				= [
			'id_nama_wisata'			=> $this->request->getPost('id_nama_wisata'),
			'deskripsi_gambar_wisata'	=> $this->request->getPost('deskripsi_gambar_wisata'),
			'nama_gambar_wisata'		=> $nama_file,
			'sumber_gambar_wisata'		=> $this->request->getPost('sumber_gambar_wisata')
		];
		\Config\Services::image()->withFile($nama_gambar_wisata)->fit(1280, 720, 'center')->save('uploads/gambarwisata/' . $nama_file);
		$model->saveGambar($data);
		session()->setFlashdata('message', 'Gambar berhasil ditambahkan!');
		return redirect()->to(base_url('/admingambar'));
	}

	public function update()
	{
		if (!$this->validate([
			'nama_gambar_wisata'=> [
				'rules'			=> 'mime_in[nama_gambar_wisata,image/jpg,image/jpeg,image/gif,image/png]|max_size[nama_gambar_wisata,2048]',
				'errors'		=> [
					'mime_in'	=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'	=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('admingambar'));
		}	
		$model 				= new Gambar_model();
		$id 				= $this->request->getPost('id_penginapan');
		$nama_gambar_wisata	= $this->request->getFile('nama_gambar_wisata');
		if($nama_gambar_wisata->isValid() && !$nama_gambar_wisata->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarwisata/" . $nama_file_lama)){
				unlink("uploads/gambarwisata/" . $nama_file_lama);
			}
			$nama_file = $nama_gambar_wisata->getRandomName();
			\Config\Services::image()->withFile($nama_gambar_wisata)->fit(1280, 720, 'center')->save('uploads/gambarwisata/' . $nama_file);
			$data 	= [
				'id_nama_wisata'			=> $this->request->getPost('id_nama_wisata'),
				'deskripsi_gambar_wisata'	=> $this->request->getPost('deskripsi_gambar_wisata'),
				'nama_gambar_wisata'		=> $nama_file,
				'sumber_gambar_wisata'		=> $this->request->getPost('sumber_gambar_wisata')
			];
		}else
		{
			$data = [
				'id_nama_wisata'			=> $this->request->getPost('id_nama_wisata'),
				'deskripsi_gambar_wisata'	=> $this->request->getPost('deskripsi_gambar_wisata'),
				'sumber_gambar_wisata'		=> $this->request->getPost('sumber_gambar_wisata')			
			];
		}	
		$model->updateGambar($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');
		return redirect()->to(base_url('/admingambar'));		
	}

	public function delete()
	{
		$model 		= new Gambar_model();
		$id 		= $this->request->getPost('id_gambar_wisata');
		$nama_file 	= $this->request->getPost('nama_gambar_wisata');
		if(file_exists("uploads/gambarwisata/" . $nama_file)){
			unlink("uploads/gambarwisata/" . $nama_file);}		
		$model->deleteGambar($id);
		session()->setFlashdata('message', 'Data berhasil dihapus!');		
		return redirect()->to(base_url('/admingambar'));
	}	
}