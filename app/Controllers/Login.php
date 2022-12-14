<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;

class Login extends Controller
{
	public function index()
	{
		helper(['form']);
		echo view('login_view');
	}

	public function auth()
	{
		$session			= session();
		$model 				= new User_model();
		$username			= $this->request->getPost('username');
		$password			= $this->request->getPost('password');
		$data				= $model->where('username',$username)->first();
		if($data){
			$pass 			= $data['password'];
			$verify_pass	= password_verify($password,$pass);
			if($verify_pass){
				$ses_data	= [
					'id_user'	=> $data['id_user'],
					'username'	=> $data['username'],
					'status'	=> $data['status'],
					'role'		=> $data['role'],
					'logged_in'	=> TRUE
				];
				$session->set($ses_data);
				if($ses_data['role'] == 1){
					return redirect()->to(base_url('/admindashboard'));
				}else{
					return redirect()->to(base_url('/pemilikdashboard'));
				}
			}else{
				$session->setFlashdata('errors', 'Password Salah!');
				return redirect()->to(base_url('/login'));
			}
		}else{
			$session->setFlashdata('errors', 'Username Salah!');
			return redirect()->to(base_url('/login'));
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/login'));
	}
}