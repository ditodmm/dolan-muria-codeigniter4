<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Transportasi_model;

class Admintransportasi extends Controller
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
		$model 						= new Transportasi_model();
		$data['tb_transportasi'] 	= $model->getTransportasi()->getResult();
		$data['session']		= session();
		echo view('/admin/transportasi_view', $data);
	}

	public function save()
	{
		if (!$this->validate([
			'gambar_transportasi'	=> [
				'rules' 			=> 'uploaded[gambar_transportasi]|mime_in[gambar_transportasi,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_transportasi,2048]',
				'errors'			=> [
					'uploaded'		=> 'Harus Ada File yang diupload',
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/admintransportasi'));
		}
		$model					= new Transportasi_model();
		$gambar_transportasi 	= $this->request->getFile('gambar_transportasi');
		$nama_file 				= $gambar_transportasi->getRandomName();
		$gmaps_transportasi 	= $this->request->getPost('gmaps_transportasi');
		$split_gmaps			= explode(" ",$gmaps_transportasi);
		$src_gmaps				= $split_gmaps[1];
		$data 					= [
			'nama_transportasi'		=> $this->request->getPost('nama_transportasi'),
			'deskripsi_transportasi'=> $this->request->getPost('deskripsi_transportasi'),
			'gambar_transportasi'	=> $nama_file,
			'alamat_transportasi'	=> $this->request->getPost('alamat_transportasi'),
			'gmaps_transportasi'	=> htmlspecialchars($src_gmaps)
		];
		\Config\Services::image()->withFile($gambar_transportasi)->fit(1280, 720, 'center')->save('uploads/gambartransportasi/' . $nama_file);
		$model->saveTransportasi($data);
		session()->setFlashdata('message', 'Data berhasil ditambahkan!');
		return redirect()->to('/admintransportasi');
	}

	public function update()
	{
		if (!$this->validate([
			'gambar_transportasi'	=> [
				'rules'				=> 'mime_in[gambar_transportasi,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_transportasi,2048]',
				'errors'			=> [
					'mime_in'		=> 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size'		=> 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])){
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('admintransportasi'));
		}	
		$model 					= new Transportasi_model();
		$id 					= $this->request->getPost('id_transportasi');
		$gambar_transportasi	= $this->request->getFile('gambar_transportasi');
		$gmaps_transportasi 	= $this->request->getPost('gmaps_transportasi');
		$split_gmaps			= explode(" ",$gmaps_transportasi);
		$src_gmaps 				= $split_gmaps[1];
		if($gambar_transportasi->isValid() && !$gambar_transportasi->hasMoved())
		{
			$nama_file_lama = $this->request->getPost('nama_gambar_lama');
			if(file_exists("uploads/gambartransportasi/" . $nama_file_lama)){
				unlink("uploads/gambartransportasi/" . $nama_file_lama);
			}
			$nama_file = $gambar_transportasi->getRandomName();
			\Config\Services::image()->withFile($gambar_transportasi)->fit(1280, 720, 'center')->save('uploads/gambartransportasi/' . $nama_file);
			$data = [
				'nama_transportasi'		=> $this->request->getPost('nama_transportasi'),
				'deskripsi_transportasi'=> $this->request->getPost('deskripsi_transportasi'),
				'gambar_transportasi'	=> $nama_file,
				'alamat_transportasi'	=> $this->request->getPost('alamat_transportasi'),
				'gmaps_transportasi'	=> htmlspecialchars($src_gmaps)				
			];
		}else
		{
			$data = [
				'nama_transportasi'		=> $this->request->getPost('nama_transportasi'),
				'deskripsi_transportasi'=> $this->request->getPost('deskripsi_transportasi'),
				'alamat_transportasi'	=> $this->request->getPost('alamat_transportasi'),
				'gmaps_transportasi'	=> htmlspecialchars($src_gmaps)				
			];
		}	
		$model->updateTransportasi($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');
		return redirect()->to('/admintransportasi');		
	}

	public function delete()
	{
		$model 		= new Transportasi_model();
		$id 		= $this->request->getPost('id_transportasi');
		$nama_file 	= $this->request->getPost('gambar_transportasi');
		if(file_exists("uploads/gambartransportasi/" . $nama_file)){
			unlink("uploads/gambartransportasi/" . $nama_file);}		
		$model->deleteTransportasi($id);
		session()->setFlashdata('message', 'Data berhasil dihapus!');		
		return redirect()->to('/admintransportasi');
	}
}