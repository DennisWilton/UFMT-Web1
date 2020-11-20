<?php 

use Model\Pessoa;

$response = new \stdClass();
$response->status = false;

if(!$_POST['Nome']){
    $response->message = 'Nome inválido!';
    echo json_encode($response);
    return;
} 

if(!$_POST['CPF']){
    $response->message = 'CPF inválido!';
    echo json_encode($response);
    return;
} 
 
if(!$_POST['Sexo']){
    $response->message = 'Sexo inválido!';
    echo json_encode($response);
    return;
} 
$pessoa = new Pessoa();

$pessoa->Nome = $_POST['Nome'];
$pessoa->CPF = $_POST['CPF'];
$pessoa->Sexo = $_POST['Sexo'];

$response = $pessoa->save();

echo json_encode($response);

