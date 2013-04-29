<?php
require_once 'libs/Utility.php';
require_once 'libs/Model.php';
require_once 'models/association_model.php';
require_once 'models/groupe_model.php';
require_once 'models/seance_model.php';

require_once 'libs/objects/association_object.php';
require_once 'libs/objects/groupe_object.php';
require_once 'libs/objects/seance_object.php';

class Association extends Controller {

    function __construct() {
          parent::__construct();
        $this->view = new View();
        
    }
public function add()
{
    
    if (isset($_POST['submit'])) {
        
           
            $association = new Association_object(array(
                ""
                , $_POST["nom_association"]
                , $_POST["ad_association"]
                , $_POST["tel_association"]
                , $_POST["fax_association"]
                ,  $_POST["email_association"]
                , $_POST["president_association"]
                , $_POST["region_association"]    
            ));
       //  print_r($association);
            (new association_model())->add($association);
        }
    
    $this->view->render("association/add");  
}

public function look()
{
    
       $tab_rows = (new association_model())->getAll("association_object", 'association');
        if (isset($tab_rows)) {
            $_POST["noms_column"] = array("identifiant", "Nom", "Adresse", "Télephone","Fax","Email", "Président", "Region");
            $_POST["donnees"] = $tab_rows;
           //print_r($tab_rows);
            // $_POST["type"]="animateur";
            // Utility::grid($tab_rows, array("identifiant", "Nom", "Prenom", "e-mail", "Téléphone", "CIN", "Adresse", "Photo", "CV", "Contrat"),"animateur");}
            $this->view->render("association/look");
        }    
}

public function lookone()
{
     $tab_seance_object=array();
 
    // animateurs
    // $association = (new Association_model())->getAll("Association_object","association");
     if(isset($association))
     {
         
         $_POST["association"]=$association;
        // print_r($_POST["association_animer_par"]);
     }
     else {$_POST["animateurs"]=0;}
    
    
      // print_r($tab_seance_object); 
    $this->view->render("association/lookone");
}

public function agenda()
        
{
    
    $this->view->render("association/agenda");
}

public function add_animateur_to_association()      
{
    $tab_rows = (new Animateur_model())->getAll("Animateur_object", 'animateur');
    //print_r($tab_rows);
    if(isset($tab_rows)){
        $_POST["donnees"]=$tab_rows;
    $this->view->render("association/add_animateur_to_association");
    }
}

 public function delete($id) {

    
         if(intval($id).''==$id){
          (new association_model())->delete("association",$id,'idassociation');}
          else  {echo "Identifiant Non trouvé";}  
         
         $this->look();

    }
    
  

}
?>
