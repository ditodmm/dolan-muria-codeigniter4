<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Transportasi_model;
use App\Models\Welcome_model;

class Usertransportasi extends Controller
{
	public function index()
	{
		$model = new Transportasi_model();
		$data['tb_transportasi'] = $model->getTransportasi()->getResult();
		echo view('/user/transportasi_view', $data);
	}

	public function detail($id)
	{
		$model_transportasi = new Transportasi_model();
		$model_welcome		= new Welcome_model();
		$data['tb_transportasi'] = $model_transportasi->getDetail($id)->getRow();
		$data['tb_transportasi_rekomendasi'] = $model_welcome->getTransportasi()->getResult();
		return view('/user/transportasi_detail_view', $data);
	}
}