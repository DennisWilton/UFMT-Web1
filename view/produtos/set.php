<?php 

    use App\Config;

    if(isset($_GET['id'])){
        $produto = Model\Produto::load($_GET['id']);
    }

    $page->name = "Produto";
    $page->addCss('pages/produtos/main');
    $page->addCss('components/produto');
    $page->addScript('pages/produtos/main');
    $page->activeMenu = 'produtos';

    $page->setTitle(Config::GET("NOME_PROJETO"));
?>

<?php include('components/header.php') ?>

<div class="content">

    <div class="aside">
        <?php include("components/asideMenu.php") ?>
    </div>
    <div class="content ver novo">
        <h1 class="title"><?= (isset($produto)) ? 'Editar' : 'Novo'  ?> produto</h1>
        <div class="picture">
            <img src="<?= isset($produto) ? $produto->Imagem : '/ufmt/static/img/product-placeholder.png' ?>" alt="">
        </div>
        <div class="info">
            <div><span><b>Nome:</b> <input id="Nome" <?php if(isset($produto)) echo("value='$produto->Nome'") ?>/><span></div>
            <div><span><b>Valor:</b> <input id="Valor" <?php if(isset($produto)) echo("value='$produto->Valor'") ?>/><span></div>
            <div><span><b>Quantidade em estoque:</b> <input id="Quantidade" <?php if(isset($produto)) echo("value='$produto->Quantidade'") ?>/><span></div>
            <div><span><b>URL da imagem:</b> <input id="Imagem" <?php if(isset($produto)) echo("value='$produto->Imagem'") ?>/><span></div>
            <?php if(isset($produto)): ?>
                <div><button onclick="editaProduto(<?= $produto->ID ?>)" class="edit">Salvar modificações</button></div>
                <?php else: ?>
                    <div><button onclick="insereProduto()" class="save">Adicionar produto</button></div>
            <?php endif; ?>
        </div>
    </div>

    
</div>

<?php include('components/footer.php') ?>
