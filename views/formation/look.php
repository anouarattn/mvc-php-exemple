<input type="text"  name="search" onkeydown="changed()" >
<select id="search"  >
    <option value="....">....</option>
    <option value="intitule">Intitulé</option>
    <option value="type">Type</option>
    <option value="emplacement">Emplacement</option>
    <option value="adresse">Adresse</option>
    <option value="date">Date</option>
     <option value="id">identifiant</option>
</select>



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
echo "<th>
    <select id=\"Action\"  onchange=\"operation();\">
    <option value=\"0\">....</option>
  <option value=\"1\">Supprimer</option>
  <option value=\"2\">Modifier</option>
  <option value=\"3\">Imprimer</option>
</select>

</th> ";

//echo "<th>" . "Supprimer" . "</th> ";
echo "<th>" . "Plus" . "</th> ";

echo "</tr> ";




$gett = '';

foreach ($_POST["donnees"] as $object) {
    $i = 0;

    echo "<tr> ";

    while ($i < $size2) {

        $temp = $object->get_getter();
        if ($i == 0) {
            $id_val = $temp;
        }


        echo "<td class=\"" . $_POST["noms_column"][$i] . "\">" . $temp . "</td>";
        $i++;
    }

    echo "<td><input type=\"checkbox\" class=\"checkbox\" value=\"" . $id_val . "\" ></td>";


    echo "<td><a href=\"/mvc_test/formation/lookone/" . $id_val . "\"  ><img src=\"/mvc_test/libs/uploads/picture/plus.png\"  alt=\"plus\" height= \"40\" width=\"30\" ></a></td>";


    echo "</tr> ";
}

echo "</table></fieldset></article>";
?>

<script>

 

    function changed()
    {

        if ($("select#search").val() == "intitule") {

            var i = 1;
            var x = document.getElementsByTagName("tr");
            var sel = document.getElementsByTagName("input")[0].value.toString();
            var re = new RegExp(sel, "i");
            while (i < x.length) {

                var y = x[i].getElementsByClassName("Intitulé")[0];

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
        else if ($("select#search").val() == "type") {
            var i = 1;
            var x = document.getElementsByTagName("tr");
            var sel = document.getElementsByTagName("input")[0].value.toString();
            var re = new RegExp(sel, "i");
            while (i < x.length) {

                var y = x[i].getElementsByClassName("type")[0];

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
        else if ($("select#search").val() == "emplacement") {
            var i = 1;
            var x = document.getElementsByTagName("tr");
            var sel = document.getElementsByTagName("input")[0].value.toString();
            var re = new RegExp(sel, "i");
            while (i < x.length) {

                var y = x[i].getElementsByClassName("Emplacement")[0];

                var b = y.innerHTML.search(re);

                if (b < 0) {
                    x[i].setAttribute("hidden");
                }
                else if (b == 0 & x[i].hasAttribute("hidden")) {
                    x[i].removeAttribute("hidden");
                }

                i++;
            }

        }
          else if ($("select#search").val() == "emplacement") {
            var i = 1;
            var x = document.getElementsByTagName("tr");
            var sel = document.getElementsByTagName("input")[0].value.toString();
            var re = new RegExp(sel, "i");
            while (i < x.length) {

                var y = x[i].getElementsByClassName("Emplacement")[0];

                var b = y.innerHTML.search(re);

                if (b < 0) {
                    x[i].setAttribute("hidden");
                }
                else if (b == 0 & x[i].hasAttribute("hidden")) {
                    x[i].removeAttribute("hidden");
                }

                i++;
            }

        }
        else if ($("select#search").val() == "id") {

            var i = 1;
            var x = document.getElementsByTagName("tr");
            var sel = document.getElementsByTagName("input")[0].value.toString();
            var re = new RegExp(sel, "i");
            while (i < x.length) {

                var y = x[i].getElementsByClassName("identifiant")[0];

                var b = y.innerHTML.search(re);

                if (b < 0) {
                    x[i].setAttribute("hidden");
                }
                else if (b == 0 & x[i].hasAttribute("hidden")) {
                    x[i].removeAttribute("hidden");
                }

                i++;
            }

        }
        else if ($("select#search").val() == "date") {

            var i = 1;
            var x = document.getElementsByTagName("tr");
            var sel = document.getElementsByTagName("input")[0].value.toString();
            var re = new RegExp(sel, "i");
            while (i < x.length) {

                var y = x[i].getElementsByClassName("Date-debut")[0];

                var b = y.innerHTML.search(re);

                if (b < 0) {
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
</section>
</body>
</html>

<script src="/mvc_test/libs/js/jquery.js"  ></script>
<script>

    function operation()
    {
//alert($("select#Action").val()===1);
        if ($("select#Action").val() == 1) {

            var delete_elemtent = new Array();
            $("input:checkbox").each(function()
            {
                if ($(this).is(':checked') === true)
                {
                    delete_elemtent.push($(this).val());
                    $(this).parent().parent().remove();
                }
            }
            );
            if (delete_elemtent.length == 0) {
                $("select#Action").val('0');
            }
            else {

                var deletee = window.open("delete/" + delete_elemtent, "windows", 'width=800,height=500');
                deletee.close();

                $("select#Action").val('0');
                // this.href=\"/mvc_test/animateur/delete/" . $_POST["id"] ."\" ;
            }

        }

        else if ($("select#Action").val() == 2) {
            var delete_elemtent = new Array();


            $("input:checkbox").each(function()
            {
                if ($(this).is(':checked') === true)
                {
                    delete_elemtent.push($(this).val());
                    $(this).prop('checked', false);
                }
            }
            );
            if (delete_elemtent.length == 0) {
                $("select#Action").val('0');
            }
            else {
                var deletee = window.open("modify/" + delete_elemtent, "windows", 'width=800,height=500');
                $("select#Action").val('0');
            }

        }
        else if ($("select#Action").val() == 3) {

        }
        //$("input:checkbox").each(function() { alert($(this).is(':checked')); });
        //alert($("select#Action").val());




    }

</script>