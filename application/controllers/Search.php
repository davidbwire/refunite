<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->view('search.php');
	}
	public function getAll(){
		//if ($_SERVER['HTTP_REQUEST']="POST"){
			//get the data from the Api through the model
			$this->load->model('lost_people_model');
			$data['results']=$this->lost_people_model->getAll();
			//then get the data to the database
			// from this point then load to the view
			$this->load->view('search.php',$data);
	}
	public function getUser($id){
		$this->load->model('lost_people_model');
		$data['user']=$this->lost_people_model->getUser($id);
		$this->load->view('search.php',$data);
	}
	
}