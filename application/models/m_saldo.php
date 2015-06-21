<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_saldo extends CI_Controller {

	private $table = "arus";
	private $id = "NIP";
	
	public function get_db_saldo($bln,$thn,$dt)
	{
		if($bln==null and $thn==null)
		{
			
		}else if($bln==null and $thn !=null){
			$this->db->where('TAHUN',$thn);
		}else if($bln !=null and $thn==null){
			$this->db->where('BULAN',$bln);
		}else{
			$this->db->where($dt);
		}
		
		return $this->db->get($this->table);
	}
}