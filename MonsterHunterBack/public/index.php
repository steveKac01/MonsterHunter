<?php
     header("Access-Control-Allow-Origin: *");
$newMonster = json_decode(file_get_contents('php://input'), true);


require_once(implode(DIRECTORY_SEPARATOR,["..","vendor","autoload.php"]));
require_once(implode(DIRECTORY_SEPARATOR,["..","config","setup.php"]));

$router = new AltoRouter();

$requestMethod = filter_input(INPUT_SERVER,"REQUEST_METHOD");
$requestAdress = filter_input(INPUT_SERVER,"REQUEST_URI");

$match = $router->match();

require_once(implode(DIRECTORY_SEPARATOR,["..","config","routes.php"]));

//Get adress
$requestMethod = filter_input(INPUT_SERVER,"REQUEST_METHOD");
$requestAdress = filter_input(INPUT_SERVER,"REQUEST_URI");

$match = $router->match($requestAdress,$requestMethod);


if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	echo "404 Not Found";
}