<?php 

    use App\Config;

    if(!$_GET['id']) Header("Location: ".Config::LINK("produtos"));

    $page->name = "Produto";
    $page->addCss('pages/produtos/main');
    $page->addCss('components/produto');
    $page->addScript('pages/produtos/main');
    $page->activeMenu = 'produtos';

    $produto = Model\Produto::load($_GET['id']);

    $page->setTitle(Config::GET("NOME_PROJETO"));
?>

<?php include('components/header.php') ?>

<div class="content">

    <div class="aside">
        <?php include("components/asideMenu.php") ?>
    </div>
    <div class="content ver">
        <h1 class="title"><?= $produto->Nome ?></h1>
        <div class="picture">
            <img src="<?= $produto->Imagem?>" alt="">
        </div>
        <div class="info">
            <div><span><b>Nome:</b> <?= $produto->Nome ?></span></div>
            <div><span><b>Valor:</b> R$ <?= $produto->Valor ?></span></div>
            <div><span><b>Quantidade em estoque:</b> <?= $produto->Quantidade ?></span></div>
            <div><button class="excluir">Remover produto</button></div>
        </div>
    </div>

    
</div>

<?php include('components/footer.php') ?>
