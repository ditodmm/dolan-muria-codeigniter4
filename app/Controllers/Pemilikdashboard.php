<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;

class Pemilikdashboard extends Controller
{

	public function __construct()
    {
        if (session()->get('role') != 2 && session()->get('role') != 3) {
            echo view('/errors/error-403.php');
            exit;
        }
    }
	
	public function index()
	{
		$model 			= new User_model();
		$data['session']= session();
		$cekdata 		= $model->getPemilik()->getRow();
		if ($cekdata->gmaps_toko == ""){
			session()->setFlashdata('dashboard', 'Silahkan lengkapi profil toko anda di <a href="'. base_url() .'/pemilikuser">sini</a>');
		}
		echo view('/pemilik/dashboard_view', $data);
	}
}