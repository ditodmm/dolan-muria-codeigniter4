<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Produk_model;
use App\Models\Welcome_model;

class Userproduk extends Controller
{
	public function index()
	{
		$model = new Produk_model();
		$data['tb_produk'] = $model->getProduk()->getResult();
		$data['tb_toko'] = $model->getTokoOlehOleh()->getResult();
		echo view('/user/toko_view', $data);
	}

	public function listproduk($id)
	{
		$model = new Produk_model();
		$data['tb_produk'] = $model->getListProduk($id)->getResult();
		$data['tb_toko'] = $model->getTokoOlehOleh($id)->getRow();
		echo view('/user/produk_view', $data);
	}

	public function detail($id)
	{
		$model_produk = new Produk_model();
		$model_welcome= new Welcome_model();
		$data['tb_produk'] = $model_produk->getDetail($id)->getRow();
		$data['tb_produk_rekomendasi'] = $model_welcome->getProduk()->getResult();
		return view('/user/produk_detail_view', $data);
	}
}