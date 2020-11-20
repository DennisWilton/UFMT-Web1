<?php 

use Model\Pessoa;

$response = new \stdClass();
$response->status = false;

if(!$_POST['ID']){
    $response->message = 'ID inválido!';
    echo json_encode($response);
    return;
} 

$pessoa = Pessoa::load($_POST['ID']);

$pessoa->Nome = $_POST['Nome'];
$pessoa->CPF = $_POST['CPF'];
$pessoa->Sexo = $_POST['Sexo'];

$response = $pessoa->update();

echo json_encode($response);

