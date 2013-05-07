<input type="text" id="input"  onkeydown="changed()" >
<select id="search" >
    <option value="...">...</option>
    <option value="Nom">Nom</option>
    <option value="Adresse">Adresse</option>
     <option value="Region">Region</option>
      <option value="secteur">secteur</option>
    <option value="id">Id</option>
</select>


<?php

$size2 = count($_POST["noms_column"]);
echo "<br/><br/>";
echo "<article>";
echo "<fieldset>";
echo "<legend><h1>Liste des Formations</h1></legend>";
echo "<table border=\"1\"> ";



echo "<tr  > ";
for ($j = 0; $j < $size2; $j++) {

    echo "<th>" . $_POST["noms_column"][$j] . "</th> ";
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

echo "</tr> ";



$gett = '';

foreach ($_POST["donnees"] as $object) {
    $i = 0;
 
    echo "<tr> ";
    $id_val;
    while ($i < $size2) {
        
        $temp = $object->get_getter();
        if($i==0) {$id_val=$temp;}
      
            echo   "<td class=\"".$_POST["noms_column"][$i]."\">" . $temp . "</td>"; 
        $i++;
        
    }
 echo "<td><input type=\"checkbox\" class=\"checkbox\" value=\"" . $id_val . "\" ></td>";
     echo "<td><a href=\"/mvc_test/association/lookone/" . $id_val . "\"  ><img src=\"/mvc_test/libs/uploads/picture/plus.png\"  alt=\"plus\" height= \"40\" width=\"30\" ></a></td>";



    echo "</tr> ";
}

echo "</table>";
echo "</fieldset>";
echo "</article>";
?>
<script src="/mvc_test/libs/js/jquery.js"  ></script>

<script>
    
    function confirmm(a,b){
        
      var r=confirm("Clique Sur OK pour Confirmer votre choix?");
     if (r==true)
  {
         window.location="/mvc_test/association/delete/"  + a  ;
 // this.href=\"/mvc_test/animateur/delete/" . $_POST["id"] ."\" ;
  }
          
    }

function changed()
    {
  
        if($("select#search").val() == "Nom"){
            
            var i = 1;
        var x = document.getElementsByTagName("tr");
        var sel = document.getElementsByTagName("input")[0].value.toString();
        var re = new RegExp(sel, "i");
        while (i < x.length) {

            var y = x[i].getElementsByClassName("Nom")[0];

            var b = y.innerHTML.search(re);

            if (b !== 0) {
                x[i].setAttribute("hidden");
            }
            else if (b == 0 & x[i].hasAttribute("hidden")) {
                x[i].removeAttribute("hidden");
            }

            i++;
        }
            
        }
        else if ($("select#search").val() == "Adresse"){
                var i = 1;
        var x = document.getElementsByTagName("tr");
        var sel = document.getElementsByTagName("input")[0].value.toString();
        var re = new RegExp(sel, "i");
        while (i < x.length) {

            var y = x[i].getElementsByClassName("Adresse")[0];

            var b = y.innerHTML.search(re);

            if (b < 0) {
                x[i].setAttribute("hidden");
            }
            else if (b >= 0 & x[i].hasAttribute("hidden")) {
                x[i].removeAttribute("hidden");
            }

            i++;
        }
            
        }
        else if ($("select#search").val() == "Region"){
                var i = 1;
        var x = document.getElementsByTagName("tr");
        var sel = document.getElementsByTagName("input")[0].value.toString();
        var re = new RegExp(sel, "i");
        while (i < x.length) {

            var y = x[i].getElementsByClassName("Region")[0];

            var b = y.innerHTML.search(re);

            if (b < 0) {
                x[i].setAttribute("hidden");
            }
            else if (b == 0 & x[i].hasAttribute("hidden")) {
                x[i].removeAttribute("hidden");
            }

            i++;
        }
            
        }
        else if ($("select#search").val() == "secteur"){
            
                var i = 1;
        var x = document.getElementsByTagName("tr");
        var sel = document.getElementsByTagName("input")[0].value.toString();
        var re = new RegExp(sel, "i");
        while (i < x.length) {

            var y = x[i].getElementsByClassName("secteur")[0];

            var b = y.innerHTML.search(re);

            if (b < 0) {
                x[i].setAttribute("hidden");
            }
            else if (b == 0 & x[i].hasAttribute("hidden")) {
                x[i].removeAttribute("hidden");
            }

            i++;
        }
            
        }
        
        


    }


</script>
</section>
</body>
</html>