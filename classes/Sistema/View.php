<?php
namespace Sistema;

use Exception;

class View {

    public static function render($name){
        $page = new Page();
        if( count($name) > 1 ){

            $path = 'view';
            
            foreach($name as $n){
                $path .= '/'.$n;
            }
            
            $path .= '.php';
            
            try {
                if(!file_exists($path)) throw new Exception();
                include($path);
            }catch(Exception $e){
                include('view/404.php');
            }

        }else{
            @$name = $name[0];
            if($name == '') $name = 'home';
            try {
                if(!file_exists('view/'.$name.'.php')) throw new Exception();
                include('view/'.$name.'.php');
            }catch(Exception $e){
                include('view/404.php');
            }
        }
    }
}