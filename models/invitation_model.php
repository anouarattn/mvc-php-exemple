<?php

class Invitation_model extends Model {

    function __construct() {
         parent::__construct(new PDO('mysql:host=localhost;dbname=pole', 'root', ''));
    }

    
    
    
}
?>
