<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Management extends CI_Controller {
  public function __construct() {
    parent::__construct();
//    $this->load->model('Test_model');
  }


public function index()
	{
		
		$this->load->view('manage_component/header');
		$this->load->view('manage');
		$this->load->view('manage_component/footer');
		
	}
	

}
?>