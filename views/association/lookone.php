


<fieldset>
<legend><h1>Informations Générales</h1></legend>
            <ul>
                <li>Identifiant: <?php echo $_POST["association"][0]->get_id() ?></li>
                <li>Nom: <?php echo $_POST["association"][0]->get_nom() ?></li>
                <li>Adresse: <?php echo $_POST["association"][0]->get_adresse() ?></li>
                <li>Tel: <?php echo $_POST["association"][0]->get_telephone() ?></li>
                <li>Fax: <?php echo $_POST["association"][0]->get_faxe() ?></li>
                <li>Email: <?php echo $_POST["association"][0]->get_email() ?></li>
                <li>Président: <?php echo $_POST["association"][0]->get_president() ?></li>
                <li>Region: <?php echo $_POST["association"][0]->get_region() ?></li>
                <li>Secteur d'activité: <?php echo  substr($_POST["association"][0]->get_secteur(), 0, -1) ?></li>
            </ul>
        
</fieldset>

<fieldset>
<legend><h1>Formations</h1></legend>
            
<?php 

?>
        
</fieldset>

<fieldset>
    <legend><h1>Membres</h1></legend>
    <table border="1" id="table" class="display"> "
        <thead>
    <?php 
    echo "<tr>";
    foreach ($_POST["noms_column"] as $value) {
      echo "<th>";
    echo $value;
    echo "</th>";  
    }
    echo "<th>
    <select id=\"Action\"  onchange=\"operation();\">
    <option value=\"0\">....</option>
  <option value=\"1\">Supprimer</option>
  <option value=\"2\">Modifier</option>
  <option value=\"3\">Imprimer</option>
</select>

</th> ";
echo "<th>" . "Plus" . "</th> ";

    
    echo "</tr>";
    echo  "</thead>";
    echo "<tbody>";
foreach ($_POST["membre"] as $value) {
    echo "<tr> ";
    echo "<td>";
    echo $value->getNom();
    echo "</td>";
     echo "<td>";
    echo $value->getPrenom();
    echo "</td>";
     echo "<td>";
    echo $value->getNom();
    echo "</td>";
       echo "<td>";
       $var="";
       foreach ( $_POST["fonction"] as $valuee) {
           $var.=$valuee;
       }
       echo $var;
    echo "</td>"; 
    echo "<td><input type=\"checkbox\" class=\"checkbox\" value=\"" . $value->getId() . "\" ></td>";
     echo "<td><a href=\"/mvc_test/membre/lookone/" . $value->getId() . "\"  ><img src=\"/mvc_test/libs/uploads/picture/plus.png\"  alt=\"plus\" height= \"40\" width=\"30\" ></a></td>";
}
echo "</tr> ";
echo "</tbody>";

?>
    </table>
</fieldset>


</section>
</body>
</html>




<script>
    
function add_animateur(){
       var ok=window.open("add_animateur_to_formation","windows",'width=800,height=500' ); 
    }


</script>