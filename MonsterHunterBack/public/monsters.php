<?php


use App\Dao\MonsterDao;


require_once(implode(DIRECTORY_SEPARATOR,["..","vendor","autoload.php"]));
require_once(implode(DIRECTORY_SEPARATOR,["..","config","setup.php"]));


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
    $dao = new MonsterDao();
    $dataRaw = $dao->getMonsters();

    echo json_encode($dataRaw);
    