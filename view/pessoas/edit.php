<?php 

    use App\Config;

    if(!isset($_GET['id'])) Header("Location: ".Config::LINK('pessoas'));

    $page->addCss(['pages/pessoas/main', 'pages/pessoas/novo']);
    $page->addScript(['pessoas/index']);
    $page->activeMenu = 'pessoas';

    $page->setTitle(Config::GET("NOME_PROJETO") . " - Editar pessoa");

    $pessoa = Model\Pessoa::load($_GET['id']);
?>

<?php include('components/header.php') ?>

<div class="content">
    <div class="aside">
        <?php include("components/asideMenu.php") ?>
    </div>
    <div class="content">
        <div id="data-pessoas" class="hiddenData"><?= json_encode(Array($pessoa)) ?></div>
        <div id="erro">Erro: </div>
        <h1 state='selecionado.Nome' class="title">Editar pessoa</h1>
        <a href="<?= Config::LINK("pessoas") ?>" id="cancelar">Cancelar</a>
        <div class="input">
            <label for="Nome">Nome</label>
            <input value="<?= $pessoa->Nome ?>" type="text" name="Nome" id="Nome">
        </div>
        <div class="input">
            <label for="CPF">CPF</label>
            <input value="<?= $pessoa->CPF ?>" type="text" name="CPF" id="CPF">
        </div>
        <div class="input">
            <label for="Sexo">Sexo</label>
            <select id='Sexo'>
                <option <?php if($pessoa->Sexo == 'M') echo "selected" ?>value="M">Masculino</option>
                <option <?php if($pessoa->Sexo == 'F') echo "selected" ?> value="F">Feminino</option>
            </select>
        </div>
        <button onclick="updatePessoa(<?= $pessoa->ID ?>)" id="save">Salvar</button>
        
    </div>

    
</div>

<?php include('components/footer.php') ?>
