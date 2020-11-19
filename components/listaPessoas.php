<?php 

    use Model\Pessoa;

    $pessoas = Pessoa::getAllWithoutClient();



?>
<div id="pessoas">
    <?php foreach($pessoas as $pessoa): ?>
        <div onclick='selecionaPessoa(<?= $pessoa->ID ?>)' class="pessoa">
            <?= $pessoa->Nome ?>
        </div>
    <?php endforeach; ?>
    
</div>