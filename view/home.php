<?php 

    use App\Config;

    $page->setTitle("Página inicial");
    $page->addCss('pages/home/main');
    
    $categorias = Model\Categoria::getAll();

    $page->setTitle(Config::GET("NOME_PROJETO"));
?>

<?php include('components/header.php') ?>

<div class="content">

    <div class="aside">
        <a class="item active" href="<?= Config::BASE_URL ?>index.php/home">Página Inicial</a>
        <a class="item" href="<?= Config::BASE_URL ?>index.php/clientes">Clientes</a>
        <a class="item" href="<?= Config::BASE_URL ?>index.php/produtos">Produtos</a>
        <a class="item" href="<?= Config::BASE_URL ?>index.php/vendas">Vendas</a>
    </div>
    <div class="content">
        <h1>Página inicial</h1>
        <p>Bem-vindo!</p>
    </div>

    
</div>

<?php include('components/footer.php') ?>
