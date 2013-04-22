


<fieldset>
<legend><h1>Informations Générales</h1></legend>
            <ul>
                <li>Identifiant: <?php echo $_GET["identifiant"] ?></li>
                <li>Intitulé: <?php echo $_GET["Intitulé"] ?></li>
                <li>Emplacement: <?php echo $_GET["Emplacement"] ?></li>
                <li>Adresse: <?php echo $_GET["Adresse"] ?></li>
                <li>Date debut: <?php echo $_GET["Date-debut"] ?></li>
                <li>Date fin: <?php echo $_GET["Date-fin"] ?></li>
                <li>Type: <?php echo $_GET["type"] ?></li>
                <li><a href="javascript:maps<?php echo $_GET["Plan"] ?>" >Plan d'accées</a> </li>
            </ul>
        
</fieldset>

<fieldset>
<legend><h1>Programme de la Formation</h1></legend>
            
<?php 

if(!isset($_POST["groupe"])){
            echo "<table border=\"1\">";
            $nombre_groupes=count($_POST["donnees"]);
            foreach ($_POST["donnees"] as $key => $value) {
                echo "<tr>";
                echo "<td>";
                echo $key;
                echo "</td>";
                
                echo "<td>";
                echo "<iframe src=\"/mvc_test/formation/agenda\"></iframe>";
                echo "</td>";
                
                echo "</tr>";
                
                
    
}  
                
                
           

echo "</table>";}
else echo "<a href=\"#\">edit </a>";
            
            ?>
        
</fieldset>

<fieldset>
    <legend><h1>Animateurs de la Formatoion</h1></legend>
    <?php 

if(!isset($_POST["animateurs"])){
        echo "<ul>";
        foreach ($_POST["formation_animer_par"] as  $value) {
                echo "<li>";
                echo "<a href=\"\mvc_test/animateur/lookone?identifiant=".$value->getId(). "&Intitulé=".$value->getNom()."&Nom=".$value->getPrenom()."&Prenom=".$value->getPrenom()."&e-mail=".$value->getEmail()."&Telephone=".$value->getTelephone()."&CIN=".$value->getCin()."&Adresse=".$value->getAdresse()."&Photo=".$value->getPhoto()."&CV=".$value->getCv()."&Contrat=".$value->getContrat()."\" >".$value->getNom() ." ". $value->getPrenom()."</a>";
                echo "</li>";  
}
        echo "</ul>";   
} 
else {echo "<a href=\"javascript:add_animateur()\">add</a>";}

?>
</fieldset>

<fieldset>
    <legend><h1>Participants</h1></legend>
</fieldset>
    
</section>
</body>
</html>




<script>
    
function add_animateur(){
       var ok=window.open("add_animateur_to_formation","windows",'width=800,height=500' ); 
    }


</script>