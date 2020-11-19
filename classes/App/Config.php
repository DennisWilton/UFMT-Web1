<?php 

namespace App;

class Config {
    const PROJECT_NAME = 'UFMT-WEB1';

    const DBHOST        = "localhost";
    const DBUSERNAME    = "root";
    const DBPASSWORD    = "";
    const DBNAME        = "ufmt";

    const BASE_URL      = 'http://localhost/ufmt/';

    public static function LINK($href){
        return Config::BASE_URL."index.php/".$href;
    }

    public static function GET($chave){
        try {
            if(!$chave) return;
            $db = \Database\Database::getInstance();
            $query = $db->prepare('SELECT * FROM Config WHERE Chave = ?');
            $query->execute([$chave]);
            
            $result = $query->fetch(\PDO::FETCH_OBJ);
            if($result) return $result->Valor;
        }catch(\Exception $e){
        }
    }

    public static function SET($chave, $valor){
        if(!$chave) return;
        if(!$valor) return;

        $db = \Database\Database::getInstance();

        $exists = self::GET($chave);
        if($exists) {
            $query = $db->prepare('UPDATE Config SET Valor = ? WHERE Chave = ?');
            $query->execute([$valor, $chave]);
        }else{
            $query = $db->prepare('INSERT INTO Config (Chave, Valor) VALUES (?, ?)');
            $query->execute([$chave, $valor]);
        }

        $result = self::GET($chave);
        return $result;
    }
}