<?php

class Association_model extends Model {

   function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }
    
    public  function add(Association_object $association) {
        $add = $this->_db->prepare('INSERT INTO association(nassociation,adassociation,telassociation,	
faxeassociation,mailassociaiton,prassociation,rassociation) values(:nom,:adresse,:tel,:fax,:email,:president,:region)');

        $add->bindValue(':nom', $association->get_nom());
        $add->bindValue(':adresse', $association->get_adresse());
        $add->bindValue(':email', $association->get_email());
        $add->bindValue(':tel', $association->get_telephone());
        $add->bindValue(':fax', $association->get_faxe());
        $add->bindValue(':photo', $association->getPhoto());
        $add->bindValue(':cv', $association->getCv());
        $add->bindValue(':contrat', $association->getContrat());
        $add->execute();

        
      /*  echo "\nPDOStatement::errorInfo():\n";
        $inserto = $sth->errorInfo();
        print_r($arr);
      
      */
    }

}
?>
