<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pemakai extends CI_Controller {

	private $table = "pemakai";
	private $id = "NIP";
	
	public function get_db_pemakai($nip,$jml,$stts)
	{
		if($stts != null)
		{
			$this->db->where('STATUS',$stts);
		}else{
		
		}
		$this->db->like('NIP',$nip);
		$this->db->or_like('NAMA',$nip);
		$this->db->limit($jml);
		return $this->db->get($this->table);
	}
	
	function get_db_id()
	{
		return $this->db->query('SELECT * FROM pemakai ORDER BY ID DESC LIMIT 1');
	}
	
	function tambah_db_pemakai($data)
	{
		$this->db->insert($this->table,$data);
	}
}