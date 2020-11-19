<?php

namespace Model;

use Database\Database;
use PDO;

class Model {

    protected $tabela;
    protected $db;

    public function __construct($options = []){
        $this->tabela = $options->tabela;
        $this->db = Database::getInstance();
    }
         
    public function getById($id = 0, $pkname = "ID"){
        try {
            $sql = "SELECT * FROM $this->tabela tb WHERE tb.$pkname = $id";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            print_r($result);
            return $result;
        }catch(\Exception $e){
            print($e->getMessage());
            return array();
        }
    }
    
}