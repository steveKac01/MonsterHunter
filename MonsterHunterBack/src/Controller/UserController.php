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
        $expire     = $issuedAt->modify('+2 hours')->getTimestamp();      // Ajoute 60 secondes
        $serverName = "localhost";
        $username   = $user;                                           // Récupéré à partir des données POST filtré

    $data = [
    'iat'  => $issuedAt->getTimestamp(),         // Issued at:  : heure à laquelle le jeton a été généré
    'iss'  => $serverName,                       // Émetteur
    'nbf'  => $issuedAt->getTimestamp(),         // Pas avant..
    'exp'  => $expire,                           // Expiration
    'userName' => $username,                     // Nom d'utilisateur
    ];

return ["token"=>JWT::encode(
    $data,
    $secretKey,
    'HS512'
)];


    }

  
}