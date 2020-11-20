<?php 

    use App\Config;

    $page->setTitle("Página inicial");
    $page->addCss('pages/clientes/main');
    $page->addScript('clientes/index');
    $page->activeMenu = 'clientes';

    $clientes = Model\Cliente::getAll();

    usort($clientes, function($a, $b){
        return $a->Codigo - $b->Codigo;
    });

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
                    <th>Código</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th></th>
                <tr>
            </thead>
            <tbody>
                <?php foreach($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente->Codigo ?></td>
                    <td><?= $cliente->Nome ?></td>
                    <td><?= $cliente->CPF ?></td>
                    <td>
                        <button onclick="editaCliente(<?= $cliente->ID ?>)" id="edita">Editar</button>
                        <button onclick="removeCliente(<?= $cliente->ID ?>)" id="remove">Excluir</button>
                    </td>
                <tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    
</div>

<?php include('components/footer.php') ?>
