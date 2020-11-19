<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page->title ?></title>
    <?php foreach($page->css as $css){ ?>
        <link rel="stylesheet" href="<?= App\Config::BASE_URL ?>static/css/<?=$css?>.css">
    <?php } ?>
</head>
<body>
    
    <?php include(__DIR__.'/navbar.php'); ?>