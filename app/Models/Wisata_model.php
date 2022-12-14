<?php namespace App\Models;

use CodeIgniter\Model;

class Wisata_model extends Model
{
	public function getKategori()
	{
		$builder = $this->db->table('tb_kategori');
		return $builder->get();
	}

	public function getWisata()
	{
		$builder = $this->db->table('tb_wisata');
		$builder->select('*');
		$builder->join('tb_kategori','id_kategori = kategori_wisata','left');
		return $builder->get();
	}

	public function getDetail($id)
	{
		$builder = $this->db->table('tb_wisata');
		$builder->select('*');
		$builder->where(array('id_wisata' => $id));
		$builder->join('tb_kategori','id_kategori = kategori_wisata','left');
		return $builder->get();
	}

	public function getJumlahWisata()
	{
		$builder = $this->db->table('tb_wisata');
		$builder->select('count(*) as jumlah');
		return $builder->get();
	}

	public function saveWisata($data)
	{
		$query = $this->db->table('tb_wisata')->insert($data);
		return $query;
	}

	public function updateWisata($data,$id)
	{
		$query = $this->db->table('tb_wisata')->update($data, array('id_wisata' => $id));
		return $query;
	}

	public function deleteWisata($id)
	{
		$query = $this->db->table('tb_wisata')->delete(array('id_wisata' => $id));
		return $query;
	}
}