<?php namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
	protected $table = 'tb_user';
	protected $allowedFields = ['id_user','username','password','role'];

	public function getUser()
	{
		$builder = $this->db->table('tb_user');
		return $builder->get();
	}

	public function getToko()
	{
		$builder = $this->db->table('tb_toko');
		return $builder->get();
	}

	public function getPemilik()
	{
		$id = session()->get('id_user');
		$builder = $this->db->table('tb_user');
		$builder->select('*');
		$builder->where(['id_user' => $id]);
		$builder->join('tb_toko','id_user_pemilik_toko = id_user','left');
		return $builder->get();
	}

	public function getKodeUser($id){

		$query = $this->db->table('tb_user');
		$query->select('*');
		$query->where(['id_user' => $id]);
		return $query->get();
	}

	public function saveUser($data_user)
	{
		$query = $this->db->table('tb_user')->insert($data_user);
		return $query;
	}

	public function saveToko($data_toko)
	{
		$query = $this->db->table('tb_toko')->insert($data_toko);
		return $query;
	}

	public function verifikasiAkun($data, $id)
	{
		$query = $this->db->table('tb_user')->update($data, array('id_user' => $id));
		return $query;
	}

	public function updateUser($data,$id)
	{
		$query = $this->db->table('tb_user')->update($data, array('id_user' => $id));
		return $query;
	}

	public function deleteUser($id_user)
	{
		$query = $this->db->table('tb_user')->delete(array('id_user' => $id_user));
		return $query;		
	}
}