<?php 

    use App\Config;

    $page->setTitle("Página inicial");
    $page->addCss('pages/pessoas/main');
    $page->addScript('pessoas/index');
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
        <div id="data-pessoas" class="hiddenData">
            <?= json_encode($pessoas) ?>
        </div>
        <h1 class="title">Pessoas</h1>
        <a href="<?= Config::LINK("pessoas/novo") ?>" id="addPessoa">Adicionar pessoa</a>
        <table id="pessoas">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th></th>
                <tr>
            </thead>
            <tbody>
                <?php foreach($pessoas as $pessoa): ?>
                <tr>
                    <td><?= $pessoa->Nome ?></td>
                    <td><?= $pessoa->CPF ?></td>
                    <td><button id="editar" onclick="editaPessoa(<?= $pessoa->ID ?>)">Editar</button></td>
                <tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    
</div>

<?php include('components/footer.php') ?>
