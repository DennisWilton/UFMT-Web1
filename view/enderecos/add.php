<?php 

    use App\Config;

    $page->setTitle("Página inicial");
    $page->addCss(['pages/clientes/main', 'pages/clientes/novo']);
    $page->addCss(['components/listaPessoas']);
    $page->addScript(['enderecos/main']);
    $page->activeMenu = 'clientes';

    $cliente = Model\Cliente::load($_GET['cliente']);

    $page->setTitle(Config::GET("NOME_PROJETO") . " - Adicionar Endereço");
?>

<?php include('components/header.php') ?>

<div class="content">
    <div id="data-pessoas" class="hiddenData"><?= json_encode($clientes) ?></div>
    <div class="aside">
    <?php include("components/asideMenu.php") ?>
    </div>
    <div class="content">
        <div id="erro">Erro: </div>
        <h1 state='selecionado.Nome' class="title">Adicionar endereço</h1>
        <a href="<?= Config::LINK("enderecos?cliente=".$_GET['cliente']) ?>" id="cancelar">Cancelar</a>
        <p style="margin-bottom: 10px"><?= $cliente->Nome ?></p>
        
        <!-- Estado -->
        <div class="input">
            <label for="Estado">Estado</label>
            <input type="text" name="Estado" id="Estado">
        </div>
        
        <!-- Cidade -->
        <div class="input">
            <label for="Cidade">Cidade</label>
            <input type="text" name="Cidade" id="Cidade">
        </div>
        
        <!-- Bairro -->
        <div class="input">
            <label for="Bairro">Bairro</label>
            <input type="text" name="Bairro" id="Bairro">
        </div>
        
        <!-- Logradouro -->
        <div class="input">
            <label for="Logradouro">Logradouro</label>
            <input type="text" name="Logradouro" id="Logradouro">
        </div>
        
        <!-- Número -->
        <div class="input">
            <label for="Numero">Número</label>
            <input type="text" pattern="number" name="Numero" id="Numero">
        </div>
        
        <!-- Complemento -->
        <div class="input">
            <label for="Complemento">Complemento</label>
            <input type="text" name="Complemento" id="Complemento">
        </div>


        <button onclick="adicionarEndereco(<?= $_GET['cliente'] ?>)" id="save">Salvar</button>
        
    </div>

    
</div>

<?php include('components/footer.php') ?>
