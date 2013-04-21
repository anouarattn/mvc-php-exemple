


<fieldset>
<legend><h1>Information Générale</h1></legend>
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
    
</section>
</body>
</html>




<script>
function programme(){
 
 var ok=window.open("/maps_api/","windows",'width=800,height=500' );

       
 
          
    }


</script>