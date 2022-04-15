<?php
ini_set("display_errors",1);

require_once(implode(DIRECTORY_SEPARATOR,["..","vendor","autoload.php"]));
require_once(implode(DIRECTORY_SEPARATOR,["..","config","setup.php"]));

use App\Dao\MonsterDao;

header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

(int)$idMonster = $_GET["id"];

$dao = new MonsterDao();
$dataRaw = $dao->getMonsterById($idMonster);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
echo json_encode($dataRaw);