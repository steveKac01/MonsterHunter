<?php

namespace App\Dao;

use Core\AbstractDao;
use PDO;

class UserDao extends AbstractDao
{
    function registerUser($newUser)
    {
        $query = $this->db->prepare("insert into user values('',:username,:password,:email,false)");
        $query->execute([
            ":username" => $newUser['username'],
            ":email" => $newUser['email'],
            ":password" => $newUser['password']
        ]);
    }

    function logUser($user): array
    {
        $query = $this->db->prepare("select username,id,isAdmin from user where email=:email && password=:password");
        $query->execute([
            ":email" => $user['email'],
            ":password" => $user['password']
        ]);
        $data = $query->fetch(pdo::FETCH_ASSOC);

        return $data;
    }
}
