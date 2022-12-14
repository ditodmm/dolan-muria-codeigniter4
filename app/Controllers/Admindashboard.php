<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Wisata_model;
use App\Models\Toko_model;
use App\Models\Penginapan_model;
use App\Models\Transportasi_model;

class Admindashboard extends Controller
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
		$model_wisata 			= new Wisata_model();
		$model_toko				= new Toko_model();
		$model_penginapan		= new Penginapan_model();
		$model_transportasi		= new Transportasi_model();
		$data['tb_wisata']		= $model_wisata->getJumlahWisata()->getResult();
		$data['tb_toko']		= $model_toko->getJumlahToko()->getResult();
		$data['tb_penginapan']	= $model_penginapan->getJumlahPenginapan()->getResult();
		$data['tb_transportasi']= $model_transportasi->getJumlahTransportasi()->getResult();
		$data['session']		= session();
		echo view('/admin/dashboard_view', $data);
	}
}