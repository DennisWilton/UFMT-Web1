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

$cliente = Cliente::load($_POST['ID']);

$cliente->Codigo = $_POST['Codigo'];

$response = $cliente->update();

echo json_encode($response);

