<?php
namespace App\Controller;

require_once(implode(DIRECTORY_SEPARATOR,["..","vendor","autoload.php"]));



 
use DateTimeImmutable;
use Firebase\JWT\JWT;
class UserController
{

    function getJWT($user)
    {

        $secretKey  = NOT_SO_SECRET_KEY;
        $issuedAt   = new DateTimeImmutable();
        $expire     = $issuedAt->modify('+2 days')->getTimestamp();      
        $serverName = "localhost";
        $username   = $user;   // Récupéré à partir des données POST filtré (oupas)

    $data = [
    'iat'  => $issuedAt->getTimestamp(),         
    'iss'  => $serverName,                      
    'nbf'  => $issuedAt->getTimestamp(),        
    'exp'  => $expire,                           
    'userName' => $user["username"],    
    'isAdmin' =>$user["isAdmin"]                 // Nom d'utilisateur
    ];

return ["token"=>JWT::encode(
    $data,
    "FDP)éeçMDLQLDplzddPDLZàç°)=+DZ.DZAsdsdDZDDzd",
    'HS512'
)];


    }

  
}