<br/><br/>


    <article>
    <form  method="post"  action="/mvc_test/membre/add"  enctype="multipart/form-data"> 
        <fieldset>
  <legend><h1>Ajout d'un membre Dans la base de données</h1></legend>
        <p>

            <label for="nom_membre" >Nom : </label><input type="text" name="nom_membre" id="nom_membre" placeholder="Nom du membre"  /><br/>
            <label for="pnom_membre" >Prenom : </label><input type="text" name="pnom_membre" id="pnom_membre" placeholder="Prenom du membre"  /><br/>
            <label for="tel_membre" >Telephone : </label><input type="text" name="tel_membre" id="tel_membre" placeholder="Telephone du membre"  /><br/>
            <label for="ad_membre" >Adresse : </label><input type="text" name="ad_membre" id="ad_membre" placeholder="Adresse du membre"  /><br/>

            <label for="email_membre" >E-mail : </label><input type="email" name="email_membre" id="email_membre" placeholder="E-mail du membre"  /><br/>
            <label for="cin_membre" >CIN : </label><input type="text" name="cin_membre" id="cin_membre" placeholder="CIN du membre"  /><br/>
            
            <label for="association" >Association : </label>
    
   <?php  
   if (isset($_POST["tab_of_association_name"]))
   {
       echo "<select name=\"association\" id=\"association\">  ";

       foreach ($_POST["tab_of_association_name"] as $value) {
           echo "<option value=\"$value->get_id()\" >   ".$value->get_nom()."</option>";
       }
        echo "</select>";
        
        
   }
 else {
      echo "<select name=\"association\" id=\"association\" disabled>  ";
       echo "</select>";
       echo "il faut ajouter une association";
   }
   ?>
            
   <br/>
     <label for="fonction_association" >Fonction dans l'Association : </label>
    <select name="fonction_association" id="fonction_association"  >  
    <option value="president">président </option>
        <option value="secretaire">secrétaire</option>
        <option value="tresorier">trésorier</option>
        <option value="vice_président">vice président</option>
        <option value="add">ajouter...</option>
    </select>
     <a href="javascript:add()">autre...</a>
     <br/>
            
    
            <input type="submit" value="Submit" name="submit" /><br/>
                
        </p>

 </fieldset>
    </form>
</article>


  </section>
           </body>
</html>


<script>

function  add()
{
    var fonction=prompt("Entrer le nom de la fonction");
    var node=document.createElement("option");
    alert("dd");
    node.setAttribute("value",fonction);  alert("ddd");
var textnode=document.createTextNode(fonction);  alert("dddd");
node.appendChild(textnode);  alert("ddddd");
    
    document.getElementsByTagName("select").appendChild(node);  alert("ddddddd");
    
}


</script>