<?php 
if(isset($_POST["formation"]))
{
    echo "<h2>Sélectionner une formation</h2>";
    echo "<select>";
     echo "<option value=\"\" >.....</option>";
    foreach ($_POST["formation"] as $value) {
        echo "<option value=\"".$value->getId()."\" >".$value->getIntitule()."</option>";
        
        
    }
    echo "</select>";
}


?>


<script>


$('select').change(function(){
    alert($("select option:selected").val());
   // window.open("/mvc_test/association/inviter/"+$("select option:selected").val(), "windows", 'width=800,height=500');
    $.ajax({
  type: "POST",
  url: "mvc_test/association/inviter",
  data: { select: $("select option:selected").val()}
  
    });
    
});

</script>