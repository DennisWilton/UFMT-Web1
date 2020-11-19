<div class="footer">
    <div>
        <span>
        <small>
            <?=App\Config::GET('NOME_PROJETO'); ?>
        </small>
        Trabalho da UFMT - Programação em ambiente Web I.</span>
    </div>
</div>
    <?php foreach($page->js as $js){ ?>
        <script src="<?= App\Config::BASE_URL ?>static/js/<?=$js?>.js"></script>
    <?php } ?>
    </body>
</html>