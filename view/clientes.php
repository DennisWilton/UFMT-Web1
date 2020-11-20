<?php 

    use App\Config;

    $page->setTitle("Página inicial");
    $page->addCss('pages/clientes/main');
    $page->addScript('clientes/index');
    $page->activeMenu = 'clientes';

    $clientes = Model\Cliente::getAll();

    $page->setTitle(Config::GET("NOME_PROJETO"));
?>

<?php include('components/header.php') ?>

<div class="content">
    <div id="data-clientes" class="hiddenData">
        <?= json_encode($clientes); ?>
    </div>
    <div class="aside">
        <?php include("components/asideMenu.php") ?>
    </div>
    <div class="content">
        <div id="erro"></div>
        <h1 class="title">Clientes</h1>
        <a href="<?= Config::LINK("clientes/form") ?>" id="addCliente">Adicionar cliente</a>
        <table id="clientes">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Código</th>
                    <th>CPF</th>
                    <th></th>
                <tr>
            </thead>
            <tbody>
                <?php foreach($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente->Nome ?></td>
                    <td><?= $cliente->Codigo ?></td>
                    <td><?= $cliente->CPF ?></td>
                    <td><button onclick="removeCliente(<?= $cliente->ID ?>)" id="remove">Remove</button></td>
                <tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    
</div>

<?php include('components/footer.php') ?>
