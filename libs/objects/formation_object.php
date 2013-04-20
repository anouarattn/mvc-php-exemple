<?php


class Formation_object extends Object {

    private $_id;
    private $_intitule;
    private $_emplacement;
    private $_adrsempl;
    private $_date_d;
    private $_date_f;
    private $_type;


    public function __construct(array $entrees) {
        
        
        $this->hydrate($entrees);
    }

//getter
    public function getId() {
        return $this->_id;
    }

    public function getIntitule() {
        return $this->_intitule;
    }

    public function getEmplacement() {
        return $this->_emplacement;
    }

    public function getAdrsempl() {
        return $this->_adrsempl;
    }

    public function getDate_d() {
        return $this->date_d;
    }

    public function getDate_f() {
        return $this->_date_f;
    }

    public function getType() {
        return $this->_type;
    }

 
  
   

//setter
    public function setId($id) { // l'id doit être un entier
        $this->_id = (int) $id;
    }

    public function setIntitule($intitule) {
// on véréfie que la variable $nom est de type string et qu'elle est de longueur inférieur ou égale  a 40
//(la longueur de la colonne nom dans la base de données)
        if (is_string($intitule) && strlen($intitule) < 41) {
            $this->_intitule = $intitule;
        }
    }

    public function setEmplacement($emplacement) {
// on véréfie que la variable $email est de type string et qu'elle est de longueur inférieur ou égale a 50
//(la longueur de la colonne email dans la base de données)
        if (is_string($emplacement) && strlen($emplacement) < 51) {
            $this->_emplacement = $emplacement;
        }
    }

    public function setAdrsempl($adrsempl) {
// on véréfie que la variable $email est de type string et qu'elle est de longueur inférieur ou égale a 20
//(la longueur de la colonne telephone dans la base de données)
        if (is_string($adrsempl) && strlen($adrsempl) < 21) {
            $this->_adrsempl = $adrsempl;
        }
    }

    public function setDate_d($date_d) {
// on véréfie que la variable $cin est de type string et qu'elle est de longueur inférieur ou égale a 10
//(la longueur de la colonne cin dans la base de données)
        if (is_string($date_d) && strlen($date_d) < 11) {
            $this->_date_d = $date_d;
        }
    }

    public function setDate_f($date_f) {
// on véréfie que la variable $photo est de type string et qu'elle est de longueur inférieur ou égale a 101
//(la longueur de la colonne photo(URL de la photo) dans la base de données)
        if (is_string($date_f) && strlen($date_f) < 101) {
            $this->_date_f = $date_f;
        }
    }

    public function setType($type) {
// on véréfie que la variable $cv est de type string et qu'elle est de longueur inférieur ou égale a 101
//(la longueur de la colonne cv(URL de du cv) dans la base de données)
        if (is_string($type) && strlen($type) < 101) {
            $this->_type = $type;
        }
    }
    
   

    public function hydrate(array $entrees) {
//cette methode va copie chaque champ du tableau associatif entrees dans le champ corespondant de la classe animateur
// la fonction ucfirst() retourne la chaine $key mais avec la premier lettre en majiscule comme ça en respecte le nom des méthodes setter	
        
        $i = 0;
        $tab_attributs = array('Id', 'Intitule', 'Emplacement', 'Adrsempl', 'Date_d', 'Date_f','Type');
        foreach ($entrees as $value) {
            $method = 'set' . $tab_attributs[$i++];
            $this->$method($value);
        }
    }

    public function  get_getter(){
           static $j=0;
        $tab_attributs = array('Id', 'Intitule', 'Emplacement', 'Adrsempl', 'Date_d', 'Date_f','Type');
        if($j<10){
        $getter='get'.$tab_attributs[$j++];
        return $this->$getter();}
        else $j=0;return $this->get_getter();
    }


}
?>
