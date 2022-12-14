<?php namespace App\Models;

use CodeIgniter\Model;

class Toko_model extends Model
{
	public function getToko()
	{
		$builder = $this->db->table('tb_toko');
		$builder->select('*');
		$builder->join('tb_user','id_user = id_user_pemilik_toko','left');
		return $builder->get();
	}

	public function getJumlahToko()
	{
		$builder = $this->db->table('tb_toko');
		$builder->select('count(*) as jumlah');
		return $builder->get();
	}

	public function saveToko()
	{
		$query = $this->db->table('tb_toko')->insert($data);
		return $query;
	}

	public function updateToko($data,$id)
	{
		$query = $this->db->table('tb_toko')->update($data, array('id_toko' => $id));
		return $query;
	}

	public function updatePemilik($data,$nik)
	{
		$query = $this->db->table('tb_toko')->update($data, array('nik_pemilik_toko' => $nik));
		return $query;
	}

	public function deleteToko($id_toko)
	{
		$query = $this->db->table('tb_toko')->delete(array('id_toko' => $id_toko));
		return $query;
	}
}