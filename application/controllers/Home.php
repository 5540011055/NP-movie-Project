<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
  public function __construct() {
    parent::__construct();
//    $this->load->model('Test_model');
  }


public function index()
	{
		//$params = json_decode(file_get_contents('php://input'), TRUE);
		
//			$data['results'] = $this->Test_model->loaddata();
		
		//echo $data['results'];
		//$data['code'] = $params['code'];
		
		$this->load->view('main_component/header');
		$this->load->view('index');
		$this->load->view('main_component/footer');
	}
	

}
?>