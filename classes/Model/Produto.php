<?php
namespace Model;

use \Throwable;
use \PDO;
use Database\Database;

class Produto {
    public $ID;
    public $Nome = 'Nome não informado';
    public $Valor = 0;
    public $Quantidade = 1;
    public $Imagem = "/ufmt/static/img/product-placeholder.png";

    /**
     * Busca um produto específico.
     */
    public static function load($id){
        try{
            $db = Database::getInstance();
            $query = $db->prepare('SELECT * FROM Produtos p WHERE p.ID = :id');
            $query->execute(['id' => $id]);

            $_produto = $query->fetch(PDO::FETCH_OBJ);
            $produto = new Produto();
            
            
            try{
                $produto->ID   = $_produto->ID;
                $produto->Nome = $_produto->Nome;
                $produto->Valor = $_produto->Valor;
                $produto->Quantidade = $_produto->Quantidade;
                $produto->Imagem = $_produto->Imagem;
            }catch(Throwable $e){
                $produto->Nome = 'Produto não encontrado';
                $produto->Valor = 0.00;
                $produto->Quantidade = 0;
                $produto->Imagem = 'N/A';
            }

            return $produto;
            
        }catch(Throwable $e){
            throw new \Error($e);
            // throw new \Error("Falha ao carregar o produto $id.", $e);
        }
    }




    /**
     *  Busca todos os produtos do banco.
     */
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




    /**
     * Atualiza um produto existente.
     */
    public function update($data){
        if(!isset($data->ID)) throw new \Error("É necessário informar o ID do produto a ser atualizado!");

        $produto = Produto::load($data->ID);

        if(isset($data->Nome)) $produto->Nome = $data->Nome;
        if(isset($data->Quantidade)) $produto->Quantidade = $data->Quantidade;
        if(isset($data->Valor)) $produto->Valor = $data->Valor;
        if(isset($data->Imagem)) $produto->Imagem = $data->Imagem;

        $db = Database::getInstance();
        $query = $db->prepare(
            'UPDATE Produtos p 
             SET Nome       = :nome,
                Quantidade  = :quantidade,
                Valor       = :valor,
                Imagem      = :imagem
            WHERE p.ID      = :id');

        return $query->execute([
            'id' => $produto->ID, 
            'nome' => $produto->Nome, 
            'quantidade' => $produto->Quantidade, 
            'valor' => $produto->Valor, 
            'imagem' => $produto->Imagem]);
    }
    



    /**
     * Insere um novo produto.
     */
    public function insert(){
        $db = Database::getInstance();
        $query = $db->prepare(' INSERT INTO Produtos (Nome, Quantidade, Valor, Imagem) 
                                VALUES (:nome, :quantidade, :valor, :imagem)');

        return $query->execute([
            'nome' => $this->Nome, 
            'quantidade' => $this->Quantidade, 
            'valor' => $this->Valor, 
            'imagem' => $this->Imagem]);
    }

    /**
     * Insere um novo produto.
     */
    public function remove(){
        $db = Database::getInstance();
        $query = $db->prepare('DELETE FROM Produtos WHERE ID = ?');
        $retorno =  $query->execute([$this->ID]);
        
        return $retorno;
    }
}