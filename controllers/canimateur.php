<?php

class CAnimateur {

    function __construct() {
        echo 'we are in canimateur';
        $this->view=new View();
    }

    public function subpage($subpage='index')
    {
        if(file_exists('views/animateur/'. $subpage .'.php'))
        require 'views/animateur/'. $subpage .'.php';
        else echo 'file views/animateur/'. $subpage .'.php don\'t exist';
        
        
    }
}
?>
