<?php

class Association_object extends Object {

    private $_id;
    private $_nom;
    private $_adresse;
    private $_telephone;
    private $_faxe;
    private $_email;
    private $_president;
    private $_region;

  
    public function get_id() {
        return $this->_id;
    }

    public function get_nom() {
        return $this->_nom;
    }

    public function get_adresse() {
        return $this->_adresse;
    }

    public function get_telephone() {
        return $this->_telephone;
    }

    public function get_faxe() {
        return $this->_faxe;
    }

    public function get_email() {
        return $this->_email;
    }

    public function get_president() {
        return $this->_president;
    }

    public function get_region() {
        return $this->_region;
    }

    public function set_id($_id) {
        $this->_id = $_id;
    }

    public function set_nom($_nom) {
        $this->_nom = $_nom;
    }

    public function set_adresse($_adresse) {
        $this->_adresse = $_adresse;
    }

    public function set_telephone($_telephone) {
        $this->_telephone = $_telephone;
    }

    public function set_faxe($_faxe) {
        $this->_faxe = $_faxe;
    }

    public function set_email($_email) {
        $this->_email = $_email;
    }

    public function set_president($_president) {
        $this->_president = $_president;
    }

    public function set_region($_region) {
        $this->_region = $_region;
    }

    function __construct($_id, $_nom, $_adresse, $_telephone, $_faxe, $_email, $_president, $_region) {
        $this->_id = $_id;
        $this->_nom = $_nom;
        $this->_adresse = $_adresse;
        $this->_telephone = $_telephone;
        $this->_faxe = $_faxe;
        $this->_email = $_email;
        $this->_president = $_president;
        $this->_region = $_region;
    }


}

?>
