<?php 
namespace Model;

class Pessoa extends Model{

    public $ID;
    public $Nome;
    public $CPF;
    public $Sexo;

    public function __construct(){
        $options = new \stdClass();
        $options->tabela = 'Pessoas';
        parent::__construct($options);        
    }

    public function isCliente(){
        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("SELECT * FROM Pessoas p INNER JOIN Clientes c ON c.PessoaID = p.ID WHERE p.ID = ?");
        $query->execute([$this->ID]);

        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        If(count($result) > 0) return true;
        return false;
    }
    
    public static function load($id){
        if(!$id) throw new Error("É necessário passar o ID!");

        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("SELECT * FROM Pessoas WHERE ID = ?");
        $query->execute([$id]);

        $result = $query->fetch(\PDO::FETCH_OBJ);

        $pessoa = new Pessoa();
        
        $pessoa->ID = $result->ID;
        $pessoa->Nome = $result->Nome;
        $pessoa->CPF = $result->CPF;
        $pessoa->Sexo = $result->Sexo;

        return $pessoa;
    }
    
    public static function get($id){
        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("SELECT * FROM Pessoas WHERE ID = ?");
        $query->execute([$id]);

        $pessoa = $query->fetch(\PDO::FETCH_OBJ);
        return $pessoa;
    }
    
    public static function getAll(){
        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("SELECT * FROM Pessoas");
        $query->execute();

        $results = $query->fetchAll(\PDO::FETCH_OBJ);
        $pessoas = [];
        foreach($results as $result){
            $pessoa = new Pessoa();
            $pessoa->ID = $result->ID;
            $pessoa->Nome = $result->Nome;
            $pessoa->CPF = $result->CPF;
            $pessoa->Sexo = $result->Sexo;

            array_push($pessoas, $pessoa);
        }

        return $pessoas;
    }
    
    public static function getAllWithoutClient(){
        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("SELECT p.* FROM Pessoas p LEFT JOIN Clientes c ON c.PessoaID = p.ID WHERE c.PessoaID is NULL");
        $query->execute();

        $results = $query->fetchAll(\PDO::FETCH_OBJ);
        $pessoas = [];
        foreach($results as $result){
            $pessoa = new Pessoa();
            $pessoa->ID = $result->ID;
            $pessoa->Nome = $result->Nome;
            $pessoa->CPF = $result->CPF;
            $pessoa->Sexo = $result->Sexo;

            // print_r($result);

            array_push($pessoas, $pessoa);
        }

        return $pessoas;
    }
    
    public function save(){
        $db = \Database\Database::getInstance();
        $res = new \stdClass();
        $res->status = false;

        try {
            
            if(!$this->Nome 
            || !$this->CPF 
            || !$this->Sexo) 
            throw new \PDOException('Favor, preencher completamente todos os campos!');

            $q = $db->prepare('INSERT INTO Pessoas (Nome, CPF, Sexo) VALUES (?, ?, ?)');
            $q->execute([$this->Nome, $this->CPF, $this->Sexo]);

            $res->status = true;
            $res->message = "Adicionado com sucesso!";
            return $res;
        } catch(\PDOException $e){
            $res->message = $e.getMessages();
            return $res;
        }
    }

    public function update(){
        $db = \Database\Database::getInstance();
        $res = new \stdClass();
        $res->status = false;
        
        try {
           
            $q = $db->prepare('UPDATE Pessoas SET Nome = :nome, CPF = :cpf, Sexo = :sexo WHERE ID = :id');
            $q->execute(['nome' => $this->Nome,
                         'cpf' => $this->CPF,
                         'sexo' => $this->Sexo,
                         'id' => $this->ID
                        ]);

            $res->status = true;
            $res->message = "Atualizado com sucesso!";
            return $res;
        } catch(\PDOException $e){
            $res->message = $e.getMessages();
            return $res;
        }
    }
}