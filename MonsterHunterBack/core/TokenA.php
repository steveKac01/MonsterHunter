<?php

namespace Core;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TokenA{


   static function checkIsAdmin($tokenToTest,$key)
    {
        $token = JWT::decode($tokenToTest, new Key($key, 'HS512'));

        if ($token->iss !== "localhost") {
          //  header('HTTP/1.1 401 Unauthorized');
   
           die;
        } else {
            if ($token->isAdmin == 1) {
                return true;
            } else {
                return false;
            }
        }
    }


    function generateToken()
    {

    }
}