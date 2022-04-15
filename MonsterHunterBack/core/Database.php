<?php

namespace Core;

use PDO;


class Database extends PDO
{

    private static Database $database;

    public static function getInstance()
    {
        if (!isset(self::$database)) {

            self::$database = new Database();
        }
        return self::$database;
    }

    private function __construct()
    {
        $config = parse_ini_file(PATH_TO_DATABASE_CONFIG, false, INI_SCANNER_NORMAL);

        $dsn = $config["driver"] . ":host=" . $config["host"] . ";dbname=" . $config["dbname"] . ";charset=" . $config["charset"];

        parent::__construct(
            $dsn,
            $config["username"],
            "McSU2VaSTMEO",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
}
