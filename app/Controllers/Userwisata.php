<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Wisata_model;
use App\Models\Gambar_model;
use App\Models\Welcome_model;

class Userwisata extends Controller
{
	public function index()
	{
		$model = new Wisata_model();
		$data['tb_wisata'] = $model->getWisata()->getResult();
		$data['tb_kategori'] = $model->getKategori()->getResult();
		echo view('/user/wisata_view', $data);
	}

	public function detail($id)
	{
		$model_wisata = new Wisata_model();
		$model_gambar = new Gambar_model();
		$model_welcome= new Welcome_model();
		$data['tb_wisata'] = $model_wisata->getDetail($id)->getRow();
		$data['tb_gambar_wisata'] = $model_gambar->getGambarDetail($id)->getResult();
		$data['tb_wisata_rekomendasi'] = $model_welcome->getWisata()->getResult();
		return view('/user/wisata_detail_view', $data);
	}
}