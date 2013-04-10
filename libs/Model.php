<?php

class Model {

    public $_db;

    function __construct($_db) {
        $this->_db = $_db;
    }

    public  function getAll($object_type,$table_name) {
        
        //retourne la liste de tous les Object(animateur, association, formation ...) de la base de données
        $getall = $this->_db->query('SELECT * FROM '.$table_name.';');
        while ($donnees = $getall->fetch(PDO::FETCH_ASSOC)) {

            $Object_tab[] = new $object_type($donnees);
        }
   
        return  $Object_tab;
    }

}

?>
