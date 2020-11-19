<?php 
    use Sistema\Router;
    use Database\Database;
    use App\Config;
    use Model\Categoria;
    
    // Autoloader do php.
    spl_autoload_register(function ($class_name) {
        
        $origens = array("classes/$class_name.php");
        
        foreach ($origens as $origem) {
            // echo "<div>$origem</div>";
            if (file_exists($origem)) {
                // echo "<div>EXISTE: $origem</div>";
                require_once $origem;
            } 
        } 
    });
    

    Router::route();
