<?php

use App\Dao\MonsterDao;
 
require_once(implode(DIRECTORY_SEPARATOR,["..","vendor","autoload.php"]));
require_once(implode(DIRECTORY_SEPARATOR,["..","config","setup.php"]));

header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

//get random ids
$dao = new MonsterDao();
$dataId = $dao->getAllIdMonster();
         
$idRaw= array_rand($dataId,NUMBER_OF_RANDOM_MONSTERS);    
$idSelected = [];

for ($i=0; $i < count($idRaw); $i++) { 
array_push($idSelected,$dataId[$idRaw[$i]]["id"]);
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
        
$dao = new MonsterDao();

$dataRaw = $dao->getRandomMonsters($idSelected);

echo json_encode($dataRaw);