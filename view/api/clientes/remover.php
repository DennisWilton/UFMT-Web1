<?php 

use Model\Cliente;

$response = new \stdClass();
$response->status = false;

if(!isset($_POST['ID'])){
    $response->message = 'Código inválido!';
    echo json_encode($response);
    return;
}
try {
    $cliente = Cliente::load($_POST['ID']);
    
    $result = $cliente->remove();

    if($result){
        $response->status = true;
        $response->message = 'Cliente removido com sucesso!';
    }
    
    echo json_encode($response);
}catch(\Throwable $e){
    $response->status = false;
    $response->message = "Falha ao remover o cliente:\n > " . $e->getMessage();

    echo json_encode($response);
}

