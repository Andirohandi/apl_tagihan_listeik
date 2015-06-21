<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan extends CI_Controller {

	private $table = "pendapatan_detail";
	private $id = "NIP";
	
	public function get_db_pendapatan($data)
	{
		$this->db->where($data);
		return $this->db->get($this->table);
	}
}