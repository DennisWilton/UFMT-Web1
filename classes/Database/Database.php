<?php 

namespace Database;

use App\Config;
use PDO;

class Database {
    public static $pdo;
    
    //Padrão Singleton para entregar a conexão com o banco de dados.
    public static function getInstance(){
        if (!isset(self::$pdo)) {
            self::$pdo = new PDO('mysql:host='.Config::DBHOST.';dbname='.Config::DBNAME, Config::DBUSERNAME, Config::DBPASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$pdo;
    }
}