<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;

class Adminuser extends Controller
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
		$model 				= new User_model();
		$data['tb_user'] 	= $model->getUser()->getResult();
		$data['session']	= session();
		echo view('admin/user_view', $data);
	}

	public function save()
	{	
		// validasi
		if (!$this->validate([
			'username' 			=> [
				'rules'			=> 'min_length[3]|max_length[50]|is_unique[tb_user.username]',
				'errors'		=> [
					'is_unique'	=> 'Username sudah digunakan!',
					'min_length'=> 'Username minimal 3 karakter!',
					'max_length'=> 'Username tidak boleh lebih dari 50 karakter!',
				]				
			],
			'password' 			=> [
				'rules'			=> 'min_length[6]|max_length[200]',
				'errors'		=> [
					'min_length'=> 'Password minimal 6 karakter!',
					'max_length'=> 'Password tidak boleh lebih dari 200 karakter!',
				]
			],
			'konfirmasipassword'=> [
				'rules'			=> 'matches[password]',
				'errors'		=> [
					'matches'	=> 'Password tidak sesuai!',
				]
			],			
		])){
			// notifikasi jika ada error
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/adminuser'));
		}
		$model 	= new User_model();
		$data_user 	= [
			'username'	=> $this->request->getPost('username'),
			'password'	=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			'role'		=> $this->request->getPost('role'),
			'status'	=> 1,
		];
		$model->saveUser($data_user);
		session()->setFlashdata('message', 'Data berhasil ditambahkan!');		
		return redirect()->to(base_url('/adminuser'));
	}

	public function updatedata()
	{
		$model 	= new User_model();
		$id 	= $this->request->getPost('id_user');
		$data 	= [
			'role'		=> $this->request->getPost('role'),
			'status'	=> $this->request->getPost('status')
		];
		$model->updateUser($data,$id);
		session()->setFlashdata('message', 'Data berhasil diubah!');		
		return redirect()->to(base_url('/adminuser'));
	}

	public function updatepassword()
	{
		if (!$this->validate([
			'password_baru' 		=> [
				'rules'				=> 'min_length[6]|max_length[200]',
				'errors'			=> [
					'min_length'	=> 'Password minimal 6 karakter!',
					'max_length'	=> 'Password tidak boleh lebih dari 200 karakter!',
				]
			],
			'konfirmasi_password'	=> [
				'rules'				=> 'matches[password_baru]',
				'errors'			=> [
					'matches'		=> 'Password tidak sesuai!',
				]
			],			
		])){
			// notifikasi jika ada error
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to(base_url('/adminuser'));
		}
		$model 				= new User_model();
		$id					= $this->request->getPost('id_user');
		$password_lama 		= $this->request->getPost('password_lama');
		$konf_password_lama = $this->request->getPost('konfpasswordlama');
		if(password_verify($password_lama, $konf_password_lama)){
			$data 	= [
				'password'	=> password_hash($this->request->getPost('password_baru'), PASSWORD_DEFAULT),
			];
			$model->updateUser($data,$id);
			session()->setFlashdata('message', 'Password berhasil diubah!');		
			return redirect()->to(base_url('/adminuser'));
		}
		else{
			session()->setFlashdata('error', 'Password lama tidak sesuai!');
			return redirect()->to(base_url('/adminuser'));
		}

	}

	public function delete()
	{
		$model 		= new User_model();
		$id_user 	= $this->request->getPost('id_user');
		$model->deleteUser($id_user);
		session()->setFlashdata('message', 'Data berhasil dihapus!');		
		return redirect()->to(base_url('adminuser'));
	}
}