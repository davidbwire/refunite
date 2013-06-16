<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->view('search.php');
	}
	public function search(){
		if ($_SERVER['HTTP_REQUEST']="POST"){
			//get the data from the Api through the model
			$data['results']=$this-> model->getdata($country,$year,$town);
			//then get the data to the database
			
			// from this point then load to the view
			$this->load->view('search.php',$data);
			
		}
		
		$this->load->view('search.php');
	}
	
}