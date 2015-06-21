<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listrik extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','upload'));
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('m_listrik');
		$this->load->helper('My_date_helper');
			
	}
	
	
	public function index()
	{
		$data['title'] = "Apl Tagihan Listrik";
		$data['view'] = 'pemakai/v_pemakai';
		$this->load->view('dashboard',$data);
	}

}