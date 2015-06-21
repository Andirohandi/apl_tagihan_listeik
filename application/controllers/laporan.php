<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('cfpdf/fpdf');
		//$this->load->model('m_pengeluaran');
		$this->load->model('m_laporan');
		$this->load->helper('My_date_helper');
		define('FPDF_FONTPATH',$this->config->item('fonts_path'));
    }
    function index(){
        
        $this->fpdf->FPDF("P","cm","A4");
		$this->fpdf->SetMargins(1,1,1);
		$this->fpdf->AliasNbPages();
		$this->fpdf->AddPage();
		$this->fpdf->SetFont('Times','B',12);
		$this->fpdf->Cell(30,0.7,'Laporan Produk   Jasa Jawa Barat',0,'C','C');
		$this->fpdf->Ln();
		$this->fpdf->Cell(30,0.7,'Periode Bulan Agustus',0,'C','C');
		$this->fpdf->Line(1,3.5,30,3.5);
		$this->fpdf->Output("laporan.pdf","I");
        $this->load->view('v_laporan',$data);
    }
	
	function r_detail_bayar()
	{
		$bln = $_GET['x0blx0'];
		$thn = $_GET['x0thx0'];
		
		$dt = array(
			'TAHUN' => $thn,
			'BULAN' => $bln
		);
		
		$this->fpdf->FPDF("P","cm","A4");
		$this->fpdf->SetMargins(1,1,1);
		$this->fpdf->AliasNbPages();

		$this->fpdf->AddPage();

		$this->fpdf->SetFont('Times','B',12);
		$this->fpdf->Cell(18,0.7,'Laporan Pembayaran Listrik '.bulan_convert($bln).' '.$thn,0,'C','C');
		$this->fpdf->Ln();
		$this->fpdf->Line(1,2,20,2);
		$this->fpdf->Ln();
		$this->fpdf->Ln();
		
		$this->fpdf->Cell(1,0.7,'No',0,'C','C');
		$this->fpdf->Cell(2,0.7,'NIP',0,'C','C');
		$this->fpdf->Cell(3,0.7,'TAHUN',0,'C','C');
		$this->fpdf->Cell(4,0.7,'BULAN',0,'C','C');
		$this->fpdf->Cell(6,0.7,'TAGIHAN',0,'C','C');
		$this->fpdf->Ln();
		
		$get = $this->m_laporan->get_db_pendapatan($dt);
		$no =0;
		$this->fpdf->SetFont('Times','',8);
		foreach($get->result() as $row):$no++;
			$this->fpdf->Cell(1,0.7,$no." ".$row->NIP,0,'C','C');
			$this->fpdf->Cell(2,0.7,$row->NIP,0,'C','C');
			$this->fpdf->Cell(3,0.7,$row->TAHUN,0,'C','C');
			$this->fpdf->Cell(4,0.7,bulan_convert($row->BULAN),0,'C','C');
			$this->fpdf->Cell(6,0.7,$row->TAGIHAN,0,'C','C');
			$this->fpdf->Ln();
		endforeach;
		
		$this->fpdf->Output("laporan_periode_".$thn."_".$bln.".pdf","I");
	}
}