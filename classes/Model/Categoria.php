<?php 
namespace Model;

class Categoria extends Model{

    public $Descricao = 'Sem descrição';
    public $Codigo = -1;

    public function __construct(){
        $options = new \stdClass();
        $options->tabela = 'Categorias';
        parent::__construct($options);        
    }

    public function getById($id = 0, $pkname = 'ID'){
        $categoria = parent::getById($id);
        $this->Descricao = $categoria->Descricao;
        $this->Codigo = $categoria->Codigo;
    }

    public static function getAll(){
        $conn = \Database\Database::getinstance();
        $query = $conn->prepare("SELECT * FROM Categorias");
        $query->execute();

        $results = $query->fetchAll(\PDO::FETCH_OBJ);

        return $results;
    }
    
}