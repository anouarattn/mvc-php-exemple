<?php

require_once 'libs/Utility.php';
require_once 'libs/Model.php';
require_once 'models/membre_model.php';
require_once 'models/association_model.php';
require_once 'libs/objects/membre_object.php';
require_once 'models/fonction_association_model.php';
require_once 'libs/objects/association_object.php';
require_once 'libs/objects/fonction_association_object.php';

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
                , $_POST["ad_membre"]
                , $_POST["tel_membre"]
                , $_POST["email_membre"]
                , $_POST["cin_membre"]
                , $_POST["pnom_membre"]
                    )
            );
         
            $id_membre=(new Membre_model())->add($membre);
            //print_r($id_membre);
            $fonction=new Fonction_association_object($_POST["fonction_association"],$_POST["association"],$id_membre,$_POST["date_debut_fonction"],"");
       
           // print_r($fonction);
            (new Fonction_association_model)->add($fonction);   
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

    public function modify($id='') {
        
        if(isset($_POST["submit"])){
             $membre = new Membre_object(array(
                $_POST["id_membre"]
                , $_POST["nom_membre"]
                , $_POST["ad_membre"]
                , $_POST["tel_membre"]
                , $_POST["email_membre"]
                , $_POST["cin_membre"]
                , $_POST["pnom_membre"]
                    )
            );
        
            $id_membre=(new Membre_model())->update($membre);
           
            echo '<script>window.opener.location.reload();window.close();</script>';  
        }
        else{
        $_POST["submit"] = (new Membre_model())->getAll("Membre_object", 'membre','idmembre='.$id);
        $this->view->render("membre/modify");}
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

    public function lookone($id_formation,$id_membre) {
        
    $_POST["membre"] = (new Membre_model())->getAll("Membre_object", 'membre',"idmembre=".$id_membre);
    $_POST["fonctions"]=(new Fonction_association_model())->getAll("Fonction_association_object", 'fonction_ass',"membre_idmembre=".$id_membre);
    $_POST["association"]=(new Association_model())->getAll("Association_object", 'association',"idassociation=".$id_formation);

      $this->view->render("membre/lookone");
    }
    

}
?>

