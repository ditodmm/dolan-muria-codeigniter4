<?php namespace App\Models;

use CodeIgniter\Model;

class Welcome_model extends Model
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
		$builder->orderBy('rand()');
		$builder->limit(3);
		return $builder->get();
	}

	public function getKuliner()
	{
		$builder = $this->db->table('tb_kuliner');
		$builder->select('*');
		$builder->join('tb_toko','id_user_pemilik_toko = toko_kuliner','left');
		$builder->orderBy('rand()');
		$builder->limit(3);
		return $builder->get();
	}

	public function getToko()
	{
		$builder = $this->db->table('tb_toko');
		return $builder->get();
	}

	public function getProduk()
	{
		$builder = $this->db->table('tb_produk');
		$builder->select('*');
		$builder->join('tb_toko','id_user_pemilik_toko = toko_produk','left');		
		$builder->orderBy('rand()');
		$builder->limit(3);
		return $builder->get();		
	}

	public function getPenginapan()
	{
		$builder = $this->db->table('tb_penginapan');
		$builder->select('*');
		$builder->orderBy('rand()');
		$builder->limit(3);
		return $builder->get();		
	}

	public function getTransportasi()
	{
		$builder = $this->db->table('tb_transportasi');
		$builder->select('*');
		$builder->orderBy('rand()');
		$builder->limit(3);
		return $builder->get();		
	}
}
