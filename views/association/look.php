<input type="text"  name="search" onkeydown="changed()" >
<select name="select" >
  <option value="nom">Nom</option>
  <option value="cin">CIN</option>
  <option value="adresse">Adresse</option>
  <option value="id">Id</option>
</select>
<input type="submit" onclick="changed()"  >


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
echo "<th>" . "Modifier" . "</th> ";
echo "<th>" . "Supprimer" . "</th> ";
echo "<th>" . "Plus" . "</th> ";

echo "</tr> ";



$gett = '';

foreach ($_POST["donnees"] as $object) {
    $i = 0;
    $gett = '?';
    echo "<tr> ";
    
    while ($i < $size2) {
        $tag="<td>";
        $temp = $object->get_getter();
        if($i==0) {$id_val=$temp;}
        if($i==1) {$tag="<td class=\"nom\">";}
        $gett.=$_POST["noms_column"][$i] . '=' . $temp . '&';
            echo         $tag. $temp . "</td>";
        $i++;
        
    }
$rand= rand(1, 23827);
    echo "<td><a href=\"/mvc_test/association/edit/" .$id_val."\" ><img src=\"/mvc_test/libs/uploads/picture/edit.png\"  alt=\"modifier\" height= \"40\" width=\"30\" ></a></td>";
    echo "<td><a  href= \"javascript:confirmm(".$id_val.")\" ><img src=\"/mvc_test/libs/uploads/picture/delete.png\"  alt=\"supprimer\" height= \"40\" width=\"30\" ></a></td>";
    echo "<td><a href=\"/mvc_test/association/lookone" . substr($gett, 0, strlen($gett) - 1) . "\"  ><img src=\"/mvc_test/libs/uploads/picture/plus.png\"  alt=\"plus\" height= \"40\" width=\"30\" ></a></td>";
  //  echo "<td><a href=\"/mvc_test/animateur/lookone" . substr($gett, 0, strlen($gett) - 1) . "\" >" . "Plus" . "</a></td>";
   // echo "<td><a href=\"/mvc_test/animateur/lookone" . substr($gett, 0, strlen($gett) - 1) . "\" >" . "Plus" . "</a></td>";
    //echo "<td><a href=\"/mvc_test/animateur/lookone" . substr($gett, 0, strlen($gett) - 1) . "\" >" . "Plus" . "</a></td>";

    echo "</tr> ";
}

echo "</table>";
echo "</fieldset>";
echo "</article>";
?>

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
    var i =1;
    var x=document.getElementsByTagName("tr");
var sel = document.getElementsByTagName("input")[0].value.toString();
var re = new RegExp(sel, "i");
    while(i<x.length){

var y=x[i].getElementsByClassName("nom")[0];

   var b=   y.innerHTML.search(re);
 
if(b!==0){
    x[i].setAttribute("hidden");   
}
else if (b==0 & x[i].hasAttribute("hidden")){x[i].removeAttribute("hidden");}

i++;
}


}
</script>
</section>
</body>
</html>