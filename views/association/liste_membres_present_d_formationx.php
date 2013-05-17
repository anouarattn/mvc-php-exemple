<?php


echo "<fieldset>";
echo "<legend><h1>Membres presents</h1></legend>";


echo "</fieldset>";
echo "<select id=\"groupe\" hidden>";
echo "<option value=\"\" >".____."</option>";
    foreach ($_POST["groupes"] as $valuee) {
   echo "<option value=\"".$valuee->getId()."\">".$valuee->getNom()."</option>";
    }
    echo "</select><br/>";
    
foreach ($_POST["membres"] as $value) {
echo "<ul>";
 
    echo "<li>";
    echo "<input type=\"checkbox\" class=\"checkbox\"  value=\"".$value->getId()."\" \">"; 
    echo "<label for=\"".$value->getId()."\">[".$value->getId()."] ".$value->getNom()." ".$value->getPrenom()."</label>"; 
    echo "</li>";
     echo "</ul>";
}

echo "<input type=\"hidden\" id=\"idassociation\" value=\"".$_POST["idassociation"]."\" >";
 echo "<input type=\"hidden\" id=\"idformation\" value=\"".$_POST["idformation"]."\" >";

   
?>
</section>
</body>
</html>

<script>
    var ids="";
    $('.checkbox').change(
        function(){
    if(this.checked){
        ids+=$(this).attr('value')+',';
        $('select').removeAttr('hidden');
        
    }});
    $('select').change(function(){
        
       //alert($("select option:selected").val());
      // alert(ids);
     // alert($("#idformation").val());
    window.open("/mvc_test/association/add_membre_to_formation/"+ids+"/"+$("select option:selected").val()+"/"+$("#idassociation").val()+"/"+$("#idformation").val(), "windows", 'width=800,height=500');
    //   $.ajax({url:"/mvc_test/association/add_membre_to_formation/"
      //           +ids+"/"+$("select option:selected").val()+"/"+$("#idassociation").val()+"/"+$("#idformation").vale()});

  ids="";
    });
    
    
    document.getElementById("fofo").parentNode.removeChild(document.getElementById("fofo"));

  




           
     
           
</script>