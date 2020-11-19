<?php 
namespace Sistema;

class Page {
    public $name;
    public $css = ['main'];
    public $js = ['main'];
    
    function setTitle($title){
        $this->title = $title;
    }

    function addCss($css){
        if(is_array($css)){
            $this->css = array_merge($this->css, $css);
        }else{
            array_push($this->css, $css);
        }
    }

    function addScript($js){
        if(is_array($js)){
            $this->js = array_merge($this->js, $js);
        }else{
            array_push($this->js, $js);
        }
    }

    
}