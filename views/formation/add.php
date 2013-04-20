

    <form method="post"  action="/mvc_test/formation/add"  enctype="multipart/form-data"> 
        <fieldset>
        <legend><h1>Ajout d'une Formation</h1></legend>
    <p>

    <label for="nom_formation" >Intitulé : </label><input type="text" name="nom_formation" id="nom_formation" placeholder="Intitulé de la Formation"  /><br/>
    <label for="date_debut_formation" >Date debut : </label><input type="date" name="date_debut_formation" id="date_debut_formation" /><br/>
    <label for="date_fin_formation" >Date fin : </label><input type="date" name="date_fin_formation" id="date_fin_formation" /><br/>
    <label for="lieu_formation" >Lieu : </label><input type="text" name="lieu_formation" id="lieu_formation" placeholder="Lieu de la Formation"/><br/>
    <label for="adresse_lieu_formation" >Adresse Lieu : </label><input type="text" name="adresse_lieu_formation" id="adresse_lieu_formation" placeholder="Adresse Lieu de la Formation"/><br/>
    Type : <input type="radio" name="formation_type" value="action" id="formation_action" /><label for="formation_action">Action</label>
        <input type="radio" name="formation_type" value="normale" id="formation_normale" /> <label for="formation_normale" >Normale</label>
         <input type="submit" value="Submit" name="submit" /><br/>
    </p>
     </fieldset>
    </form>
    

</section>

</body>
</html>