<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pengeluaran extends CI_Controller {

	private $table = "pengeluaran";
	private $id = "NIP";
	
	public function get_db_pengeluaran($jml,$bln,$thn,$dt)
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
		
		$this->db->limit($jml);
		return $this->db->get($this->table);
	}
	
	function get_db_periode($dt)
	{
		$this->db->where($dt);
		return $this->db->get($this->table);
	}
	
	function tambah_db_pengeluaran($dt)
	{
		$this->db->insert($this->table,$dt);
	}
	
	function get_db_generate($dt)
	{
		$this->db->where($dt);
		return $this->db->get('arus');
	}
	
	function get_pendapatan()
	{
		return $this->db->query('SELECT SUM(TAGIHAN) as pendapatan FROM pemakai WHERE STATUS=1');
	}
	
	function get_pengeluaran($dt)
	{
		$this->db->where($dt);
		return $this->db->get($this->table);
	}
	
	function get_sisa_saldo()
	{
		return $this->db->query('SELECT SALDO_AKHIR FROM arus ORDER BY ID DESC LIMIT 1');
	}
	
	function simpan_db_generate($dt)
	{
		$this->db->insert('arus',$dt);
	}
	
	function insert_db_detail_pendapatan($bln,$thn)
	{
		$this->db->query('INSERT INTO pendapatan_detail(NIP,TAGIHAN) SELECT NIP,TAGIHAN FROM pemakai');
		$this->db->query("UPDATE pendapatan_detail SET TAHUN='".$thn."',BULAN='".$bln."' WHERE TAHUN='' AND BULAN=''");
	}
}