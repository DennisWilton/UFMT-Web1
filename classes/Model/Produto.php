<?php
namespace Model;

use \Throwable;
use \PDO;
use Database\Database;



class Produto {
    public $ID;
    public $Nome;
    public $Valor;
    public $Quantidade = 1;

    public static function load($id){
        try{
            $db = Database::getInstance();
            $query = $db->prepare('SELECT * FROM Produtos p WHERE p.ID = :id');
            $query->execute(['id' => $id]);

            $_produto = $query->fetch(PDO::FETCH_OBJ);
            $produto = new Produto();
            try{
                $produto = clone $_produto;
            }catch(Throwable $e){
                $produto->Nome = 'Erro ao buscar o produto';
            }

            return $produto;
            
        }catch(Throwable $e){
            throw new \Error($e);
            // throw new \Error("Falha ao carregar o produto $id.", $e);
        }
    }

    public static function getAll(){
        try{
            $db = Database::getInstance();
            $query = $db->prepare('SELECT * FROM Produtos p');
            $query->execute([]);

            $_produtos = $query->fetchAll(PDO::FETCH_OBJ);
            
            $produtos = [];

            foreach($_produtos as $_produto){
                $produto = new Produto();
                $produto = clone $_produto;
                array_push($produtos, $produto);
            }
            
            return $produtos;
        }catch(Throwable $e){
            throw new \Error($e);
        }
    }
}