<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemakai extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','upload'));
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('m_pemakai');
		$this->load->helper('My_date_helper');
			
	}
	
	
	public function index()
	{
		$data['title'] = "Apl Tagihan Listrik";
		$data['view'] = 'pemakai/v_pemakai';
		$this->load->view('dashboard',$data);
	}
	
	function get_dt_pemakai()
	{
		$nip = $_POST['cari_nip'];
		$jumlah   = $_POST['jumlah'];
		$status   = $_POST['status'];
		$no = 0;
		$get = $this->m_pemakai->get_db_pemakai($nip,$jumlah,$status);
		
		foreach($get->result() as $row):$no++;
			echo
			"<tr>
				<td style='text-align:center'>$no</td>
				<td>$row->NIP</td>
				<td>$row->NAMA</td>
				<td>$row->TAGIHAN</td>";
				if($row->STATUS==1)
				{
					echo "<td style='text-align:center'><i class='glyphicon glyphicon-ok'></i></td>";
				}else
				{
					echo "<td><i class='glyphicon glyphicon-remove'></i></td>";
				}
				
			echo "
				<td style='text-align:center' ><a class='btn btn-info btn-sm' style='margin-right:10px;'><i class='glyphicon glyphicon-edit'></i></a><a class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'></i></a></td>
			</tr>";
		endforeach;
	}
	
	function get_dt_id()
	{
		$get = $this->m_pemakai->get_db_id();
		$no = 0;
		foreach($get->result() as $row):$no++;
			$nip = (int)$row->NIP;
		endforeach;
		$nip2 = $nip + 1;
		$nip3 = count($nip2);
		if($nip3==1)
		{
			$result = '000'.$nip2;
		}else if($nip3==2)
		{
			$result = '00'.$nip2;
		}
		
		$data = array
		(
			'nip' => $result
		);
		
		echo json_encode($data);
	}
	
	function tambah_pemakai()
	{
		$nip = $_POST['nip'];
		$nama = $_POST['nama'];
		$tagihan = $_POST['tagihan'];
		$this->form_validation->set_rules('nip','NIP','trim|required');
		$this->form_validation->set_rules('nama','Nama','trim|required');
		$this->form_validation->set_rules('tagihan','Tagihan','trim|required');
		
		if($this->form_validation->run()==FALSE)
		{
			$data = array(
				'rs' => 0
			);
		}else{
			$dt = array(
				'ID' => '',
				'NIP' => $nip,
				'NAMA' => $nama,
				'TAGIHAN' => $tagihan,
				'STATUS' => 1,
			);
			$this->m_pemakai->tambah_db_pemakai($dt);
			$data = array(
				'rs'=>1
			);
		}
		
		echo json_encode($data);
	}
	
}