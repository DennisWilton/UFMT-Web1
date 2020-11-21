<?php 


$response = new \stdClass();
$response->status = false;
$response->message = '';

if(!isset($_POST['ID'])){
    $response->message = 'ID Inválido!';
    echo json_encode($response);
    return;
}

try {
    $produto = Model\Produto::load($_POST['ID']);

    $produto->remove();

    $response->status = true;
    $response->message = 'Produto removido com sucesso!';
    echo json_encode($response);
}catch(\Throwable $e){
    $response->message = 'Falha ao tentar remover o produto!';
    echo json_encode($response);
}