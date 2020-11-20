<?php 

    use App\Config;

    $page->addCss(['pages/pessoas/main', 'pages/pessoas/novo']);
    $page->addScript(['pessoas/novo']);
    $page->activeMenu = 'pessoas';

    $page->setTitle(Config::GET("NOME_PROJETO") . " - Cadastrar pessoa");
?>

<?php include('components/header.php') ?>

<div class="content">
    <div class="aside">
        <?php include("components/asideMenu.php") ?>
    </div>
    <div class="content">
        <div id="erro">Erro: </div>
        <h1 state='selecionado.Nome' class="title">Nova pessoa</h1>
        <a href="<?= Config::LINK("pessoas") ?>" id="cancelar">Cancelar</a>
        <div class="input">
            <label for="Nome">Nome</label>
            <input type="text" name="Nome" id="Nome">
        </div>
        <div class="input">
            <label for="CPF">CPF</label>
            <input type="text" name="CPF" id="CPF">
        </div>
        <div class="input">
            <label for="Sexo">Sexo</label>
            <select id='Sexo'>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
        </div>
        <button onclick="adicionarPessoa()" id="save">Salvar</button>
        
    </div>

    
</div>

<?php include('components/footer.php') ?>
