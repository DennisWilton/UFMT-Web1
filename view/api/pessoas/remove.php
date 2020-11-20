<?php 

use Model\Pessoa;

$response = new \stdClass();
$response->status = false;

if(!isset($_POST['ID'])){
    $response->message = 'ID inválido!';
    echo json_encode($response);
    return;
}

try {
    $pessoa = Pessoa::load($_POST['ID']);
    
    $result = $pessoa->remove();

    if($result){
        $response->status = true;
        $response->message = 'Pessoa removida com sucesso!';
    }
    
    echo json_encode($response);
}catch(\Throwable $e){
    $response->status = false;
    $response->message = "Falha ao remover a pessoa:\n > " . $e->getMessage();

    echo json_encode($response);
}

