<?php

class Fonction_association_object {

    private $_nom_fonction;
    private $_association_id;
    private $_membre_id;
    private $_date_debut_fonction;
    private $_date_fin_fonction;

    public function get_nom_fonction() {
        return $this->_nom_fonction;
    }

    public function set_nom_fonction($_nom_fonction) {
        $this->_nom_fonction = $_nom_fonction;
    }

    public function get_association_id() {
        return $this->_association_id;
    }

    public function set_association_id($_association_id) {
        $this->_association_id = $_association_id;
    }

    public function get_membre_id() {
        return $this->_membre_id;
    }

    public function set_membre_id($_membre_id) {
        $this->_membre_id = $_membre_id;
    }

    public function get_date_debut_fonction() {
        return $this->_date_debut_fonction;
    }

    public function set_date_debut_fonction($_date_debut_fonction) {
        $this->_date_debut_fonction = $_date_debut_fonction;
    }

    public function get_date_fin_fonction() {
        return $this->_date_fin_fonction;
    }

    public function set_date_fin_fonction($_date_fin_fonction) {
        $this->_date_fin_fonction = $_date_fin_fonction;
    }

    function __construct($_nom_fonction, $_association_id, $_membre_id, $_date_debut_fonction, $_date_fin_fonction) {
     //   echo $_nom_fonction;
        $this->_nom_fonction = $_nom_fonction;
        $this->_association_id = $_association_id;
        $this->_membre_id = $_membre_id;
        $this->_date_debut_fonction = $_date_debut_fonction;
        $this->_date_fin_fonction = $_date_fin_fonction;
    }


}

?>
