


<fieldset>
    <legend><h1>Informations Générales</h1></legend>
    <ul>
        <li id="id" value=<?php echo $_POST["formation"][0]->getId() ?> >Identifiant: <?php echo $_POST["formation"][0]->getId() ?></li>
        <li>Intitulé: <?php echo $_POST["formation"][0]->getIntitule() ?></li>
        <li>Emplacement: <?php echo $_POST["formation"][0]->getEmplacement() ?></li>
        <li>Adresse: <?php echo $_POST["formation"][0]->getAdrsempl() ?></li>
        <li id="date_debut" value="<?php echo $_POST["formation"][0]->getDate_d() ?>" >Date debut: <?php echo $_POST["formation"][0]->getDate_d() ?></li>
        <li>Date fin: <?php echo $_POST["formation"][0]->getDate_f() ?></li>
        <li>Type: <?php echo $_POST["formation"][0]->getType() ?></li>
        <li><a id="plan" href="javascript:maps()" value="<?php echo $_POST["formation"][0]->getPlan() ?>" >Plan d'accées</a> </li>
    </ul>

</fieldset>

<fieldset>
    <legend><h1>Programme de la Formation</h1></legend>
    
    <?php
    if(isset($_POST["groupe"])){
      echo  "<table ><tr>"; 
        foreach ($_POST["groupe"] as $value) {
           echo "<td><input type=\"hidden\" name=\"checkbox\"  value=\"".$value->getId()."\"><a class=\"groupe\"  id=\"".$value->getId()."\"  href=\"javascript:view_it_for(".$value->getId().")\" >".$value->getNom()."   </a></td>";
           
            
        }
        echo "</tr></table>";
        
    }
echo "<input  type=\"submit\" value=\"edit\" onclick=\"edit()\"  />";
echo "<input class=\"edit\" type=\"hidden\" value=\"Ajout Seance\" onclick=\"add_seance()\"  />";
echo "<input class=\"edit\"  type=\"hidden\" value=\"Ajout Groupe\" onclick=\"add_groupe()\" />";
echo "<input class=\"edit\"  type=\"hidden\" value=\"Suppression Seance\" onclick=\"delete_seance()\" />";
echo "<input class=\"edit\" type=\"hidden\" value=\"Suppression Groupe\" onclick=\"delete_groupe()\" />";
    


    echo "<div id='calendar'></div>";


    echo "</fieldset>";

    echo "<fieldset>";
    echo "<legend><h1>Animateurs de la Formatoion</h1></legend>";


    if (!isset($_POST["animateurs"])) {
        echo "<ul>";
        foreach ($_POST["formation_animer_par"] as $value) {
            echo "<li class=" . $value->getId() . ">";
            echo "<a   href=\"\mvc_test/animateur/lookone/" . $value->getId()."\" >" . $value->getNom() . " " . $value->getPrenom() . "</a><br/>";
            echo "<a class=\"delete\" href=\"javascript:delete_animateur(" . $value->getId() . ")\" >   supprimer</a>";
            echo "</li>";
        }
        echo "</ul>";
        echo "<a href=\"javascript:add_animateur()\">add</a>";
    } else {
        echo "<a href=\"javascript:add_animateur()\">add</a>";
    }
    ?>
</fieldset>

<fieldset>
    <legend><h1>Participants</h1></legend>
</fieldset>
  <div id='seance'></div>
</section>
</body>
</html>


