<?php
namespace Core;
use Core\Database;


class AbstractDao
{

    protected Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

}