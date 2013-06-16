<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test
 *
 * @author david
 */
class pg extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('refunite_api_connect_model');
        
    }
    public function index(){
        $this->refunite_api_connect_model->initiateRequest();
    }
    
}

?>
