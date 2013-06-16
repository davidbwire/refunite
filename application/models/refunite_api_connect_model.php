<?php

/**
 * Description of refunite_api_connect_model
 * 
 * Use this class for all connections to http://api.ru.istykker.dk/
 * @author Jiri  <http://stackoverflow.com/questions/975307/http-digest-authenticating-in-php>
 */
class refunite_api_connect_model extends CI_Model {
    private $uri = 'http://api.ru.istykker.dk/';
    private $user = 'hackathon';
    private $password ='473ba3ff6162c[masked]bcefa7de95e2ef266';

    public function __construct() {
        parent::__construct();
        
    }
    public function authenticate(){
        $www_header = 'Digest realm="TEST", nonce="356f2dbb8ce08174009d53c6f02c401f", algorithm="MD5", qop="auth"';
       print $this->response($www_header, $this->user, $this->password, "POST", $this->uri);

    }
    private function H($param) {
        return md5($param);
    }

    private function KD($a, $b) {
        return $this->H("$a:$b");
    }

    private function parseHttpDigest($digest) {
        $data = array();
        $parts = explode(", ", $digest);

        foreach ($parts as $element) {
            $bits = explode("=", $element);
            $data[$bits[0]] = str_replace('"', '', $bits[1]);
        }
        return $data;
    }

    public function response($wwwauth, $user, $pass, $httpmethod, $uri) {
        list($dummy_digest, $value) = explode(' ', $wwwauth, 2);
        $x = $this->parseHttpDigest($value);
        $realm = $x['realm'];
        $A1 = $user . ":" . $realm . ":" . $pass;
        $A2 = $httpmethod . ":" . $uri;

        if ($x['qop'] == 'auth') {
            $cnonce = time();
            $ncvalue = 1;
            $noncebit = $x['nonce'] . ":" . $ncvalue . ":" . $cnonce . ":auth:" . $this->H($A2);
            $respdig = $this->KD($this->H($A1), $noncebit);
        } else {
            # FIX: handle error here
        }

        $base = 'Digest username="' . $user . '", realm="';
        $base .= $x['realm'] . '", nonce="' . $x['nonce'] . '",';
        $base .= ' uri="' . $uri . '", cnonce="' . $cnonce;
        $base .= '", nc="' . $ncvalue . '", response="' . $respdig . '", qop="auth"';
        return $base;
    }

}

?>
