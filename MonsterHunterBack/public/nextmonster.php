<?php



ini_set("display_errors",1);

require_once(implode(DIRECTORY_SEPARATOR,["..","vendor","autoload.php"]));
require_once(implode(DIRECTORY_SEPARATOR,["..","config","setup.php"]));

use App\Dao\MonsterDao;
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

(int)$currentIdMonster = $_GET["id"];


//get next ID
$dao = new MonsterDao();
$dataId = $dao->getAllIdMonster();

for ($i = 0; $i < count($dataId); $i++) {

    if ($currentIdMonster == $dataId[$i]["id"]) {
        if ($i + 1 < count($dataId)) {
            $idPosition = $i;
        } else {
            $idPosition = -1;
        }
    }
}

$nextId = $dataId[$idPosition + 1]["id"];

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$dao = new MonsterDao();
$dataRaw = $dao->getMonsterById($nextId);

echo json_encode($dataRaw);
