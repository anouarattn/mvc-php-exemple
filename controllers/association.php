<?php
require_once 'libs/Utility.php';
require_once 'libs/Model.php';
require_once 'models/association_model.php';
require_once 'models/groupe_model.php';
require_once 'models/formation_model.php';
require_once 'models/seance_model.php';
require_once 'models/membre_model.php';
require_once 'models/invitation_model.php';
require_once 'models/assiste_model.php';


require_once 'libs/objects/association_object.php';
require_once 'libs/objects/groupe_object.php';
require_once 'libs/objects/invitation_object.php';
require_once 'libs/objects/seance_object.php';
require_once 'libs/objects/formation_object.php';
require_once 'libs/objects/assiste_object.php';


class Association extends Controller {

    function __construct() {
          parent::__construct();
        $this->view = new View();
        
    }
    
    
    public function add_secteur()
    {
          if(isset($_POST["submit"]))
         {
             echo "ok";
             file_put_contents("c://wamp/www/mvc_test/libs/other/secteur_association.txt", "\n".$_POST["secteur_association"], FILE_APPEND );
            // $file=fopen("c://wamp/www/mvc_test/libs/other/fonction_association.txt","r+") or exit("Unable to open file!");
              //fwrite($file,$_POST["fonction"]."\n"); 
               //fclose($file);
             
         }
         $this->view->render("association/add_secteur_association");
        
        
        
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
                    ,$_POST["secteur_association"]
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
            $_POST["noms_column"] = array("Identifiant", "Nom", "Adresse", "Télephone","Fax","Email", "Président", "Region","secteur");
            $_POST["donnees"] = $tab_rows;
           //print_r($tab_rows);
            // $_POST["type"]="animateur";
            // Utility::grid($tab_rows, array("identifiant", "Nom", "Prenom", "e-mail", "Téléphone", "CIN", "Adresse", "Photo", "CV", "Contrat"),"animateur");}
            $this->view->render("association/look");
        }    
}

public function lookone($id)
{
    
    if( isset($id) and intval($id)==$id)
    {
     $_POST["association"]=(new Association_model())->getAll("Association_object","association","idassociation=".$id);
          $temp=(new Membre_model())->get_membre_of_association($id);
       //   print_r($temp);
          $_POST["membre"]=$temp;
       //print_r($temp);
          $_POST["noms_column"]=array("Identifiant","Nom","Prenom");
       //   print_r($_POST["membre"]);
         // print_r($_POST["membre"]);
          $_POST["formation_assiste"]=(new Invitation_model())->getAll("Invitation_object", "invitation","association_idassociation=".$id);
          $formationarray=array();
          if(isset($_POST["formation_assiste"])){
          foreach ($_POST["formation_assiste"] as $key => $value) {
            $formationarray[$key]= (new Formation_model())->getAll("Formation_object","formation","idformation=".$value->get_formationid());
          }
          $_POST["formations"]=$formationarray;}
         //print_r($formation_assiste);
    }
    
    
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
    
    
       public function modify($ids="") {
        
           if (isset($_POST['submit'])) {
               
                $assoc = new Association_object(array(
                $_POST["id_association"]
                , $_POST["nom_association"]
                , $_POST["ad_association"]
                , $_POST["tel_association"]
                , $_POST["fax_association"]
                , $_POST["email_association"]
                , $_POST["president_association"]
                , $_POST["region_association"]
                , $_POST["secteur_association"]
            ));
               
                        (new Association_model())->update($assoc);
   
           }
else {
                $id = explode(",", $ids);
                $where="idassociation=";
                 $where.=$id[0];
                
                
        $_POST["result"]=(new Association_model())->getAll("Association_object", "association",$where);
        $this->view->render("association/modify");
}
        
                        

        
    }
    
    
   public function liste_membres_present_d_formationx($id_association,$id_formation)
   {
    
        $tab_rows = (new Membre_model())->get_membre_of_association($id_association);
        $tab_rows2 = (new Membre_model())->getAll("Groupe_object","groupe","formation_idformation=".$id_formation );

   // print_r($tab_rows);
    if(isset($tab_rows)){
        $_POST["membres"]=$tab_rows;
       // print_r($_POST["membres"]);
    
    }
    if(isset($tab_rows2)){
       
        $_POST["groupes"]=$tab_rows2;
      //   print_r($_POST["groupes"]);
    }
        $this->view->render("association/liste_membres_present_d_formationx");

    
     if(isset($_POST["submit"])){
         foreach ($_POST as $key => $value) {
             if ($key!= "submit" && $key!= "donnees" && $key!="id_formation" ){
                   

                $add=(new Assiste_model())->add(new Anime_formation_object(intval($_POST["id_formation"]),intval($key)));
                 
             } 
                            

             
         }
         
     }
    
       
       
   }
  

}
?>
