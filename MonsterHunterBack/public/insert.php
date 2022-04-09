<?php
use App\Dao\MonsterDao;

require_once(implode(DIRECTORY_SEPARATOR,["..","vendor","autoload.php"]));
require_once(implode(DIRECTORY_SEPARATOR,["..","config","setup.php"]));

header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

$newMonster = json_decode(file_get_contents('php://input'), true);

if (empty($newMonster)) {
            
    //on degage
} else {
$dao = new MonsterDao();
$dao->insertMonster($newMonster);
}