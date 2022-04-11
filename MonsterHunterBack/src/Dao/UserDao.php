<?php
namespace App\Dao;

use Core\AbstractDao;
use PDO;

class UserDao extends AbstractDao
{

    function registerUser($newUser)
    {
        $query = $this->db->prepare("insert into user values('',:username,:email,:password)");
        $query->execute([":username"=>$newUser['login'],
        ":email"=>$newUser['email'],
        ":password"=>$newUser['password']
    ]);


    }

    function logUser($user):array
    {
        $query = $this->db->prepare("select username from user where email=:email && password=:password");
       $query->execute([":email"=>$user['email'],
":password"=>$user['password']]);
 $data = $query->fetch(pdo::FETCH_ASSOC);

 return $data;
        
    }

}