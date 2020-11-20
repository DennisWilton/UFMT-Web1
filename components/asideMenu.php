<?php

    $menuList = [
        'home' => ['href' => 'home', 'text' => 'Página Inicial'],
        'pessoas' => ['href' => 'pessoas', 'text' => 'Pessoas'],
        'clientes' => ['href' => 'clientes', 'text' => 'Clientes'],
        'produtos' => ['href' => 'produtos', 'text' => 'Produtos'],
        'vendas' => ['href' => 'vendas', 'text' => 'Vendas'],
    ];
    
    foreach($menuList as $index=>$menu):
?>
<a class="item <?= $page->activeMenu == $index ? 'active' : '' ?>" href="<?= App\Config::BASE_URL ?>index.php/<?= $menu['href'] ?>"><?= $menu['text'] ?></a>

<?php endforeach; ?>