<?php

class Animateur extends Controller {

    function __construct() {
        parent::__construct();
        $this->view=new View();
    }

    public function subpage($subpage='index')
    {
        if(file_exists('views/animateur/'. $subpage .'.php'))
            require_once 'views/animateur/'. $subpage .'.php';
        else echo 'chemin  /'. $subpage .' non existant';
        
    }
}
?>
