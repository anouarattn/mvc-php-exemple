<?php

class View {

    function __construct() {
        echo 'we are in vies main';
    }
    
    public function render($view_name)
    {
        require 'views'. $view_name .php;
        
    }

}
?>
