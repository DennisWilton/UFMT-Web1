<?php 

    use App\Config;

    $page->setTitle("Página inicial");
    $page->addCss(['pages/clientes/main', 'pages/clientes/novo']);
    $page->addCss(['components/listaPessoas']);
    $page->addScript(['clientes/novo']);
    $page->activeMenu = 'clientes';


    $clientes = Model\Pessoa::getAllWithoutClient();
    $page->setTitle(Config::GET("NOME_PROJETO"));
?>

<?php include('components/header.php') ?>

<div class="content">
    <div id="data-pessoas" class="hiddenData"><?= json_encode($clientes) ?></div>
    <div class="aside">
    <?php include("components/asideMenu.php") ?>
    </div>
    <div class="content">
        <div id="erro">Erro: </div>
        <h1 state='selecionado.Nome' class="title">Novo cliente</h1>
        <a href="<?= Config::LINK("clientes") ?>" id="cancelar">Cancelar</a>
        <p style="margin-bottom: 10px">Para cadastrar um cliente, é necessário selecionar uma pessoa pré-cadastrada:</p>
        <div id="pessoasWrapper">
            <?php include(__DIR__.'/../../components/listaPessoas.php'); ?>
        </div>
        <div class="input"><span>ID: <span state='selecionado.ID'>Selecione uma pessoa</span></span></div>
        <div class="input"><span>Nome: <span state='selecionado.Nome'>Selecione uma pessoa</span></span></div>
        <div class="input"><span>CPF: <span state='selecionado.CPF'>Selecione uma pessoa</span></span></div>
        <div class="hiddenData">
            <input type="text" id="PessoaID">
        </div>
        <div class="input">
            <label for="Codigo">Código</label>
            <input type="text" name="Codigo" id="Codigo">
        </div>
        <button onclick="adicionarCliente()" id="save">Salvar</button>
        
    </div>

    
</div>

<?php include('components/footer.php') ?>
