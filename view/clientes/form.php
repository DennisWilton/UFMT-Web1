<?php 

    use App\Config;

    $page->setTitle("Página inicial");
    $page->addCss(['pages/clientes/main', 'pages/clientes/novo']);
    $page->addCss(['components/listaPessoas']);
    $page->addScript(['clientes/listaPessoas']);
    $clientes = Model\Pessoa::getAllWithoutClient();

    $page->setTitle(Config::GET("NOME_PROJETO"));
?>

<?php include('components/header.php') ?>

<div class="content">
    <div id="data-pessoas" class="hiddenData"><?= json_encode($clientes) ?></div>
    <div class="aside">
        <a class="item" href="<?= Config::BASE_URL ?>index.php/home">Página Inicial</a>
        <a class="item active" href="<?= Config::BASE_URL ?>index.php/clientes">Clientes</a>
        <a class="item" href="<?= Config::BASE_URL ?>index.php/produtos">Produtos</a>
        <a class="item" href="<?= Config::BASE_URL ?>index.php/vendas">Vendas</a>
    </div>
    <div class="content">
        <h1 state='selecionado.Nome' class="title">Novo cliente</h1>
        <a href="<?= Config::LINK("clientes") ?>" id="cancelar">Cancelar</a>
        <div id="pessoasWrapper">
            <?php include(__DIR__.'/../../components/listaPessoas.php'); ?>
        </div>
        <div id="selecionado">Nome: Selecione uma pessoa</div>
        <div class="input">
            <label for="Codigo">Código</label>
            <input type="text" name="Codigo" id="Codigo">
        </div>
        <button id="save">Salvar</button>
        
    </div>

    
</div>

<?php include('components/footer.php') ?>
