<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Welcome_model;

class Userwelcome extends Controller
{
	public function index()
	{
		$model 					= new Welcome_model();
		$data['tb_wisata'] 		= $model->getWisata()->getResult();
		$data['tb_kategori'] 	= $model->getKategori()->getResult();
		$data['tb_kuliner']		= $model->getKuliner()->getResult();
		$data['tb_produk']		= $model->getProduk()->getResult();
		$data['tb_toko']		= $model->getToko()->getResult();
		$data['tb_penginapan']	= $model->getPenginapan()->getResult();
		$data['tb_transportasi']= $model->getTransportasi()->getResult();
		echo view('/user/welcome_view', $data);
	}
}