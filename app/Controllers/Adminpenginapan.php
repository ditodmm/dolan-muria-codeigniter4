<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Penginapan_model;

class Adminpenginapan extends Controller
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
		$model 					= new penginapan_model();
		$data['tb_penginapan'] 	= $model->getPenginapan()->getResult();
		$data['session']		= session();
		echo view('/admin/penginapan_view', $data);
	}

	public function save()
	{
		if (!$this->validate([
			'gambar_sampul_penginapan'	=> [
				'rules' 				=> 'uploaded[gambar_sampul_penginapan]|mime_in[gambar_sampul_penginapan,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_sampul_penginapan,2048]',
				'errors'				=> [
					'uploaded'			=> 'Harus Ada File yang diupload',
					'mime_in'			=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'			=> 'Ukuran File Maksimal 2 MB'
				]
			],'gambar_penginapan_1' 	=> [
				'rules'					=> 'uploaded[gambar_penginapan_1]|mime_in[gambar_penginapan_1,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_penginapan_1,2048]',
				'errors'				=> [
					'uploaded'			=> 'Harus Ada File yang diupload',
					'mime_in'			=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'			=> 'Ukuran File Maksimal 2 MB'
				]
			],
			'gambar_penginapan_2' 		=> [
				'rules'					=> 'uploaded[gambar_penginapan_2]|mime_in[gambar_penginapan_2,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_penginapan_2,2048]',
				'errors'				=> [
					'uploaded'			=> 'Harus Ada File yang diupload',
					'mime_in'			=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'			=> 'Ukuran File Maksimal 2 MB'
				]
			],
			'nama_penginapan' 			=> [
				'rules'					=> 'is_unique[tb_penginapan.nama_penginapan]',
				'errors'				=> [
					'is_unique'			=> 'Penginapan sudah terdaftar!',
				]
			],			
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/adminpenginapan'));
		}
		$model						= new penginapan_model();
		$gambar_sampul_penginapan 	= $this->request->getFile('gambar_sampul_penginapan');
		$gambar_penginapan_1	 	= $this->request->getFile('gambar_penginapan_1');
		$gambar_penginapan_2	 	= $this->request->getFile('gambar_penginapan_2');
		$nama_file_sampul			= $gambar_sampul_penginapan->getRandomName();
		$nama_file_1				= $gambar_penginapan_1->getRandomName();
		$nama_file_2				= $gambar_penginapan_2->getRandomName();
		$gmaps_penginapan 			= $this->request->getPost('gmaps_penginapan');
		$split_gmaps				= explode(" ",$gmaps_penginapan);
		$src_gmaps					= $split_gmaps[1];
		$data 						= [
			'nama_penginapan'			=> $this->request->getPost('nama_penginapan'),
			'deskripsi_penginapan'		=> $this->request->getPost('deskripsi_penginapan'),
			'gambar_sampul_penginapan'	=> $nama_file_sampul,
			'gambar_penginapan_1'		=> $nama_file_1,
			'gambar_penginapan_2'		=> $nama_file_2,
			'alamat_penginapan'			=> $this->request->getPost('alamat_penginapan'),
			'no_telepon'				=> $this->request->getPost('no_telepon'),
			'gmaps_penginapan'			=> htmlspecialchars($src_gmaps)
		];
		\Config\Services::image()->withFile($gambar_sampul_penginapan)->fit(1280, 720, 'center')->save('uploads/gambarpenginapan/' . $nama_file_sampul);
		\Config\Services::image()->withFile($gambar_penginapan_1)->fit(1280, 720, 'center')->save('uploads/gambarpenginapan/' . $nama_file_1);
		\Config\Services::image()->withFile($gambar_penginapan_2)->fit(1280, 720, 'center')->save('uploads/gambarpenginapan/' . $nama_file_2);
		$model->savepenginapan($data);
		session()->setFlashdata('message', 'Data berhasil ditambahkan!');
		return redirect()->to(base_url('/adminpenginapan'));
	}

	public function update()
	{	
		$model 				= new penginapan_model();
		$id 				= $this->request->getPost('id_penginapan');
		$gmaps_penginapan 	= $this->request->getPost('gmaps_penginapan');
		$split_gmaps		= explode(" ",$gmaps_penginapan);
		$src_gmaps 			= $split_gmaps[1];
		$data = [
				'nama_penginapan'		=> $this->request->getPost('nama_penginapan'),
				'deskripsi_penginapan'	=> $this->request->getPost('deskripsi_penginapan'),
				'alamat_penginapan'		=> $this->request->getPost('alamat_penginapan'),
				'no_telepon'			=> $this->request->getPost('no_telepon'),
				'gmaps_penginapan'		=> htmlspecialchars($src_gmaps)				
		];
		$model->updatePenginapan($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');
		return redirect()->to(base_url('/adminpenginapan'));		
	}

	public function updategambarsampul()
	{
		if (!$this->validate([
			'gambar_sampul_penginapan'	=> [
				'rules'				=> 'mime_in[gambar_sampul_penginapan,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_sampul_penginapan,2048]',
				'errors'			=> [
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/adminpenginapan'));
		}
		$model 						= new Penginapan_model();
		$id 						= $this->request->getPost('id_penginapan');
		$gambar_sampul_penginapan 	= $this->request->getFile('gambar_sampul_penginapan');
		if($gambar_sampul_penginapan->isValid() && !$gambar_sampul_penginapan->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarpenginapan/" . $nama_file_lama)){
				unlink("uploads/gambarpenginapan/" . $nama_file_lama);
			}
			$nama_file = $gambar_sampul_penginapan->getRandomName();
			\Config\Services::image()->withFile($gambar_sampul_penginapan)->fit(1280, 720, 'center')->save('uploads/gambarpenginapan/' . $nama_file);
			$data = [
				'gambar_sampul_penginapan'	=> $nama_file			
			];
		}		
		$model->updatePenginapan($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/adminpenginapan'));
	}

	public function updategambar1()
	{
		if (!$this->validate([
			'gambar_penginapan_1'	=> [
				'rules'				=> 'mime_in[gambar_penginapan_1,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_penginapan_1,2048]',
				'errors'			=> [
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/adminpenginapan'));
		}
		$model 			= new penginapan_model();
		$id 			= $this->request->getPost('id_penginapan');
		$gambar_penginapan_1 	= $this->request->getFile('gambar_penginapan_1');
		if($gambar_penginapan_1->isValid() && !$gambar_penginapan_1->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarpenginapan/" . $nama_file_lama)){
				unlink("uploads/gambarpenginapan/" . $nama_file_lama);
			}
			$nama_file = $gambar_penginapan_1->getRandomName();
			\Config\Services::image()->withFile($gambar_penginapan_1)->fit(1280, 720, 'center')->save('uploads/gambarpenginapan/' . $nama_file);
			$data = [
				'gambar_penginapan_1'	=> $nama_file			
			];
		}		
		$model->updatePenginapan($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/adminpenginapan'));
	}

	public function updategambar2()
	{
		if (!$this->validate([
			'gambar_penginapan_2'	=> [
				'rules'				=> 'mime_in[gambar_penginapan_2,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_penginapan_2,2048]',
				'errors'			=> [
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/adminpenginapan'));
		}
		$model 			 = new penginapan_model();
		$id 			 = $this->request->getPost('id_penginapan');
		$gambar_penginapan_2 = $this->request->getFile('gambar_penginapan_2');
		if($gambar_penginapan_2->isValid() && !$gambar_penginapan_2->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambarpenginapan/" . $nama_file_lama)){
				unlink("uploads/gambarpenginapan/" . $nama_file_lama);
			}
			$nama_file = $gambar_penginapan_2->getRandomName();
			\Config\Services::image()->withFile($gambar_penginapan_2)->fit(1280, 720, 'center')->save('uploads/gambarpenginapan/' . $nama_file);
			$data = [
				'gambar_penginapan_2'	=> $nama_file			
			];
		}		
		$model->updatePenginapan($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/adminpenginapan'));
	}

	public function delete()
	{
		$model 						= new Penginapan_model();
		$id 						= $this->request->getPost('id_penginapan');
		$gambar_sampul_penginapan	= $this->request->getPost('gambar_sampul_penginapan');
		$gambar_penginapan_1 		= $this->request->getPost('gambar_penginapan_1');
		$gambar_penginapan_2 		= $this->request->getPost('gambar_penginapan_2');
		if(file_exists("uploads/gambarpenginapan/" . $gambar_sampul_penginapan)){
			unlink("uploads/gambarpenginapan/" . $gambar_sampul_penginapan);}
		if(file_exists("uploads/gambarpenginapan/" . $gambar_penginapan_1)){
			unlink("uploads/gambarpenginapan/" . $gambar_penginapan_1);}
		if(file_exists("uploads/gambarpenginapan/" . $gambar_penginapan_2)){
			unlink("uploads/gambarpenginapan/" . $gambar_penginapan_2);}		
		$model->deletepenginapan($id);
		session()->setFlashdata('message', 'Data berhasil dihapus!');		
		return redirect()->to('/adminpenginapan');
	}
}