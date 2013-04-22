<?php
require_once 'libs/objects/formation_object.php';


class Anime_formation_model extends Model {

    function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }

     public function get_formation_animateur($id_animateur) {

        $getall = $this->_db->query('SELECT * FROM formation    join anime_formation on formation_idformation=idformation WHERE animateur_idanimateur=' . $id_animateur . ';');
        
         while ($donnees = $getall->fetch(PDO::FETCH_ASSOC)) {
            unset($donnees["formation_idformation"]);
            unset($donnees["animateur_idanimateur"]);

         // print_r($donnees);
            $Object_tab[] = new Formation_object($donnees);
        }
   
       if(isset($Object_tab)) return  $Object_tab;
    }
    
    
    public function get_animateur_formation($id_formation) {

        $getall = $this->_db->query('SELECT * FROM animateur    join anime_formation on animateur_idanimateur=idanimateur WHERE formation_idformation=' . $id_formation . ';');
        //print_r($getall);
         while ($donnees = $getall->fetch(PDO::FETCH_ASSOC)) {
            unset($donnees["formation_idformation"]);
            unset($donnees["animateur_idanimateur"]);

        // print_r($donnees);
            $Object_tab[] = new Animateur_object($donnees);
        }
   
       if(isset($Object_tab)) return  $Object_tab;
    }
}
?>
