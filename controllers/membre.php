<?php

require_once 'libs/Utility.php';
require_once 'libs/Model.php';
require_once 'models/membre_model.php';
require_once 'libs/objects/membre_object.php';
require_once 'libs/objects/association_object.php';

class Membre extends Controller {

    function __construct() {
        parent::__construct();
        $this->view = new View();
    }

    public function add() {



        if (isset($_POST['submit'])) {
           
            $membre = new Membre_object(array(
                ""
                , $_POST["nom_membre"]
                , $_POST["pnom_membre"]
                , $_POST["ad_membre"]
                , $_POST["tel_membre"]
                , $_POST["email_membre"]
                , $_POST["cin_membre"]
                    )
            );
         
            (new Membre_model())->add($membre);
        }
        
         $_POST["tab_of_association_name"]=(new Membre_model())->getAll("Association_object","association");
         
        $this->view->render("membre/add");
    }

    public function delete($id) {

    
         if(intval($id).''==$id){
          (new Membre_model())->delete("membre",$id,'idmembre');}
          else  {echo "Identifiant Non trouvé";}  
         
         $this->look();

    }

    public function modify() {
        $this->view->render("membre/modify");
    }

    public function look() {

        $tab_rows = (new Membre_model())->getAll("Membre_object", 'membre');
        if (isset($tab_rows)) {
            $_POST["noms_column"] = array("identifiant", "Nom", "Prenom", "e-mail", "Telephone", "CIN", "Adresse", "Photo", "CV", "Contrat");
           
            $_POST["donnees"] = $tab_rows;
           
            // $_POST["type"]="membre";
            // Utility::grid($tab_rows, array("identifiant", "Nom", "Prenom", "e-mail", "Téléphone", "CIN", "Adresse", "Photo", "CV", "Contrat"),"membre");}
            $this->view->render("membre/look");
        }
        
    }

    public function index() {
        
    }

    public function lookone() {
        
         $_POST["formation_animer"] = (new Anime_formation_model())->get_formation_membre($_GET["identifiant"]);
         
      $this->view->render("membre/lookone");
    }
    
    

}
?>

