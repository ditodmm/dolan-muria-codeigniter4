<?php namespace App\Models;

use CodeIgniter\Model;

class Gambar_model extends Model
{
	public function getWisata()
	{
		$builder = $this->db->table('tb_wisata');
		return $builder->get();
	}

	public function getGambar()
	{
		$builder = $this->db->table('tb_gambar_wisata');
		$builder->select('*');
		$builder->join('tb_wisata','id_wisata = id_nama_wisata','left');
		$builder->orderBy('id_nama_wisata');
		return $builder->get();
	}

	public function getGambarDetail($id)
	{
		$builder = $this->db->table('tb_gambar_wisata');
		$builder->select('*');
		$builder->where(['id_nama_wisata' => $id]);
		return $builder->get();
	}
	
	public function saveGambar($data)
	{
		$query = $this->db->table('tb_gambar_wisata')->insert($data);
		return $query;
	}

	public function updateGambar($data,$id)
	{
		$query = $this->db->table('tb_gambar_wisata')->update($data, array('id_gambar_wisata' => $id));
		return $query;
	}

	public function deleteGambar($id)
	{
		$query = $this->db->table('tb_gambar_wisata')->delete(array('id_gambar_wisata' => $id));
		return $query;
	}
}