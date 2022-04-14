<?php
use App\Dao\MonsterDao;
use Core\TokenA;

require_once(implode(DIRECTORY_SEPARATOR,["..","vendor","autoload.php"]));
require_once(implode(DIRECTORY_SEPARATOR,["..","config","setup.php"]));

//try with delete method :|
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

$headers = apache_request_headers();
if (isset($headers["Authorization"])) {
   
    if(TokenA:: checkIsAdmin($headers["Authorization"],NOT_SO_SECRET_KEY)){



$data = json_decode(file_get_contents('php://input'), true);

$test = filter_var($data["id"],FILTER_VALIDATE_INT);

$dao = new MonsterDao();
$dao->deleteMonster($test);

    }}