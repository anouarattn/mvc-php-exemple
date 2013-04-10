<?php
require_once 'libs/Utility.php';
require_once 'libs/Model.php';
require_once 'models/animateur_model.php';
require_once 'libs/objects/animateur_object.php';
class Animateur extends Controller {

    function __construct() {
        parent::__construct();
        $this->view = new View();
    }

    public function add() {
        
        $this->view->render("animateur/add");

        if(isset($_POST['submit'])){
        $cv = Utility::upload("cv_animateur", "libs/uploads/cv/", FALSE, array('pdf', 'doc', 'docx'));
        $picture = Utility::upload("photo_animateur", "libs/uploads/picture/", FALSE, array('png', 'gif', 'jpg', 'jpeg'));
        $contrat= Utility::upload("contrat_animateur", "libs/uploads/contrat/", FALSE, array('pdf', 'doc', 'docx'));

        $anim=new Animateur_object(array(
            ""
            , $_POST["nom_animateur"]
            , $_POST["pnom_animateur"]
            , $_POST["email_animateur"]
            , $_POST["tel_animateur"]
            , $_POST["cin_animateur"]
            , $_POST["ad_animateur"]
            ,$picture[1]
            ,$cv[1]
            , $contrat[1]
            )     
        );
        (new Animateur_model())->add($anim);
        }
        
    }

    public function delete() {
        $this->view->render("animateur/delete");
    }

    public function modify() {
        $this->view->render("animateur/modify");
    }

    public function look() {
        $this->view->render("animateur/look");
  $pp=(new Animateur_model())->getAll("Animateur_object", 'animateur');
        print_r($pp);
    }

    public function index() {
        $this->view->render("animateur/index");
       
       

    }

}
?>

