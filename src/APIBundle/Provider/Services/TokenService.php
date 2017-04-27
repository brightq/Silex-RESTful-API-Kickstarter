<?php
namespace APIBundle\Provider\Services;

use \Firebase\JWT\JWT;

class TokenService
{
    protected $secret;

    public function __construct($secret){
        $this->secret = $secret;
    }

    public function generateToken($payload) {
        //set the expiration date to one hour
        $payload['exp'] = strtotime('+1 hour');
        $jwt = JWT::encode($payload, $this->secret);
        return $jwt;
    }


    public function validateToken($token) {
        if ($this->decodeToken($token)){
            return true;
        }else{
            return false;
        }
    }


    public function extendToken($token) {
        $decodedpayload = $this->decodeToken($token);
        $newpayload = (array) $decodedpayload;
        $newpayload['exp'] = strtotime('+1 hour');
        return $this->generateToken($newpayload);
    }


    private function decodeToken($token) {
        try {
            $decodedpayload = JWT::decode($token, $this->secret, array('HS256'));
            return $decodedpayload;
        } catch ( \Exception $e ) {
            //invalidate token 
            return false;
        }
    }

}