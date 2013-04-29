<?php
class Fonction_association_model extends Model {

    function __construct() {
        parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }
    
    public  function add(Fonction_association_object $fonction_association) {
     //   print_r($fonction_association);
        $add = $this->_db->prepare('INSERT INTO fonction_ass(nomfonction_ass,association_idassociation,membre_idmembre,ddebut_fonction) values(:fonction,:id_association,:id_membre,:date_debut_fonction)');
        $add->bindValue(':fonction', $fonction_association->get_nom_fonction());
        $add->bindValue(':id_association', $fonction_association->get_association_id());
        $add->bindValue(':id_membre', $fonction_association->get_membre_id());
        $add->bindValue(':date_debut_fonction', $fonction_association->get_date_debut_fonction());
    
        $add->execute();
        print_r($add->errorinfo());
//print_r($add->errorinfo());
        
      /*  echo "\nPDOStatement::errorInfo():\n";
        $inserto = $sth->errorInfo();
        print_r($arr);
      
      */
    }

}
?>
