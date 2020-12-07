<?php 

    use App\Config;

    $page->setTitle("Página inicial");
    $page->addCss('pages/home/main');
    $page->addCss('pages/home/main2');
    $page->activeMenu = 'home';

    $categorias = Model\Categoria::getAll();

    $page->setTitle(Config::GET("NOME_PROJETO"));
?>

<?php include('components/header.php') ?>

<div class="content">

    <div class="aside">
        <?php include("components/asideMenu.php") ?>
    </div>
    <div class="content">
        <h1 class="title">Página inicial</h1>
        <p>Este projeto é uma construção básica em pHp puro (sem o uso de frameworks e/ou códigos de terceiros) para demonstrar, na prática, o conteúdo abordado na disciplina de Programação em Ambiente Web I. </p><p>Trata-se de um simples sistema focado na funcionalidade de cadastro de clientes, com algumas implementações de produtos, vendedores, etc.</p>
        <div class="academicos">
        <b>Acadêmicos do grupo:</b>
        <ul>
            <li>Denis Wilton de Paula Azevedo (201811316060)</li>
            <li>Elaine Cristina Aquino Petronilho (201811316050)</li>
            <li>Miguel Morais Paula (201611316009)</li>
        </ul>
        </div>
        <p>Abaixo, segue uma ilustração representativa da modelagem do banco de dados:</p>
        <img src="<?= \App\Config::BASE_URL; ?>static/img/Modelagem DB.jpg" height="525px" alt="">
    </div>

    
</div>

<?php include('components/footer.php') ?>
