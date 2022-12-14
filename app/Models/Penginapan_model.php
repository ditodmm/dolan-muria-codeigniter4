<?php namespace App\Models;

use CodeIgniter\Model;

class Penginapan_model extends Model
{
	public function getPenginapan()
	{
		$builder = $this->db->table('tb_penginapan');
		return $builder->get();
	}

	public function getJumlahPenginapan()
	{
		$builder = $this->db->table('tb_penginapan');
		$builder->select('count(*) as jumlah');
		return $builder->get();
	}

	public function getDetail($id)
	{
		$builder = $this->db->table('tb_penginapan');
		$builder->select('*');
		$builder->where(array('id_penginapan' => $id));
		return $builder->get();
	}

	public function savePenginapan($data)
	{
		$query = $this->db->table('tb_penginapan')->insert($data);
		return $query;
	}

	public function updatePenginapan($data,$id)
	{
		$query = $this->db->table('tb_penginapan')->update($data, array('id_penginapan' => $id));
		return $query;
	}

	public function deletePenginapan($id)
	{
		$query = $this->db->table('tb_penginapan')->delete(array('id_penginapan' => $id));
		return $query;
	}
}