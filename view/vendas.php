<?php 

    use App\Config;

    $page->setTitle("Página inicial");
    $page->addCss('pages/vendas/main');
    $page->activeMenu = 'vendas';

    $vendas = Model\Venda::getAll();

    $page->setTitle(Config::GET("NOME_PROJETO") . " - Lista de vendas");
?>

<?php include('components/header.php') ?>

<div class="content">

    <div class="aside">
        <?php include("components/asideMenu.php") ?>
    </div>
    <div class="content">
        <h1 class="title">Vendas</h1>
        <table id="vendas">
            <thead>
                <tr>
                    <th>Comprador</th>
                    <th>Vendedor</th>
                    <th>Produtos</th>
                    <th>Valor total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vendas as $venda): ?>
                    <?php $cliente = Model\Cliente::load($venda->ClienteID) ?>
                    <tr>
                        <td><?= '#' . $cliente->Codigo . ' - ' . $cliente->Nome ?></td>
                        <td><?= $cliente->Nome ?></td>
                        <td>
                        
                            <?php if(!count($venda->produtos)): ?>
                                    <div>
                                        <span>-</span>
                                    </div>
                            <?php endif;
                            $valorTotal = 0; 
                            foreach($venda->produtos as $produto): ?>
                                <div>
                                    <span><?= $produto->Nome; ?></span>
                                </div>
                            <?php $valorTotal += $produto->Valor; endforeach; ?>
                        </td>
                        <td>R$ <?= $valorTotal ?></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

    
</div>

<?php include('components/footer.php') ?>
