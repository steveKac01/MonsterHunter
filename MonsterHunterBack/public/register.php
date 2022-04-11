<?php
use App\Dao\UserDao;

require_once(implode(DIRECTORY_SEPARATOR,["..","vendor","autoload.php"]));
require_once(implode(DIRECTORY_SEPARATOR,["..","config","setup.php"]));


header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

$newUser = json_decode(file_get_contents('php://input'), true);

if (!empty($newUser)) {

    $dao = new UserDao();
    $dao->registerUser($newUser);
}