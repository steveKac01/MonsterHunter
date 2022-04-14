<?php

use App\Controller\UserController;
use App\Dao\UserDao;

require_once(implode(DIRECTORY_SEPARATOR,["..","vendor","autoload.php"]));
require_once(implode(DIRECTORY_SEPARATOR,["..","config","setup.php"]));


header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

$user = json_decode(file_get_contents('php://input'), true);

if (!empty($user)) {

    $dao = new UserDao();
  $data =  $dao->logUser($user);

  $userController =new UserController();
  $jwt =  $userController->getJWT($data);
 echo  json_encode($data+$jwt); // zarb ca marche ^^"
 
  
}