


<fieldset>
<legend><h1>Informations Générales</h1></legend>
            <ul>
                <li id="id" value=<?php  echo $_POST["formation"][0]->getId() ?> >Identifiant: <?php echo $_POST["formation"][0]->getId() ?></li>
                <li>Intitulé: <?php echo $_POST["formation"][0]->getIntitule() ?></li>
                <li>Emplacement: <?php echo $_POST["formation"][0]->getEmplacement() ?></li>
                <li>Adresse: <?php echo $_POST["formation"][0]->getAdrsempl() ?></li>
                <li id="date_debut" value="<?php echo $_POST["formation"][0]->getDate_d() ?>" >Date debut: <?php echo $_POST["formation"][0]->getDate_d() ?></li>
                <li>Date fin: <?php echo $_POST["formation"][0]->getDate_f() ?></li>
                <li>Type: <?php echo $_POST["formation"][0]->getType() ?></li>
                <li><a id="plan" href="javascript:maps()" value="<?php echo $_POST["formation"][0]->getPlan() ?>" >Plan d'accées</a> </li>
            </ul>
        
</fieldset>

<fieldset>
<legend><h1>Programme de la Formation</h1></legend>
            
<?php 
if(!isset($_POST["groupe"])){
            echo "<table border=\"1\">";
            $nombre_groupes=count($_POST["donnees"]);
            echo "<tr>";
                echo "<td>";
                echo "//////////////";
                echo "</td>";
                
                echo "<td >";
                echo "<button type=\"button\"   onclick=\"day_before()\" ><<</button><p id=\"jour\"></p><img id=\"suivant\" src=\"/mvc_test/libs/uploads/picture/suivant.png\" alt=\"Smiley face\" height=\"30\" width=\"30\" onclick=\"day_after()\">";
                echo "</td>";
                  echo "</tr>";
                  
                echo "<tr>";
                echo "<th colspan=\"4\">";
                echo "//////////////";
                echo "</th>";
                
                echo "<td>";
                echo "<p>...................... Heure.............................</p>";
                echo "</td>";
               
             
                echo "</tr>";
              
            foreach ($_POST["groupe_name_and_id"] as $key => $value) {
            
                  echo "<tr>";
                echo "<td id=\"".$value."\" class=\"groupe\" >";
                echo $key;
                echo "</td>";
                
                echo "<td>";
                echo "<< ....... jour .........>>";
                echo "</td>";
                      echo "</tr>";
                
                
    
}  
                
                
           

echo "</table>";


echo "<input type=\"submit\" value=\"Ajout Seance\" onclick=\"add_seance()\" />";
echo "<input type=\"submit\" value=\"Ajout Groupe\" onclick=\"add_groupe()\" />";


}
else echo "<a href=\"#\">edit </a>";
            
            
        
echo "</fieldset>";

echo "<fieldset>";
   echo  "<legend><h1>Animateurs de la Formatoion</h1></legend>";


if(!isset($_POST["animateurs"])){
        echo "<ul>";
        foreach ($_POST["formation_animer_par"] as  $value) {
                echo "<li class=".$value->getId().">";
                echo "<a   href=\"\mvc_test/animateur/lookone?identifiant=".$value->getId(). "&Intitulé=".$value->getNom()."&Nom=".$value->getPrenom()."&Prenom=".$value->getPrenom()."&e-mail=".$value->getEmail()."&Telephone=".$value->getTelephone()."&CIN=".$value->getCin()."&Adresse=".$value->getAdresse()."&Photo=".$value->getPhoto()."&CV=".$value->getCv()."&Contrat=".$value->getContrat()."\" >".$value->getNom() ." ". $value->getPrenom()."</a><br/>";
                 echo "<a class=\"delete\" href=\"javascript:delete_animateur(".$value->getId().")\" >   supprimer</a>";
                echo "</li>";  
               

}
        echo "</ul>";   
        echo "<a href=\"javascript:add_animateur()\">add</a>";
        
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


<script src="/mvc_test/libs/js/jquery.js"  ></script>
<script src="/mvc_test/libs/js/date.js"  ></script>
<script>$('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', '/mvc_test/libs/css/formation_lookone.css') );</script>
<script>
    
    
    
    $(document).ready(function(){
       $("#jour").text($("#date_debut").attr("value"));
      
});

  
    
    
    
    function day_before(){
        
               $("#jour").text(Date.parseExact($("#date_debut").attr("value"),"yyyy-MM-dd").addDays(-1).toString("yyyy-MM-dd"));

      
        
        
    }
    
    
    function day_after(){}
    function add_groupe()
    {
        var ok=window.open("/mvc_test/formation/add_groupe_to_formation","windows",'width=800,height=500' ); 
        
    }
    
    
        function add_seance()
    {
        var ok=window.open("/mvc_test/formation/add_seance_to_formation","windows",'width=800,height=500' ); 
        
    }
    
    
    
   
    function maps(){
      
       var ok=window.open("/maps_api/index2.html","windows",'width=800,height=500' ); 
    }
function add_animateur(){
       var ok=window.open("/mvc_test/formation/add_animateur_to_formation","windows",'width=800,height=500' ); 
    }

function delete_animateur(id_animateur){
       var ok=window.open("/mvc_test/formation/delete_animateur_from_formation/"+id_animateur+"/"+document.getElementsByTagName("li")[14].getAttribute("value"),"windows",'width=800,height=500' ); 
     document.getElementsByClassName(id_animateur+"")[0].parentNode.removeChild(document.getElementsByClassName(id_animateur+"")[0]);
      //    document.getElementsByClassName("delete")[0].parentNode.removeChild(document.getElementsByClassName("delete")[0]);

     ok.close();
    }

</script>