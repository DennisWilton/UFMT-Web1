<?php 
namespace Model;

class Cliente extends Pessoa{

    public $Codigo;
    public $PessoaID;


    public static function getAll(){
        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("SELECT * FROM Clientes");
        $query->execute();

        $results = $query->fetchAll(\PDO::FETCH_OBJ);

        $clientes = [];

        foreach($results as $result){
            $cliente = new Cliente();

            $pessoa = \Model\Pessoa::get($result->PessoaID);

            $cliente->PessoaID = $pessoa->ID;
            $cliente->Nome = $pessoa->Nome;
            $cliente->CPF = $pessoa->CPF;
            $cliente->Sexo = $pessoa->Sexo;
            $cliente->Codigo = $result->Codigo;

            array_push($clientes, $cliente);
        }

        return $clientes;
    }
    
}