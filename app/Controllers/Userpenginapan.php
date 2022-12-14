<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Penginapan_model;
use App\Models\Welcome_model;

class Userpenginapan extends Controller
{
	public function index()
	{
		$model = new Penginapan_model();
		$data['tb_penginapan'] = $model->getpenginapan()->getResult();
		echo view('/user/penginapan_view', $data);
	}

	public function detail($id)
	{
		$model_penginapan = new Penginapan_model();
		$model_welcome= new Welcome_model();
		$data['tb_penginapan'] = $model_penginapan->getDetail($id)->getRow();
		$data['tb_penginapan_rekomendasi'] = $model_welcome->getPenginapan()->getResult();
		return view('/user/penginapan_detail_view', $data);
	}
}