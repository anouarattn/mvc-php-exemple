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
   
       if(isset($Object_tab)) return  $Object_tab;
    }
    
    
       public static function get_culomns_name($table_name) {
        $db_access=new PDO('mysql:host=localhost;dbname=pole', 'root', '');
        $get_decription=$db_access->query('DESCRIBE '.$table_name.';');
        while ($donnees = $get_decription->fetch(PDO::FETCH_BOTH)) {

            $get_columns_name[] = $donnees[0];
        }
        return $get_columns_name;
    }
}

?>
