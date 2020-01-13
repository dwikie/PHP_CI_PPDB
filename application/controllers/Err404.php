<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Err404 extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->output->set_status_header('404'); 
    	$this->load->view('404/error');
	}
}