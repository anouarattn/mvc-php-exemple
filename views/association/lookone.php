


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
    <?php 



?>
</fieldset>


</section>
</body>
</html>




<script>
    
function add_animateur(){
       var ok=window.open("add_animateur_to_formation","windows",'width=800,height=500' ); 
    }


</script>