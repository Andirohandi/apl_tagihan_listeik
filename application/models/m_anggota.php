<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_anggota extends CI_Controller {

	private $table = "member";
	private $id = "nis";
	
	public function get_data()
	{
		return $this->db->get($this->table);
	}
	
	public function get_data_action($kode,$sts,$limit)
	{
		if($sts==null)
		{
			return $this->db->query("SELECT * FROM member WHERE (nis LIKE '%$kode%' OR nama LIKE '%$kode%') ORDER BY id DESC LIMIT $limit");
		}else
		{
			return $this->db->query("SELECT * FROM member WHERE (nis LIKE '%$kode%' OR nama LIKE '%$kode%') and status='".$sts."' ORDER BY id DESC LIMIT $limit");
		}
	}

	function tambah_anggota($data)
	{
		$this->db->insert($this->table,$data);
	}
	
	function hapus_anggota($nis)
	{
		$this->db->where($this->id,$nis);
		return $this->db->delete($this->table);
	}
}