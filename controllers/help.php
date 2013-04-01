<?php

class Help {

    function __construct() {
        echo 'we are inside help';
    }

    public function other($args = FALSE) {
        echo 'we are inside ohter';
        echo 'optional : ' . $args;
    }

}

?>
