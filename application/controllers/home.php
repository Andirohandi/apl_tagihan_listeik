<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
			
	}
	
	
	public function index()
	{
		$data['title'] = "Login ! Sistem Informasi Penggajian";
		$this->load->view('login',$data);
	}
	
	
	
}