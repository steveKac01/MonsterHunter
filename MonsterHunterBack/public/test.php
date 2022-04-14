<?php


//Test de co par token, kill me plz :|

use Core\TokenA;

header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

require_once(implode(DIRECTORY_SEPARATOR, ["..", "vendor", "autoload.php"]));
require_once(implode(DIRECTORY_SEPARATOR, ["..", "config", "setup.php"]));
$headers = apache_request_headers();
if (isset($headers["Authorization"])) {
   echo "ok header";
    if(TokenA:: checkIsAdmin($headers["Authorization"],NOT_SO_SECRET_KEY)){

        echo "OK tu es admin";
    }else{
        echo "nope";
    }

} else {
echo "nope pas de ";
//header('HTTP/1.1 401 Unauthorized');


}

function gotohell()
{
    return header('HTTP/1.1 401 Unauthorized');
    exit();
}