<script src="/mvc_test/libs/js/jquery.js"  ></script>
<!--  <script src="/mvc_test/libs/js/date.js"  ></script> -->
<script  src='/mvc_test/libs/js/fullcalendar/fullcalendar.js'></script>
<script>
/*
    var d = $("#date_debut").attr("value").toString();
    d = d.split("-");

    $(document).ready(function() {
        $("#jour").text($("#date_debut").attr("value"));
        $("head").append('<link rel=\'stylesheet\' type=\'text/css\' href=\'/mvc_test/libs/css/fullcalendar.css\' />')
        $('#calendar').fullCalendar({
            header: {
                left: 'title',
                center: 'basicWeek basicDay',
                right: 'today prev,next'
            },
            defaultView: 'basicDay',
            firstDay: 1,
            height: 300,
            contentHeight: 300,
            year: d[0],
            month: parseInt(d[1]) - 1,
            date: d[2],
            events: [
				{
					title: 'Click for Google',
					start: new Date(d[0], parseInt(d[1]) - 1, d[2],8,15),
					end: new Date(d[0], parseInt(d[1]) - 1, parseInt(d[2]),10,15),
                                        allDay: false,
					url: 'http://google.com/'
				}
			],
                        timeFormat: 'H(:mm)'
            

        });




    });
*/
    var editvar=0;
    function edit()
    {
       if(editvar==0) {
          editvar=1;
          $("[class='edit']").attr("type","submit");
       }
       else if(editvar==1){
           editvar=0;
          $("[class='edit']").attr("type","hidden");
           
       }
        
        
    }
    function add_groupe()
    {
        var ok = window.open("/mvc_test/formation/add_groupe_to_formation", "windows", 'width=800,height=500');

    }


    function add_seance()
    {
        var ok = window.open("/mvc_test/formation/add_seance_to_formation", "windows", 'width=800,height=500');

    }
   var deletegroupevar=0;
    function delete_groupe()
    {
        var ids=new Array();
        if(deletegroupevar==0){
         $("[name='checkbox']").attr("type","checkbox");
         deletegroupevar=1;}
     else if(deletegroupevar==1){
         deletegroupevar=0;
         $("[name='checkbox']").each(function(){
             if ($(this).is(':checked') === true){
                 ids.push($(this).attr('value'));
                 $(this).remove();
                 $("[id="+$(this).attr('value')+"]").remove();
             }
             
             
         });
       $.ajax({url:"/mvc_test/formation/delete_groupe/"+ids});
       //  window.open("/mvc_test/formation/delete_groupe/"+ids, "windows", 'width=800,height=500');
          $("[name='checkbox']").attr("type","hidden"); 
     }
        
    }


    function maps() {

        var ok = window.open("/maps_api/index2.html", "windows", 'width=800,height=500');
    }
    function add_animateur() {
        var ok = window.open("/mvc_test/formation/add_animateur_to_formation", "windows", 'width=800,height=500');
    }

    function delete_animateur(id_animateur) {
        var ok = window.open("/mvc_test/formation/delete_animateur_from_formation/" + id_animateur + "/" + document.getElementsByTagName("li")[14].getAttribute("value"), "windows", 'width=800,height=500');
        document.getElementsByClassName(id_animateur + "")[0].parentNode.removeChild(document.getElementsByClassName(id_animateur + "")[0]);
        //    document.getElementsByClassName("delete")[0].parentNode.removeChild(document.getElementsByClassName("delete")[0]);

        ok.close();
    }
    
    function view_it_for(id)
    {
        $('#seance').load('/mvc_test/formation/get_seance/'+id+' .seance',function(){
    
     var tab=new Array();
        
        alert($('.seance p').html());});
    alert($('.seance > p').length);
        $(document).ready(function() {
        $('.seance > p').each(
            function(){
                alert($(this).html());

        tab.push($(this).html());
            } );
            var d = $("#date_debut").attr("value").toString();
    d = d.split("-");

    $(document).ready(function() {
        $("#jour").text($("#date_debut").attr("value"));
        $("head").append('<link rel=\'stylesheet\' type=\'text/css\' href=\'/mvc_test/libs/css/fullcalendar.css\' />')
        $('#calendar').fullCalendar({
            header: {
                left: 'title',
                center: 'basicWeek basicDay',
                right: 'today prev,next'
            },
            defaultView: 'basicDay',
            firstDay: 1,
            height: 300,
            contentHeight: 300,
            year: d[0],
            month: parseInt(d[1]) - 1,
            date: d[2],
            events: [
				{
					title: 'Click for Google',
					start: new Date(d[0], parseInt(d[1]) - 1, d[2],8,15),
					end: new Date(d[0], parseInt(d[1]) - 1, parseInt(d[2]),10,15),
                                        allDay: false,
					url: 'http://google.com/'
				}
			],
                        timeFormat: 'H(:mm)'
            

        });




    });
    
        });
       
        
    }

</script>