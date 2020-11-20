<?php 

    use App\Config;
    
    $page->setTitle("Página inicial");
    $page->addCss(['pages/clientes/main', 'pages/clientes/novo']);
    $page->addScript(['clientes/index']);
    $page->activeMenu = 'clientes';
    
    try {
        $cliente = Model\Cliente::load($_GET['id']);
        $page->setTitle(Config::GET("NOME_PROJETO") . ' - Editar cliente');
?>

<?php include('components/header.php') ?>

<div class="content">
    <div id="data-clientes" class="hiddenData"><?= json_encode(Array($cliente)) ?></div>
    <div class="aside">
    <?php include("components/asideMenu.php") ?>
    </div>
    <div class="content">
        <div id="erro">Erro: </div>
        <h1 state='selecionado.Nome' class="title">Editar cliente</h1>
        <a href="<?= Config::LINK("clientes") ?>" id="cancelar">Cancelar</a>
       
        <div class="input"><span>ID: <?= $cliente->ID ?></div>
        <div class="input"><span>Nome: <?= $cliente->Nome ?></span></div>
        <div class="input"><span>CPF: <?= $cliente->CPF ?></span></div>
        <div class="hiddenData">
            <input type="text" id="PessoaID">
        </div>
        <div class="input">
            <label for="Codigo">Código</label>
            <input type="text" value="<?= $cliente->Codigo?>" name="Codigo" id="Codigo">
        </div>
        <button onclick="updateCliente(<?= $cliente->ID ?>)" id="save">Salvar edição</button>
        
    </div>

    
</div>

<?php include('components/footer.php') ?>

<?php } catch(\Throwable $e){ 


} ?>