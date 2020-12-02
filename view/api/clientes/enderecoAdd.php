<?php 

use Model\ClienteEndereco;

$response = new \stdClass();
$response->status = true;
$response->message = "";

$validations = ['ClienteID', 'Estado', 'Cidade', 'Bairro', 'Logradouro', 'Numero', 'Complemento'];

foreach($validations as $val){
    if(!isset($_POST[$val]) || trim($_POST[$val]) == ""){
        $response->status = false;
        $response->message = $response->message . "$val não foi preenchido corretamente.\n";
    }
}

if($response->status) $response->message = 'Everything ok!';

$endereco = new ClienteEndereco();

$endereco->ClienteID = $_POST['ClienteID'];
$endereco->Estado = $_POST['Estado'];
$endereco->Cidade = $_POST['Cidade'];
$endereco->Bairro = $_POST['Bairro'];
$endereco->Logradouro = $_POST['Logradouro'];
$endereco->Numero = $_POST['Numero'];
$endereco->Complemento = $_POST['Complemento'];

try {
    $endereco->create();
    $response->message = "Endereço salvo com sucesso!";
}catch(\Throwable $e){
    $response->status = false;
    $response->message = $e;
}


echo(json_encode($response));