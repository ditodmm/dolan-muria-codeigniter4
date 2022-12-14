<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Kuliner_model;
use App\Models\Welcome_model;

class Userkuliner extends Controller
{
	public function index()
	{
		$model = new Kuliner_model();
		$data['tb_kuliner'] = $model->getKuliner()->getResult();
		$data['tb_toko'] = $model->getWarungMakan()->getResult();
		echo view('/user/warung_view', $data);
	}

	public function listkuliner($id)
	{
		$model = new Kuliner_model();
		$data['tb_kuliner'] = $model->getlistKuliner($id)->getResult();
		$data['tb_toko'] = $model->getWarungMakan($id)->getRow();
		echo view('/user/kuliner_view', $data);
	}

	public function detail($id)
	{
		$model_kuliner 	= new Kuliner_model();
		$model_welcome	= new Welcome_model();
		$data['tb_kuliner'] = $model_kuliner->getDetail($id)->getRow();
		$data['tb_kuliner_rekomendasi'] = $model_welcome->getKuliner()->getResult();
		return view('/user/kuliner_detail_view', $data);
	}
}