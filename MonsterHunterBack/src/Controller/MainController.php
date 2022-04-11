<?php

namespace App\Controller;

use App\Dao\MonsterDao;


class MainController
{
    function getMonsters()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        $dao = new MonsterDao();
        $dataRaw = $dao->getMonsters();

        echo json_encode($dataRaw);
    }

    function getMonsterById($idMonster)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");

        $dao = new MonsterDao();
        $dataRaw = $dao->getMonsterById($idMonster);

        echo json_encode($dataRaw);
    }

    function newMonster()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        $newMonster = json_decode(file_get_contents('php://input'), true);
        if (empty($newMonster)) {

            //on degage
        } else {
            $dao = new MonsterDao();
            $dao->insertMonster($newMonster);
        }
    }

    function nextMonster($currentIdMonster)
    {
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
    }


    function previousMonster($currentIdMonster)
    {

        $dao = new MonsterDao();
        $dataId = $dao->getAllIdMonster();

        for ($i = 0; $i < count($dataId); $i++) {

            if ($currentIdMonster == $dataId[$i]["id"]) {
                if ($i - 1 >= 0) {
                    $idPosition = $i - 1;
                } else {
                    $idPosition = count($dataId) - 1;
                }
            }
        }



        $previousId = $dataId[$idPosition]["id"];

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");

        $dao = new MonsterDao();
        $dataRaw = $dao->getMonsterById($previousId);

        echo json_encode($dataRaw);
    }


    function deleteMonster()
    {
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Content-Type: application/json");

        $updatedMonster = json_decode(file_get_contents('php://input'), true);

        $idMonster = filter_var($updatedMonster["id"], FILTER_VALIDATE_INT);

        echo $idMonster;
        $dao = new MonsterDao();
        $dao->deleteMonster($idMonster);
    }

    function editMonster()
    {
        $updatedMonster = json_decode(file_get_contents('php://input'), true);
        if (empty($updatedMonster)) {

            //on degage
        } else {
            $dao = new MonsterDao();
            $dao->editMonster($updatedMonster);
        }
    }

    function getRandomMonster(){
       
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
        }
}
