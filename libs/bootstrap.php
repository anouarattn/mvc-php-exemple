<?php

class Bootstrap {

    function __construct() {

        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');

            $url = explode('/', $url);
            //print_r($url);

            if (file_exists($file = 'controllers/' . $url[0] . '.php')) {
                require $file;

                $controllers = new $url[0];

                if (isset($url[2]))
                    $controllers->{$url[1]}($url[2]);
                elseif (isset($url[1]) AND method_exists($controllers, $url[1]))
                    $controllers->{$url[1]}();
                else {
                    echo "methode non existante";
                }
            } else {
                echo "fichier non existant(cpntrollers)";
            }
        }
    }

}

?>
