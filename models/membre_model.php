<?php

class Membre_model extends Model {

    function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }

     public  function add(Membre_object $membre) {
        $add = $this->_db->prepare('INSERT INTO membre(nmembre,pnmembre,addmembre,telmembre,mailmembre,cinmembre) values(:nom,:prenom,:adresse,:tel,:email,:cin)');

        $add->bindValue(':nom', $membre->getNom());
        $add->bindValue(':prenom', $membre->getPrenom());
        $add->bindValue(':adresse', $membre->getAdresse());
        $add->bindValue(':email', $membre->getEmail());
        $add->bindValue(':tel', $membre->getTelephone());
        $add->bindValue(':cin', $membre->getCin());
        $add->execute();

        
      /*  echo "\nPDOStatement::errorInfo():\n";
        $inserto = $sth->errorInfo();
        print_r($arr);
      
      */
    }
/*
    public function delete(Animateur $anim) {
        // supprime un animateur de la base de données utilisation de la mèthode exec()
        $this->_db->exec('DELETE FROM Animateur WHERE id=' . $anim->getId() . ';');
    }*/

    public function update(Membre_object $membre) {

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
    
   public function get_formation_animateur(){
       
       
       
   }

}

?>
