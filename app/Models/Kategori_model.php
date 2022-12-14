<?php namespace App\Models;

use CodeIgniter\Model;

class Kategori_model extends Model
{
	public function getKategori()
	{
		$builder = $this->db->table('tb_kategori');
		return $builder->get();
	}

	public function saveKategori($data)
	{
		$query = $this->db->table('tb_kategori')->insert($data);
		return $query;
	}

	public function updateKategori($data,$id)
	{
		$query = $this->db->table('tb_kategori')->update($data, array('id_kategori' => $id));
		return $query;
	}

	public function deleteKategori($id)
	{
		$query = $this->db->table('tb_kategori')->delete(array('id_kategori' => $id));
		return $query;
	}
}