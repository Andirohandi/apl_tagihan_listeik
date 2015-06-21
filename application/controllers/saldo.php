<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Saldo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','upload'));
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('m_saldo');
		$this->load->helper('My_date_helper');
			
	}
	
	
	public function index()
	{
		$data['title'] = "Apl Tagihan Listrik";
		$data['view'] = 'saldo/v_saldo';
		$this->load->view('dashboard',$data);
	}
	
	function get_dt_saldo()
	{
		$bln = $_POST['bulan'];
		$thn = $_POST['tahun'];
		$dt = array(
			'TAHUN' => $thn,
			'BULAN' => $bln
		);
		$no = 0;
		
		$get = $this->m_saldo->get_db_saldo($bln,$thn,$dt);
		
		foreach($get->result() as $row):$no++;
			$anchor = site_url('laporan/r_detail_bayar?x0blx0='.$row->BULAN.'&&x0thx0='.$row->TAHUN);
			$bln  = bulan_convert($row->BULAN);
			$tgh = number_format($row->TAGIHAN,'2',',','.');
			$lain = number_format($row->LAIN_LAIN,'2',',','.');
			$sa = number_format($row->SALDO_AWAL,'2',',','.');
			$sak = number_format($row->SALDO_AKHIR,'2',',','.');
			$pendapatan = number_format($row->PENDAPATAN,'2',',','.');
			echo 	"<tr>
						<td style='text-align:center;'>$no</td>
						<td style='text-align:center;'>$row->TAHUN</td>
						<td>$bln</td>
						<td style='text-align:right;'>$sa</td>
						<td style='text-align:right;'>$pendapatan</td>
						<td style='text-align:right;'>$tgh</td>
						<td style='text-align:right;'>$lain</td>
						<td style='text-align:right;'>$sak</td>
						<td style='text-align:center' ><a class='btn btn-info btn-sm' style='margin-right:10px;'><i class='glyphicon glyphicon-edit'></i></a><a href='$anchor' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-print'></i></a></td>
					</tr>";
		endforeach;
	}

}