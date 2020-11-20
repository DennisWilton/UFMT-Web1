<?php 

    use App\Config;

    $page->setTitle("Página inicial");
    $page->addCss('pages/clientes/main');
    $page->activeMenu = 'pessoas';

    $pessoas = Model\Pessoa::getAll();

    $page->setTitle(Config::GET("NOME_PROJETO") . " - Lista de Pessoas");
?>

<?php include('components/header.php') ?>

<div class="content">

    <div class="aside">
        <?php include("components/asideMenu.php") ?>
    </div>
    <div class="content">
        <h1 class="title">Pessoas</h1>
        <a href="<?= Config::LINK("pessoas/novo") ?>" id="addCliente">Adicionar pessoa</a>
        <table id="clientes">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                <tr>
            </thead>
            <tbody>
                <?php foreach($pessoas as $pessoa): ?>
                <tr>
                    <td><?= $pessoa->Nome ?></td>
                    <td><?= $pessoa->CPF ?></td>
                <tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    
</div>

<?php include('components/footer.php') ?>
