<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Movie extends CI_Controller {
  public function __construct() {
    parent::__construct();
//    $this->load->model('Test_model');
  }


public function index()
	{
//		$params = json_decode(file_get_contents('php://input'), TRUE);
		$params['id']  =  $this->input->get('id',TRUE);

		$this->load->view('main_component/header');
		$this->load->view('play_movie',$params);
		$this->load->view('main_component/footer');
	}
	
public function test()
	{
//		$params = json_decode(file_get_contents('php://input'), TRUE);
		$params['id']  =  $this->input->get('id',TRUE);

//		$this->load->view('main_component/header');
		$this->load->view('test_player',$params);
//		$this->load->view('main_component/footer');

	}
	

}
?>