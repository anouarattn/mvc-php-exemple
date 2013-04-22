<?php


echo "<ul>";
foreach ($_POST["donnees"] as $value) {
    echo "<li>";
    echo "<input type=\"checkbox\" name=\"".$value->getId()."\" id=\"".$value->getId()."\" value=\"\" \">";  
    echo "<label for=\"".$value->getId()."\">[".$value->getId()."] ".$value->getNom()." ".$value->getPrenom()."</label>"; 
    
    echo "</li>";
}
    echo "</ul>";
?>
</section>
</body>
</html>

<script>
    document.getElementById("fofo").parentNode.removeChild(document.getElementById("fofo"));
    </script>