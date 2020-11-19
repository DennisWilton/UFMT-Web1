<?php 

    use App\Config;

    $page->setTitle("Página inicial");
    $page->addCss('pages/clientes/main');
    
    $clientes = Model\Cliente::getAll();

    $page->setTitle(Config::GET("NOME_PROJETO"));
?>

<?php include('components/header.php') ?>

<div class="content">

    <div class="aside">
        <a class="item" href="<?= Config::BASE_URL ?>index.php/home">Página Inicial</a>
        <a class="item active" href="<?= Config::BASE_URL ?>index.php/clientes">Clientes</a>
        <a class="item" href="<?= Config::BASE_URL ?>index.php/produtos">Produtos</a>
        <a class="item" href="<?= Config::BASE_URL ?>index.php/vendas">Vendas</a>
    </div>
    <div class="content">
        <h1 class="title">Clientes</h1>
        <a href="<?= Config::LINK("clientes/form") ?>" id="addCliente">Adicionar cliente</a>
        <table id="clientes">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>CPF</th>
                    <th>Nome</th>
                <tr>
            </thead>
            <tbody>
                <?php foreach($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente->Codigo ?></td>
                    <td><?= $cliente->CPF ?></td>
                    <td><?= $cliente->Nome ?></td>
                <tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    
</div>

<?php include('components/footer.php') ?>
