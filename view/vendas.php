<?php 

    use App\Config;

    $page->setTitle("Página inicial");
    $page->addCss('pages/home/main');
    $page->activeMenu = 'vendas';

    $page->setTitle(Config::GET("NOME_PROJETO"));
?>

<?php include('components/header.php') ?>

<div class="content">

    <div class="aside">
        <?php include("components/asideMenu.php") ?>
    </div>
    <div class="content">
        <h1>Vendas</h1>
        <p>Bem-vindo!</p>
    </div>

    
</div>

<?php include('components/footer.php') ?>
