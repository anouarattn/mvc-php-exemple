<?php

class Formation_model extends Model {

    function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }

     public  function add(Formation_object $formation) {
       //  print_r($formation);
        $add = $this->_db->prepare('INSERT INTO formation(intiformation,eformation,adeformation,tformation,fformation,dformation,planacces) values(:intitule,:emplacement,:adrempl,:typef,:date_fin,:date_debut,:planacc)');
        $add->bindValue(':intitule', $formation->getIntitule());
        $add->bindValue(':emplacement', $formation->getEmplacement());
        $add->bindValue(':adrempl', $formation->getAdrsempl());
        $add->bindValue(':typef', $formation->getType());
        $add->bindValue(':date_fin', $formation->getDate_f());
        $add->bindValue(':date_debut', $formation->getDate_d());
        $add->bindValue(':planacc', $formation->getPlan());
        $add->execute();
//print_r($add->errorinfo());
        
      /*  echo "\nPDOStatement::errorInfo():\n";
        $inserto = $sth->errorInfo();
        print_r($arr);
      
      */
    }

  

    public function update(Animateur $anim) {

        $inserto = $this->_db->prepare('UPDATE  animateur SET nanimateur=:nom,pranimateur=:prenom,addanimateur=:adresse,mailanimateur=:email,
        telanimateur=:tel,cinanimateur=:cin,photoanimateur=:photo,cvanimateur=:cv,autanimateur=:autre WHERE idanimateur=' . $anim->getId() . ';');



        $inserto->bindValue(':nom', $anim->getNom());
        $inserto->bindValue(':prenom', $anim->getPrenom());
        $inserto->bindValue(':adresse', $anim->getAdresse());
        $inserto->bindValue(':email', $anim->getEmail());
        $inserto->bindValue(':tel', $anim->getTelephone());
        $inserto->bindValue(':cin', $anim->getCin());
        $inserto->bindValue(':photo', $anim->getPhoto());
        $inserto->bindValue(':cv', $anim->getCv());
        $inserto->bindValue(':autre', $anim->getAutre());

        $inserto->execute();
    }

    

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

}
?>
