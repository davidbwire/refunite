<?php

/**
 * Description of refunite_api_connect_model
 * 
 * Use this class for all connections to http://api.ru.istykker.dk/
 *
 * @author david bwire
 */
class refunite_api_connect_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_realm = 'api.ru.istykker.dk';
    private $_uri = 'http://api.ru.istykker.dk/';
    private $_requestMethod = 'GET';
    private $_user = 'hackathon';
    private $_password = '473ba3ff6162c6064479825bcefa7de95e2ef266';
    
    private $_response;
    private $_nonce;
    private $_opaque;
    private $_algorithmn;
    private $_qop;
    private $_digest;
    private $_digestParts;
    
    public function initiateRequest($params = 'country/57') {
        $this->_uri = $this->_uri . $params;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->_uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $data = $this->_parseHttpHeader($header);
        // initialize the variables
        $this->_init_variables($data);
        $auth_header = $this->_get_auth_header();
//        curl_close($ch);

        
//        $ch2 = curl_init();
//        curl_setopt($ch2, CURLOPT_URL, $this->_uri);
//        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch2, CURLOPT_VERBOSE, 1);
//        print_r($auth_header);exit;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $auth_header);
        curl_setopt($ch, CURLOPT_HTTPAUTH,CURLAUTH_DIGEST);
        $result = curl_exec($ch);
        echo $result;
        curl_close($ch);
        
        
        
        
    }

    private function _init_variables($data = array()) {
        if (count($data)) {
            foreach ($data as $key => $value) {
                if (isset($this->{'_'.$key})) {
                    $this->{'_' . $key} = $value;
                }
                // @todo find out why nonce && opaque fails 
                if($key == 'nonce'){
                    $this->_nonce = $value;
                }elseif ($key == 'opaque') {
                    $this->_opaque = $value;
                }
            }
        }
    }
 /*
  * @return string header
  */
    private function _get_auth_header() {

        $A1 = md5("{$this->_user}:{$this->_realm}:{$this->_password}");
        $A2 = md5("{$this->_requestMethod}:{$this->_uri}");
        $time = time();
        $this->_response = md5("{$A1}:{$this->_nonce}:0:$time:{$this->_qop}:{$A2}");
        $format = 'Authorization: Digest username="%s", realm="%s", nonce="%s", algorithmn="%s", opaque="%s", uri="%s", response="%s"';
        $data = array();
        $data[0] = sprintf($format, $this->_user, $this->_realm, $this->_nonce,  $this->_algorithmn, $this->_opaque,  $this->_uri,  $this->_response);
        $data[] ="Accept: application/json";
        return  $data;
    }

    private function _parseHttpHeader($header) {
        $data = array();
        $parts = explode(", ", $header);

        foreach ($parts as $element) {
            $bits = explode("=", $element);
            $data[$bits[0]] = str_replace('"', '', @$bits[1]);
        }
        return $data;
    }

}

?>
