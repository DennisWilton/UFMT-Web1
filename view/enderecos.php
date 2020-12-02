<?php 

    use App\Config;

    if(!isset($_GET['cliente']) || $_GET['cliente'] <= 0) header('Location: ' . Config::LINK("clientes"));

    $page->setTitle("Endereços");
    $page->addCss('pages/clientes/main');
    $page->addScript('clientes/index');
    $page->activeMenu = 'clientes';

    $cliente = Model\Cliente::load($_GET['cliente']);

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
        <h1 class="title">Endereços de <?= $cliente->Nome ?></h1>
        <a href="<?= Config::LINK("enderecos/add?cliente=".$cliente->ID) ?>" id="addCliente">Adicionar endereço</a>
        <table id="clientes">
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Logradouro</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th></th>
                <tr>
            </thead>
            <?php if(count($cliente->enderecos) == 0): ?>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Não há registros</td>
                    <td></td>
                    <td></td>
                    <td>
                    </td>
                <tr>
            </tbody>
            <?php else: ?>
            <tbody>
                <?php foreach($cliente->enderecos as $endereco): ?>
                <tr>
                    <td><?= $endereco->Estado ?></td>
                    <td><?= $endereco->Cidade ?></td>
                    <td><?= $endereco->Bairro ?></td>
                    <td><?= $endereco->Logradouro ?></td>
                    <td><?= $endereco->Numero ?></td>
                    <td><?= $endereco->Complemento ?></td>
                    <td>
                        <button onclick="editaCliente(<?= $endereco->ID ?>)" id="edita">Editar</button>
                        <button onclick="removeCliente(<?= $endereco->ID ?>)" id="remove">Excluir</button>
                    </td>
                <tr>
                <?php endforeach; ?>
            </tbody>
                <?php endif; ?>
        </table>
    </div>

    
</div>

<?php include('components/footer.php') ?>
