<?php

require_once 'libs/Utility.php';
require_once 'libs/Model.php';
require_once 'models/animateur_model.php';
require_once 'libs/objects/animateur_object.php';
require_once 'libs/objects/groupe_object.php';

class Model {

    public $_db;

    function __construct($_db) {
        $this->_db = $_db;
    }

    public  function getAll($object_type,$table_name,$where="1" ) {
        
       
        //retourne la liste de tous les Object(animateur, association, formation ...) de la base de données
    
                $getall = $this->_db->query('SELECT * FROM '.$table_name.' WHERE ' .$where. ';');
                
          //   print_r($where);
    
        while ($donnees = $getall->fetch(PDO::FETCH_ASSOC)) {
            
          // print_r($donnees);
            $Object_tab[] = new $object_type($donnees);
        }
   
       if(isset($Object_tab)) return  $Object_tab;
    }
    
    
    public  function getcolomn($table_name,$colomn_name,$where="1=1") {
        
        //retourne la liste de tous les Object(animateur, association, formation ...) de la base de données
         $tab[]=array();
   
        $getall = $this->_db->query("SELECT ".$colomn_name." FROM ".$table_name." WHERE  ".$where." ;");
      //  print_r($this->_db->errorinfo()); 
        
        while ($donnees = $getall->fetch(PDO::FETCH_ASSOC)) {
           print_r($donnees);
            $tab[] = $donnees;
        }
   
       if(isset($tab)) return  $tab;
    }
    
       public static function get_culomns_name($table_name) {
        $db_access=new PDO('mysql:host=localhost;dbname=pole', 'root', '');
        $get_decription=$db_access->query('DESCRIBE '.$table_name.';');
        while ($donnees = $get_decription->fetch(PDO::FETCH_BOTH)) {

            $get_columns_name[] = $donnees[0];
        }
        return $get_columns_name;
    }
    
    public  function delete($table_name,$id,$colomn_name) {
        
        $db_access=new PDO('mysql:host=localhost;dbname=pole', 'root', '');
       $nb= $db_access->exec('DELETE FROM '.$table_name.' WHERE '. $colomn_name .'='.$id.';');
        
      echo print_r($db_access->errorInfo());
    }
}

?>
