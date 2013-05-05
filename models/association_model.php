<?php

class Association_model extends Model {

   function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }
    
    public  function add(Association_object $association) {
        $add = $this->_db->prepare('INSERT INTO association(nassociation,adassociation,telassociation,	
faxeassociation,mailassociaiton,prassociation,rassociation,secactivite) values(:nom,:adresse,:tel,:fax,:email,:president,:region,:secteur)');

        $add->bindValue(':nom', $association->get_nom());
        $add->bindValue(':adresse', $association->get_adresse());
        $add->bindValue(':email', $association->get_email());
        $add->bindValue(':tel', $association->get_telephone());
        $add->bindValue(':fax', $association->get_faxe());
        $add->bindValue(':president', $association->get_president());
        $add->bindValue(':region', $association->get_region());
        $add->bindValue(':secteur', $association->get_secteur());
        $add->execute();

        
      /*  echo "\nPDOStatement::errorInfo():\n";
        $inserto = $sth->errorInfo();
        print_r($arr);
      
      */
    }
    
    

}
?>
