<?php
class Formation extends Controller {

    function __construct() {
          parent::__construct();
        $this->view = new View();
        
    }
public function add()
{
    
    echo "ok";
    $this->view->render("formation/add");
    
    
}
}
?>
