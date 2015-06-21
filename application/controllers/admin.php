<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
			
	}
	
	
	public function index()
	{
		$data['title'] = "Selamat Datang di Sistem Informasi Penggajian";
		$data['url_dash1'] = "admin";
		$data['url_dash2'] = "";
		$data['dash1'] = "Dashboard";
		$data['dash2'] = "";
		$data['view'] = "index";
		$this->load->view('dashboard',$data);
	}
	
	
	
}