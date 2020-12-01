<?php

namespace Model;

class ClienteEndereco {
    public $ID;
    public $ClienteID;
    public $Estado;
    public $Cidade;
    public $Bairro;
    public $Logradouro;
    public $Complemento;
    public $Numero;

    public function getEnderecoConcatenado(){
        return ($this->Estado . ", " . $this->Cidade . ' - Bairro ' . $this->Bairro . ', ' . $this->Logradouro . ', ' . $this->Complemento . ', nº ' . $this->Numero);
    }

    public static function load($ID){
        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("SELECT * FROM ClienteEndereco ce WHERE ce.ID = ?");
        $query->execute([$ID]);

        $result = $query->fetch(\PDO::FETCH_OBJ);

        $endereco = new ClienteEndereco();
        
        $endereco->ID           = $result->ID;
        $endereco->ClienteID    = $result->ClienteID;
        $endereco->Estado       = $result->Estado;
        $endereco->Cidade       = $result->Cidade;
        $endereco->Bairro       = $result->Bairro;
        $endereco->Logradouro   = $result->Logradouro;
        $endereco->Complemento  = $result->Complemento;
        $endereco->Numero       = $result->Numero;


        return $endereco;
    }

    public static function getAll($ClienteID){
        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("SELECT * FROM ClienteEndereco ce WHERE ce.ClienteID = ?");
        $query->execute([$ClienteID]);

        $enderecos = [];

        $results = $query->fetchAll(\PDO::FETCH_OBJ);

        foreach($results as $result){
            $endereco = new ClienteEndereco();

            $endereco->ID           = $result->ID;
            $endereco->ClienteID    = $result->ClienteID;
            $endereco->Estado       = $result->Estado;
            $endereco->Cidade       = $result->Cidade;
            $endereco->Bairro       = $result->Bairro;
            $endereco->Logradouro   = $result->Logradouro;
            $endereco->Complemento  = $result->Complemento;
            $endereco->Numero       = $result->Numero;

            array_push($enderecos, $endereco);
        }

        return $enderecos;
    }

    public function create(){
        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("INSERT INTO clienteendereco VALUES (?,?,?,?,?,?,?,?)");

        $query->execute([0, $this->$ClienteID, $this->$Estado, $this->$Cidade, $this->$Bairro, $this->$Logradouro, $this->$Complemento, $this->$Numero ]);

    }

    
    public function update(){
        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("UPDATE clienteendereco 
                                    SET Estado = ?,
                                        Cidade = ?,
                                        Bairro = ?,
                                        Logradouro = ?,
                                        Complemento = ?,
                                        Numero = ?
                                    WHERE ID = ?;");

        $query->execute([$this->$Estado, $this->$Cidade, $this->$Bairro, $this->$Logradouro, $this->$Complemento, $this->$Numero, $this->ID ]);

    }

    public function remove(){
        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("DELETE FROM clienteendereco WHERE ID = ?");
        $query->execute([$this->ID]);
    }
    
}