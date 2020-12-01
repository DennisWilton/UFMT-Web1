<?php 

namespace Model;

use \Throwable;
use \Error;
use \PDO;
use Database\Database;
use Model\Produto;

class Venda {

    public $ID;
    public $ClienteID;
    public $VendedorID;
    public $LojaID;
    public $produtos = [];

    /**
     * 
     *   Função load
     *   Busca e retorna uma instância de venda.
     * 
     */
    public static function load($id){
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM vendas V where V.ID = :id");
        $query->execute(['id' => $id]);

        $queryResult = $query->fetch(PDO::FETCH_OBJ);
        $venda = new Venda();
        $venda->ID             =    $queryResult->ID;
        $venda->ClienteID      =    $queryResult->ClienteID;
        $venda->VendedorID     =    $queryResult->VendedorID;
        $venda->LojaID         =    $queryResult->LojaID;

        $venda->buscaProdutos();

        return $venda;
    }


    /**
     * 
     *   Função getAll
     *   Busca e retorna todas as instâncias de venda.
     * 
     */
    public static function getAll(){ 
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM vendas");
        $query->execute();

        $queryResult = $query->fetchAll(PDO::FETCH_OBJ);

        
        $vendas = [];
        foreach($queryResult as $item){
            $venda = new Venda();
            $venda->ID             =    $item->ID;
            $venda->ClienteID      =    $item->ClienteID;
            $venda->VendedorID     =    $item->VendedorID;
            $venda->LojaID         =    $item->LojaID;
            
            $venda->buscaProdutos();
            
            array_push($vendas, $venda);
        }
        
        return $vendas;
    }


    /**
     * 
     *  Busca os produtos referentes à esta venda.
     * 
     */
    public function buscaProdutos(){
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM ProdutosVendas pv WHERE pv.VendaID = :id");
        $query->execute(['id' => $this->ID]);


        $this->produtos = [];
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        foreach($results as $result){
            array_push($this->produtos, Produto::load($result->ProdutoID));
        }
    }
    
    

    /**
     * 
     *   Função create
     *   Busca e retorna uma instância de venda.
     * 
     */
    public function create(){
        $db = Database::getInstance();
        $query = $db->prepare("INSERT INTO Vendas VALUES (:ID, :ClienteID, :VendedorID, :LojaID)");
        $query->execute(['ID' => 0,
                         'ClienteID'    => $this->ClienteID,
                         'VendedorID'   => $this->VendedorID,
                         'LojaID'       => $this->LojaID,
                        ]);

        foreach($this->produtos as $produto){
            $query = $db->prepare("INSERT INTO ProdutosVendas pv VALUES (:ID, :VendaID, :ProdutoID)");
            $query->execute(['ID' => 0,
                             'VendaID'      => $this->VendaID,
                             'ProdutoID'    => $produto->ID,
                            ]);

        }
        
        
    }



    /**
     * 
     *   Função remove
     *   Busca e retorna uma instância de venda.
     * 
     */
    public function remove(){
        $db = Database::getInstance();
        
        $query = $db->prepare("DELETE FROM ProdutoVendas WHERE VendaID = :VendaID");
        $query->execute(["VendaID" => $this->ID]);

        $query = $db->prepare("DELETE FROM Vendas WHERE ID = :VendaID");
        $queyr->execute(['VendaID' => $this->ID]);
    }



    /**
     * 
     *   Função update
     *   Busca e retorna uma instância de venda.
     * 
     */
    public function update(){
        $db = Database::getInstance();
         
        $query = $db->prepare(" UPDATE Vendas 
                                SET ClienteID = :ClienteID,
                                    VendedorID = :VendedorID,
                                    LojaID = :LojaID
                                WHERE ID = :VendaID");
        $query->execute([
            'VendaID' => $this->ID,
            'ClienteID' => $this->ClienteID,
            'VendedorID' => $this->VendedorID,
            'LojaID' => $this->LojaID,
        ]);
    }

}