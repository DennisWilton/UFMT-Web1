<?php

$mode = isset($_POST['id']) ? 'UPD' : 'INS';

$response = new \stdClass();
$response->status = false;
$response->message = '';


switch($mode){
    case 'UPD':
        try {
            $produto = Model\Produto::load($_POST['id']);

            
            if(isset($_POST['Nome']))       $produto->Nome = $_POST['Nome'];
            if(isset($_POST['Quantidade'])) $produto->Quantidade = $_POST['Quantidade'];
            if(isset($_POST['Valor']))      $produto->Valor = $_POST['Valor'];
            if(isset($_POST['Imagem']))     $produto->Imagem = $_POST['Imagem'];

            $produto->update($produto);

            $response->status = true;
            $response->message = 'Produto alterado com sucesso!';
            echo json_encode($response);
        }catch(\Throwable $e){
            $response->message = 'Falha ao tentar editar o produto!';
            echo json_encode($response);
        }
    break;
    case 'INS':
        try {
            $produto = new Model\Produto();
            
            if(isset($_POST['Nome']))       $produto->Nome = $_POST['Nome'];
            if(isset($_POST['Quantidade'])) $produto->Quantidade = $_POST['Quantidade'];
            if(isset($_POST['Valor']))      $produto->Valor = $_POST['Valor'];
            if(isset($_POST['Imagem']))     $produto->Imagem = $_POST['Imagem'];
            
            $produto->insert();

            $response->status = true;
            $response->message = 'Produto alterado com sucesso!';
            echo json_encode($response);
        }catch(\Throwable $e){
            $response->message = 'Falha ao tentar editar o produto!';
            echo json_encode($response);
        }
    break;
}
