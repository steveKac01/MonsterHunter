<?php
use App\Dao\MonsterDao;


require_once(implode(DIRECTORY_SEPARATOR,["..","vendor","autoload.php"]));
require_once(implode(DIRECTORY_SEPARATOR,["..","config","setup.php"]));

//try with delete method :|
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

$test = filter_var($data["id"],FILTER_VALIDATE_INT);

$dao = new MonsterDao();
$dao->deleteMonster($test);

