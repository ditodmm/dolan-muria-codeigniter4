<?php namespace App\Models;

use CodeIgniter\Model;

class Kuliner_model extends Model
{
	public function getToko()
	{
		$builder = $this->db->table('tb_toko');
		return $builder->get();
	}

	public function getWarungMakan()
	{
		$builder = $this->db->table('tb_toko');
		$builder->select('*');
		$builder->join('tb_user','id_user = id_user_pemilik_toko','left');
		$builder->where('role = 3');
		return $builder->get();
	}

	public function getKuliner()
	{
		$builder = $this->db->table('tb_kuliner');
		$builder->select('*');
		$builder->join('tb_toko','id_user_pemilik_toko = toko_kuliner','left');
		return $builder->get();
	}

	public function getTokoPemilik()
	{
		$id = session()->get('id_user');
		$builder = $this->db->table('tb_toko');
		$builder->select('*');
		$builder->where(['id_user_pemilik_toko' => $id]);
		$builder->join('tb_user','id_user = id_user_pemilik_toko','left');
		return $builder->get();
	}

	public function getKulinerPemilik()
	{	
		$id = session()->get('id_user');
		$builder = $this->db->table('tb_kuliner');
		$builder->select('*');
		$builder->where(['toko_kuliner' => $id]);
		$builder->join('tb_toko','id_toko = toko_kuliner','left');
		return $builder->get();
	}

	public function getDetail($id)
	{
		$builder = $this->db->table('tb_kuliner');
		$builder->select('*');
		$builder->where(array('id_kuliner' => $id));
		$builder->join('tb_toko','id_user_pemilik_toko = toko_kuliner','left');
		return $builder->get();
	}

	public function getlistKuliner($id)
	{
		$builder = $this->db->table('tb_kuliner');
		$builder->select('*');
		$builder->where(array('toko_kuliner' => $id));
		$builder->join('tb_toko','id_user_pemilik_toko = toko_kuliner','left');
		return $builder->get();
	}

	public function saveKuliner($data)
	{
		$query = $this->db->table('tb_kuliner')->insert($data);
		return $query;
	}

	public function updateKuliner($data,$id)
	{
		$query = $this->db->table('tb_kuliner')->update($data, array('id_kuliner' => $id));
		return $query;
	}

	public function deleteKuliner($id)
	{
		$query = $this->db->table('tb_kuliner')->delete(array('id_kuliner' => $id));
		return $query;
	}
}