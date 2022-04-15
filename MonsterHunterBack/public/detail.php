<?php

namespace App\Controller;

use App\Dao\MonsterDao;





header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$idMonster = json_decode(file_get_contents('php://input'), true);

$dao = new MonsterDao();
$dataRaw = $dao->getMonsterById($idMonster);

echo json_encode($dataRaw);