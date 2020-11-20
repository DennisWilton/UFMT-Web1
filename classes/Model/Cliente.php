<?php 
namespace Model;

class Cliente extends Pessoa{

    public $ID;
    public $Codigo;
    public $PessoaID;

    private function populatePessoa(){
        $pessoa = Pessoa::load($this->PessoaID);
        $this->Nome = $pessoa->Nome;
        $this->CPF = $pessoa->CPF;
        $this->Sexo = $pessoa->Sexo;
    }
    
    public static function getAll(){
        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("SELECT ID FROM Clientes");
        $query->execute();

        $results = $query->fetchAll(\PDO::FETCH_OBJ);

        $clientes = [];

        foreach($results as $result){
            $cliente = Cliente::load($result->ID);
            array_push($clientes, $cliente);
        }

        return $clientes;
    }
    
    public function save(){
        $db = \Database\Database::getInstance();
        $res = new \stdClass();
        $res->status = false;

        try {
            $q = $db->prepare('INSERT INTO Clientes (PessoaID, Codigo) VALUES (?, ?)');
            $q->execute([$this->PessoaID, $this->Codigo]);

            $res->status = true;
            $res->message = "Adicionado com sucesso!";
            return $res;
        } catch(\PDOException $e){
            $res->message = $e.getMessages();
            return $res;
        }
    }

    public function remove(){
        if(!$this->ID) throw new \Error("Cliente sem ID.");
        $db = \Database\Database::getInstance();
        $sql = "DELETE FROM `clientes` WHERE ID = ?"; 
        $query = $db->prepare($sql);
        return $query->execute([$this->ID]);
    }
    
    public static function load($id){
        if(!$id) return;

        $db = \Database\Database::getInstance();
        $q = $db->prepare('
            SELECT * 
            FROM Clientes c 
            WHERE c.ID = ?
        ');
        $q->execute([$id]);
        $result = $q->fetch(\PDO::FETCH_OBJ);

        $cliente = new Cliente();
        $cliente->ID = $result->ID;
        $cliente->Codigo = $result->Codigo;
        $cliente->PessoaID = $result->PessoaID;
        $cliente->populatePessoa();
     
        return $cliente;
    }    

    public function update(){
        $db = \Database\Database::getInstance();
        $res = new \stdClass();
        $res->status = false;

        try {
            $q = $db->prepare('UPDATE Clientes SET Codigo = ? WHERE ID = ?');
            $q->execute([$this->Codigo, $this->ID]);

            $res->status = true;
            $res->message = "Adicionado com sucesso!";
            return $res;
        } catch(\PDOException $e){
            $res->message = $e.getMessages();
            return $res;
        }
    }

}