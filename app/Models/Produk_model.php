<?php namespace App\Models;

use CodeIgniter\Model;

class Produk_model extends Model
{
	public function getToko()
	{
		$builder = $this->db->table('tb_toko');
		return $builder->get();
	}

	public function getTokoOlehOleh()
	{
		$builder = $this->db->table('tb_toko');
		$builder->select('*');
		$builder->join('tb_user','id_user = id_user_pemilik_toko','left');
		$builder->where('role = 2');
		return $builder->get();
	}

	public function getProduk()
	{
		$builder = $this->db->table('tb_produk');
		$builder->select('*');
		$builder->join('tb_toko','id_user_pemilik_toko = toko_produk','left');
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

	public function getProdukPemilik()
	{	
		$id = session()->get('id_user');
		$builder = $this->db->table('tb_produk');
		$builder->select('*');
		$builder->where(['toko_produk' => $id]);
		$builder->join('tb_toko','id_toko = toko_produk','left');
		return $builder->get();
	}

	public function getDetail($id)
	{
		$builder = $this->db->table('tb_produk');
		$builder->select('*');
		$builder->where(array('id_produk' => $id));
		$builder->join('tb_toko','id_user_pemilik_toko = toko_produk','left');
		return $builder->get();
	}

	public function getlistProduk($id)
	{
		$builder = $this->db->table('tb_produk');
		$builder->select('*');
		$builder->where(array('toko_produk' => $id));
		$builder->join('tb_toko','id_user_pemilik_toko = toko_produk','left');
		return $builder->get();
	}

	public function saveProduk($data)
	{
		$query = $this->db->table('tb_produk')->insert($data);
		return $query;
	}

	public function updateProduk($data,$id)
	{
		$query = $this->db->table('tb_produk')->update($data, array('id_produk' => $id));
		return $query;
	}

	public function deleteProduk($id)
	{
		$query = $this->db->table('tb_produk')->delete(array('id_produk' => $id));
		return $query;
	}
}