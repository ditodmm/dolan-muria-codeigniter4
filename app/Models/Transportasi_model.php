<?php namespace App\Models;

use CodeIgniter\Model;

class Transportasi_model extends Model
{
	public function getTransportasi()
	{
		$builder = $this->db->table('tb_transportasi');
		return $builder->get();
	}

	public function getJumlahTransportasi()
	{
		$builder = $this->db->table('tb_transportasi');
		$builder->select('count(*) as jumlah');
		return $builder->get();
	}

	public function getDetail($id)
	{
		$builder = $this->db->table('tb_transportasi');
		$builder->select('*');
		$builder->where(array('id_transportasi' => $id));
		return $builder->get();
	}

	public function saveTransportasi($data)
	{
		$query = $this->db->table('tb_transportasi')->insert($data);
		return $query;
	}

	public function updateTransportasi($data,$id)
	{
		$query = $this->db->table('tb_transportasi')->update($data, array('id_transportasi' => $id));
		return $query;
	}

	public function deleteTransportasi($id)
	{
		$query = $this->db->table('tb_transportasi')->delete(array('id_transportasi' => $id));
		return $query;
	}
}