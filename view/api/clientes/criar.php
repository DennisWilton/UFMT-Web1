<?php 

use Model\Cliente;

$response = new \stdClass();
$response->status = false;

if(!$_POST['Codigo']){
    $response->message = 'Código inválido!';
    echo json_encode($response);
    return;
} 
if(!$_POST['ID']){
    $response->message = 'ID inválido!';
    echo json_encode($response);
    return;
} 

$cliente = new Cliente();

$cliente->Codigo = $_POST['Codigo'];
$cliente->PessoaID = $_POST['ID'];

$response = $cliente->save();

echo json_encode($response);

