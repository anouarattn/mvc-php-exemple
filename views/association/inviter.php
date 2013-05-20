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
    echo "<input type=\"hidden\" value=\"".$_POST["ids"]."\">";
    echo "<textarea rows=\"6\" cols=\"70\" hidden>";
    echo "</textarea>";
}


?>


<script>


$('select').change(function(){
 //   alert($("input").val());
   // window.open("/mvc_test/association/inviter/"+$("select option:selected").val(), "windows", 'width=800,height=500');
    $.ajax({
  url: "/mvc_test/association/inviter/"+$("input").val()+"/"+$("select option:selected").val()
    }).done(function(){
        
        $.post("/mvc_test/association/mailing",function(data) {
  alert("Data Loaded: " + data);
});
    });
    
});

</script>