<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hash{

    public function encrypt($password){

        $pass_secure = sha1(md5($password));
        $hash = hash('sha256',$pass_secure);
        return $hash;
    }
}