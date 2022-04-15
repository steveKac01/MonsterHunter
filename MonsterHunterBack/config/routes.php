<?php

use App\Controller\{MainController,UserController};
/*
$router->map("GET", "/monsters", function () {
    $mainController = new MainController();
    $mainController->getMonsters();
});
*/

$router->map("GET", "/monster/[i:id]", function ($id) {

    $mainController = new MainController();
    $mainController->getMonsterById($id);
});

$router->map("POST", "/monster", function () {

    $mainController = new MainController();
    $mainController->newMonster();
});

$router->map("POST", "/monster/delete", function () {
    $mainController = new MainController();
    $mainController->deleteMonster();
});

$router->map("PUT", "/monster/edit", function () {
    $mainController = new MainController();
    $mainController->editMonster();
});

$router->map("GET", "/next/monster/[i:id]", function ($id) {

    $mainController = new MainController();
    $mainController->nextMonster($id);
});

$router->map("GET", "/previous/monster/[i:id]", function ($id) {

    $mainController = new MainController();
    $mainController->previousMonster($id);
});
/*
$router->map("GET", "/random", function () {

    $mainController = new MainController();
    $mainController->getRandomMonster();
});*/
/*
$router->map("POST|GET","/signIn" ,function(){

    $userController = new UserController();
    $userController->registerUser();

});*/
