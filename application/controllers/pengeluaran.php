<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','upload'));
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('m_pengeluaran');
		$this->load->helper('My_date_helper');
			
	}
	
	
	public function index()
	{
		$data['title'] = "Apl Tagihan Listrik";
		$data['view'] = 'pengeluaran/v_pengeluaran';
		$this->load->view('dashboard',$data);
	}
	
	function get_dt_pengeluaran()
	{
		$jml = $_POST['jumlah'];
		$bln = $_POST['bulan'];
		$thn = $_POST['tahun'];
		$dt = array(
			'TAHUN' => $thn,
			'BULAN' => $bln
		);
		$no = 0;
		
		$get = $this->m_pengeluaran->get_db_pengeluaran($jml,$bln,$thn,$dt);
		
		foreach($get->result() as $row):$no++;
			$bln  = bulan_convert($row->BULAN);
			$tgh = number_format($row->TAGIHAN,'2',',','.');
			$lain = number_format($row->LAIN_LAIN,'2',',','.');
			echo 	"<tr>
						<td style='text-align:center;'>$no</td>
						<td style='text-align:center;'>$row->TAHUN</td>
						<td>$bln</td>
						<td style='text-align:right;'>$tgh</td>
						<td style='text-align:right;'>$lain</td>
						<td>$row->KET</td>
					</tr>";
		endforeach;
	}

	function get_dt_periode()
	{
		$bln = $_POST['bulan'];
		$thn = $_POST['tahun'];
		$dt  = array(
			'TAHUN' => $thn,
			'BULAN' => $bln
		);
		$bulan = bulan_convert($bln);
		
		
		$get = $this->m_pengeluaran->get_db_periode($dt);
		
		if($get->num_rows()>0)
		{
			$data = array(
				'rs' => 1,
				'bln' => $bulan,
				'thn' => $thn
			);
		}else{
			$data = array(
				'rs' => 0
			);
		}
		
		echo json_encode($data);
	}
	
	function tambah_pengeluran()
	{
		$bln = $_POST['bulan'];
		$thn = $_POST['tahun'];
		$tagihan = $_POST['tagihan'];
		$lain = $_POST['lainlain'];
		$ket = $_POST['ket'];
		
		$this->form_validation->set_rules('bulan','NIP','trim|required');
		$this->form_validation->set_rules('tahun','NIP','trim|required');
		$this->form_validation->set_rules('tagihan','NIP','trim|required');
		
		
		$dt = array(
			'ID' => '',
			'TAHUN' => $thn,
			'BULAN' => $bln,
			'TAGIHAN' => $tagihan,
			'LAIN_LAIN' => $lain,
			'KET' => $ket
		);
		
		if($this->form_validation->run()==FALSE)
		{
			$data = array(
				'rs' => 0
			);
		}else{
			
			$this->m_pengeluaran->tambah_db_pengeluaran($dt);
			
			$data = array(
				'rs'=>1
			);
		}
		
		echo json_encode($data);
	}
	
	function generate()
	{
		$data['title'] = "Apl Tagihan Listrik";
		$data['view'] = 'pengeluaran/v_generate_pengeluaran';
		$this->load->view('dashboard',$data);
	
	}
	
	function get_dt_generate()
	{
		$bln = $_POST['bulan'];
		$thn = $_POST['tahun'];
		$dt  = array(
			'TAHUN' => $thn,
			'BULAN' => $bln
		);
		$bulan = bulan_convert($bln);
		
		
		$get = $this->m_pengeluaran->get_db_generate($dt);
		
		if($get->num_rows()>0)
		{
			$data = array(
				'rs' => 1,
				'bln' => $bulan,
				'thn' => $thn
			);
		}else{
			$data = array(
				'rs' => 0
			);
		}
		
		echo json_encode($data);
	}
	
	function simpan_generate()
	{
		$bln = $_POST['bulan'];
		$thn = $_POST['tahun'];
		$dt  = array(
			'TAHUN' => $thn,
			'BULAN' => $bln
		);
		
		//insert data ke detail_pendapatan
		$this->m_pengeluaran->insert_db_detail_pendapatan($bln,$thn);
		
		//Mengambil nilai pendapatan
		$get = $this->m_pengeluaran->get_pendapatan();
		$row = $get->row();
		$pendapatan = $row->pendapatan;

		//Mengambil data tagihan
		$get2 = $this->m_pengeluaran->get_pengeluaran($dt);
		$row2 = $get2->row();
		$tagihan = $row2->TAGIHAN;
		$lainlain = $row2->LAIN_LAIN;
		
		
		//Mengambil saldo akhir menjadi saldo awal
		$get3 = $this->m_pengeluaran->get_sisa_saldo();
		$row3 = $get3->row();
		$saldo_awal = $row3->SALDO_AKHIR;
		
		//perhitungan saldo akhir
		$saldo_akhir = $saldo_awal + $pendapatan - $tagihan - $lainlain;
		
		$dt2 = array(
			'ID' => '',
			'TAHUN' => $thn,
			'BULAN' => $bln,
			'SALDO_AWAL' => $saldo_awal,
			'PENDAPATAN' => $pendapatan,
			'TAGIHAN' => $tagihan,
			'LAIN_LAIN' => $lainlain,
			'SALDO_AKHIR' => $saldo_akhir
		);
		
		$this->m_pengeluaran->simpan_db_generate($dt2);
		
		$result = array(
			'rs' => 1
		);
		
		echo json_encode($result);
	}
}