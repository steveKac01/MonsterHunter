<?php
use App\Dao\MonsterDao;
use Core\TokenA;
require_once(implode(DIRECTORY_SEPARATOR,["..","vendor","autoload.php"]));
require_once(implode(DIRECTORY_SEPARATOR,["..","config","setup.php"]));

header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

$headers = apache_request_headers();

if (isset($headers["Authorization"])) {
   
    if(TokenA:: checkIsAdmin($headers["Authorization"],NOT_SO_SECRET_KEY)){


$newMonster = json_decode(file_get_contents('php://input'), true);

if (empty($newMonster)) {
            
    //on degage
} else {
    
$dao = new MonsterDao();
$dao->insertMonster($newMonster);
}
}}