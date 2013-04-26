<?php

require_once 'libs/Utility.php';
require_once 'libs/Model.php';
require_once 'models/animateur_model.php';
require_once 'models/anime_formation_model.php';
require_once 'libs/objects/animateur_object.php';

class Animateur extends Controller {

    function __construct() {
        parent::__construct();
        $this->view = new View();
    }

    public function add() {



        if (isset($_POST['submit'])) {
            $cv = Utility::upload("cv_animateur", "libs/uploads/animateur/cv/", FALSE, array('pdf', 'doc', 'docx'));
            $picture = Utility::upload("photo_animateur", "libs/uploads/animateur/picture/", FALSE, array('png', 'gif', 'jpg', 'jpeg'));
            $contrat = Utility::upload("contrat_animateur", "libs/uploads/animateur/contrat/", FALSE, array('pdf', 'doc', 'docx'));
            $anim = new Animateur_object(array(
                ""
                , $_POST["nom_animateur"]
                , $_POST["pnom_animateur"]
                , $_POST["ad_animateur"]
                , $_POST["tel_animateur"]
                , $_POST["email_animateur"]
                , $_POST["cin_animateur"]
                , $picture[1]
                , $cv[1]
                , $contrat[1]
                    )
            );
         
            (new Animateur_model())->add($anim);
        }
        $this->view->render("animateur/add");
    }

    public function delete($id) {

    
         if(intval($id).''==$id){
          (new Animateur_model())->delete("animateur",$id,'idanimateur');}
          else  {echo "Identifiant Non trouvé";}  
         
         $this->look();

    }

    public function modify() {
        $this->view->render("animateur/modify");
    }

    public function look() {

        $tab_rows = (new Animateur_model())->getAll("Animateur_object", 'animateur');
        if (isset($tab_rows)) {
            $_POST["noms_column"] = array("identifiant", "Nom", "Prenom", "e-mail", "Telephone", "CIN", "Adresse", "Photo", "CV", "Contrat");
           
            $_POST["donnees"] = $tab_rows;
           
            // $_POST["type"]="animateur";
            // Utility::grid($tab_rows, array("identifiant", "Nom", "Prenom", "e-mail", "Téléphone", "CIN", "Adresse", "Photo", "CV", "Contrat"),"animateur");}
            $this->view->render("animateur/look");
        }
        
    }

    public function index() {
        
    }

    public function lookone() {
        
         $_POST["formation_animer"] = (new Anime_formation_model())->get_formation_animateur($_GET["identifiant"]);
         
      $this->view->render("animateur/lookone");
    }
    
    

}
?>

