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
    
}