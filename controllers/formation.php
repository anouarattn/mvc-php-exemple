<?php
require_once 'libs/Utility.php';
require_once 'libs/Model.php';
require_once 'models/formation_model.php';
require_once 'models/anime_formation_model.php';
require_once 'models/groupe_model.php';
require_once 'models/seance_model.php';
require_once 'models/anime_formation_model.php';

require_once 'libs/objects/formation_object.php';
require_once 'libs/objects/groupe_object.php';
require_once 'libs/objects/seance_object.php';
require_once 'libs/objects/anime_formation_object.php';
class Formation extends Controller {

    function __construct() {
          parent::__construct();
        $this->view = new View();
        
    }
public function add()
{
    
    if (isset($_POST['submit'])) {
        
           
            $formation = new Formation_object(array(
                ""
                , $_POST["nom_formation"]
                , $_POST["lieu_formation"]
                , $_POST["adresse_lieu_formation"]
                , $_POST["formation_type"]
                , $_POST["date_fin_formation"]
                ,  $_POST["date_debut_formation"]
                , $_POST["plan_accees"]
                    )
            );
       //  print_r($formation);
            (new Formation_model())->add($formation);
        }
    
    $this->view->render("formation/add");  
}

public function look()
{
    
       $tab_rows = (new Formation_model())->getAll("Formation_object", 'formation');
        if (isset($tab_rows)) {
            $_POST["noms_column"] = array("identifiant", "Intitulé", "Emplacement", "Adresse", "Date-debut", "Date-fin", "type", "Plan");
            $_POST["donnees"] = $tab_rows;
           //print_r($tab_rows);
            // $_POST["type"]="animateur";
            // Utility::grid($tab_rows, array("identifiant", "Nom", "Prenom", "e-mail", "Téléphone", "CIN", "Adresse", "Photo", "CV", "Contrat"),"animateur");}
            $this->view->render("formation/look");
        }    
}

public function lookone()
{
     $tab_seance_object=array();
    $tab_groupe_objects = (new Groupe_model())->getAll("Groupe_object", 'groupe',"formation_idformation=".$_GET["identifiant"]);
    if(isset($tab_groupe_objects))
    {
       
        foreach ($tab_groupe_objects as $value) {
           // print_r($value->getId());
            // un tableau associatif pour chaque groupe id il donne un tableau d'objet seance
            $tab_seances_object["".$value->getNom()]=(new Sceance_model())->getAll("Seance_object", 'seance',"groupe_idgroupe=".$value->getId());
           // print_r( $tab_seances_object["".$value->getId()]);
        }
      //  print_r($tab_seance_object); 
       $_POST["donnees"]=$tab_seances_object;
    }  
     
    else {$_POST["groupe"]=0;}
    
   
    
    // animateurs
     $formation_animateur = (new Anime_formation_model())->get_animateur_formation($_GET["identifiant"]);
     if(isset($formation_animateur))
     {
         
         $_POST["formation_animer_par"]=$formation_animateur;
        // print_r($_POST["formation_animer_par"]);
     }
     else {$_POST["animateurs"]=0;}
    
    
      // print_r($tab_seance_object); 
    $this->view->render("formation/lookone");
}

public function agenda()
        
{
    
    $this->view->render("formation/agenda");
}

public function add_animateur_to_formation()      
{
    $tab_rows = (new Animateur_model())->getAll("Animateur_object", 'animateur');
    //print_r($tab_rows);
    if(isset($tab_rows)){
        $_POST["donnees"]=$tab_rows;
    $this->view->render("formation/add_animateur_to_formation");
    }
    
     if(isset($_POST["submit"])){
         foreach ($_POST as $key => $value) {
             if ($key!= "submit" && $key!= "donnees" && $key!="id_formation" ){
                   

                $add=(new Anime_formation_model())->add(new Anime_formation_object(intval($_POST["id_formation"]),intval($key)));
                 
             } 
                            

             
         }
         
     }
    
    
}

public function delete_animateur_from_formation($id_animateur,$id_formation){
    (new Anime_formation_model())->delete_animateur_from_formation($id_animateur,$id_formation);
    
}

 public function delete($id) {

    
         if(intval($id).''==$id){
          (new Formation_model())->delete("formation",$id,'idformation');}
          else  {echo "Identifiant Non trouvé";}  
         
         $this->look();

    }
    
    public function modify($ids="") {
        
           if (isset($_POST['submit'])) {
               
                $formation = new Formation_object(array(
                  $_POST["id_formation"]
                , $_POST["intitule_formation"]
                , $_POST["lieu_formation"]
                , $_POST["adresse_lieu_formation"]
                        , $_POST["type_formation"]
                , $_POST["date_debut__formation"]
                , $_POST["date_fin_formation"]
                
                , ""
                    )
            );
               
                        (new Formation_model())->update($formation);
   
           }
else  {
                $id = explode(",", $ids);
                $where="idformation=";
                 $where.=$id[0];
                
                
        $_POST["result"]=(new Formation_model())->getAll("Formation_object", "formation",$where);
}
        
                        $this->view->render("formation/modify");

        
    }


}
?>
