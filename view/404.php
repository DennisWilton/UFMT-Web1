<?php 
    $page->setTitle("Erro 404");
    $page->addCss('pages/404/main');
?>

<?php include('components/header.php') ?>
<div class="content">
    <h1>Erro 404</h1>
    <a href="<?= \App\Config::BASE_URL; ?>">Clique aqui para voltar à página inicial!</a>
</div>
<?php include('components/footer.php') ?>
