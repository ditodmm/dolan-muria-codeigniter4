<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Toko_model;
use App\Models\User_model;

class Admintoko extends Controller
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
		$model = new Toko_model();
		$data['tb_toko'] = $model->getToko()->getResult();
		$data['session'] = session();
		echo view('/admin/toko_view', $data);
	}

	public function update()
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
			return redirect()->to(base_url('/admintoko'));
		}
		$model 			= new Toko_model();
		$id 			= $this->request->getPost('id_toko');
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
				'nik_pemilik_toko'	=> $this->request->getPost('nik_pemilik_toko'),
				'nama_pemilik_toko'	=> $this->request->getPost('nama_pemilik_toko'),
				'nama_toko'			=> $this->request->getPost('nama_toko'),
				'email_toko'		=> $this->request->getPost('email_toko'),
				'alamat_toko'		=> $this->request->getPost('alamat_toko'),
				'no_telepon'		=> $this->request->getPost('no_telepon'),			
				'gambar_toko'		=> $nama_file,
				'gmaps_toko'		=> htmlspecialchars($src_gmaps),
				'hari_buka_dari'	=> $this->request->getPost('hari_buka_dari'),
				'hari_buka_sampai'	=> $this->request->getPost('hari_buka_sampai'),
				'jam_buka_dari'		=> $this->request->getPost('jam_buka_dari'),
				'jam_buka_sampai'	=> $this->request->getPost('jam_buka_sampai'),		
			];
		}else
		{
			$data = [
				'nik_pemilik_toko'	=> $this->request->getPost('nik_pemilik_toko'),
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
		$model->updateToko($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/admintoko'));
	}

	public function delete()
	{
		$model_toko = new Toko_model();
		$model_user = new User_model();
		$id_toko = $this->request->getPost('id_toko');
		$id_user = $this->request->getPost('id_user');
		$model_toko->deleteToko($id_toko);
		$model_user->deleteUser($id_user);
		return redirect()->to('/admintoko');
	}
}