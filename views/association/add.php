<br/><br/>


    <article>
    <form  method="post"  action="/mvc_test/association/add"  enctype="multipart/form-data"> 
        <fieldset>
  <legend><h1>Ajout d'un association Dans la base de données</h1></legend>
        <p>

            <label for="nom_association" >Nom : </label><input type="text" name="nom_association" id="nom_association" placeholder="Nom de l'association"  /><br/>
 
            <label for="tel_association" >Telephone : </label><input type="text" name="tel_association" id="tel_association" placeholder="Telephone de l'association"  /><br/>
             <label for="fax_association" >Fax : </label><input type="text" name="fax_association" id="fax_association" placeholder="Fax de l'association"  /><br/>
            <label for="ad_association" >Adresse : </label><input type="text" name="ad_association" id="ad_association" placeholder="Adresse de l'association"  /><br/>

            <label for="email_association" >E-mail : </label><input type="email" name="email_association" id="email_association" placeholder="E-mail de l'association"  /><br/>
           

            <label for="president_association" >Président : </label><input type="text" name="president_association" id="president_association" placeholder="Président de l'association"  /><br/>

            <label for="region_association" >Region : </label>
    <select name="region_association" id="region_association">  
    <option value="Eddahab_Lagouira">Oued-Eddahab - Lagouira</option>
        <option value="Chaouia_Ouardigha">Chaouia-Ouardigha</option>
        <option value="Marrakech_Tensift_Haouz">Marrakech-Tensift-Al Haouz</option>
        <option value="Oriental">L'Oriental</option>
        <option value="Rabat_Sale_Zemmour_Zaer">Rabat-Salé-Zemmour-Zaër</option>
        <option value="Doukkala_Abda">Doukkala-Abda</option>
        <option value="Tadla_Azilal">Tadla-Azilal</option>
        <option value="Meknes_Tafilalet">Meknès-Tafilalet</option>
        <option value="Fes_Boulemane">Fès-Boulemane</option>
        <option value="Taza_Taounate_Hoceima">Taza-Taounate-Al Hoceima</option>
        <option value="Tanger_Tetouan">Tanger-Tétouan</option>
        <option value="Souss_Massa_Draa">Souss-Massa-Draa</option>
        <option value="Grand_Casablanca">Grand Casablanca</option>
        <option value="Guelmim_Esmara">Guelmim-Esmara</option>
        <option value="Gharb_Cherarda_Beni_Hsan">Gharb-Cherarda-Beni Hsan</option>
        <option value="Laayoune_Boujdour_Sakia_El_Hamra">Laayoune-Boujdour-Sakia El Hamra</option>
    </select><br/>
            
            
            <input type="submit" value="Submit" name="submit" /><br/>
        </p>

 </fieldset>
    </form>
</article>


  </section>
           </body>
</html>