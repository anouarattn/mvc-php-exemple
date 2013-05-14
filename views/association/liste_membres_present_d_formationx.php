<?php

echo "<select id=\"groupe\" onchange=\"changed()\">";
echo "<option value=\"\" >".____."</option>";
    foreach ($_POST["groupes"] as $valuee) {
   echo "<option value=\"".$valuee->getId()."\">".$valuee->getNom()."</option>";
    }
    echo "</select><br/>";
    
foreach ($_POST["membres"] as $value) {
echo "<ul>";
 
    echo "<li>";
    echo "<input type=\"checkbox\" name=\"".$value->getId()."\" id=\"".$value->getId()."\" value=\"\" \">"; 
    echo "<label for=\"".$value->getId()."\">[".$value->getId()."] ".$value->getNom()." ".$value->getPrenom()."</label>"; 
    echo "</li>";
     echo "</ul>";
}



   
?>
</section>
</body>
</html>

<script>
    document.getElementById("fofo").parentNode.removeChild(document.getElementById("fofo"));

    var hidden = document.createElement('input');

    hidden.setAttribute('type', 'hidden');
     hidden.setAttribute('value',window.opener.document.getElementsByTagName("li")[14].getAttribute("value"));

 hidden.setAttribute('name','id_formation');



    document.getElementsByTagName("form")[0].appendChild(hidden);
    function close_reload()
    {
           window.opener.location.reload();   
       self.close();

        
    }

           
       function changed()
    {
         
      var  i=0;
        if($("#groupe").val() == "nom"){
           
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
        else if ($("select#search").val() == "cin"){
                
        while (i < x.length) {

            var y = x[i].getElementsByClassName("CIN")[0];

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
        else if ($("select#search").val() == "adresse"){
                var i = 1;
       
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
        else if ($("select#search").val() == "id"){
            
                var i = 1;
      
        while (i < x.length) {

            var y = x[i].getElementsByClassName("identifiant")[0];

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
        
        


    }
           
</script>