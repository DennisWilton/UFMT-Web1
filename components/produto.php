<div onclick="goTo('produtos/ver?id=<?= $produto->ID ?>')" class="produto">
    <div class="picture">
        <img  src="<?= $produto->Imagem ?>">
    </div>
    <span class="title"><?= $produto->Nome ?></span>
    <div class="info">
        <span><b>Valor:</b> R$ <?= $produto->Valor ?></span>
        <span><b>Estoque:</b> <?= $produto->Quantidade ?></span>
    </div>
</div>