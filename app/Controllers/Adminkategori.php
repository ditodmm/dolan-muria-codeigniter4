<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Kategori_model;

class Adminkategori extends Controller
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
		$model 					= new Kategori_model();
		$data['tb_kategori'] 	= $model->getKategori()->getResult();
		$data['session']		= session();
		echo view('/admin/kategori_view', $data);
	}

	public function save()
	{
		// validasi duplicate
		if (!$this->validate([
			'nama_kategori' 		=> [
				'rules'			=> 'is_unique[tb_kategori.nama_kategori]',
				'errors'		=> [
					'is_unique'	=> 'Kategori sudah terdaftar!',
				]
			],
		])){
			// notifikasi jika ada error
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/adminkategori'));
		}
		$model 	= new Kategori_model();
		$data 	= [
			'nama_kategori' => $this->request->getPost('nama_kategori')
		];
		$model->saveKategori($data);
		session()->setFlashdata('message', 'Data berhasil ditambahkan!');		
		return redirect()->to(base_url('/adminkategori'));
	}

	public function update()
	{
		$model 	= new Kategori_model();
		$id 	= $this->request->getPost('id_kategori');
		$data 	= [
			'nama_kategori' => $this->request->getPost('nama_kategori')
		];
		$model->updateKategori($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');
		return redirect()->to(base_url('/adminkategori'));		
	}

	public function delete()
	{
		$model 	= new Kategori_model();
		$id 	= $this->request->getPost('id_kategori');
		$model->deleteKategori($id);
		session()->setFlashdata('message', 'Data berhasil dihapus!');		
		return redirect()->to(base_url('/adminkategori'));
	}
}