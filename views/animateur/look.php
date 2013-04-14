<?php
$size2 = count($_POST["noms_column"]);
echo "<br/><br/>";
echo "<article>";
echo "<fieldset>";
echo "<legend><h1>Liste des Animateurs</h1></legend>";
echo "<table border=\"1\"> ";



echo "<tr> ";
for ($j = 0; $j < $size2; $j++) {

    echo "<th>" . $_POST["noms_column"][$j] . "</th> ";
}
echo "<th>" . "Plus" . "</th> ";
echo "</tr> ";

echo "<tr> ";

$gett = '';
foreach ($_POST["donnees"] as $object) {
    $i = 0;
    $gett = '?';
    echo "<tr> ";
    while ($i < $size2) {

        $temp = $object->get_getter();
        
        $gett.=$_POST["noms_column"][$i] . '=' . $temp . '&';
        if (in_array(substr(strrchr($temp, '.'), 1), array('pdf', 'doc', 'docx')))
            echo "<td><a href=\"/mvc_test/doc/view?val=". $temp . "\" >Voir</a></td>";
        elseif (in_array(substr(strrchr($temp, '.'), 1), array('png', 'gif', 'jpg', 'jpeg')))
            echo "<td><img src=\"/mvc_test/libs/uploads/picture/" . $temp . "\" height=\"70\" width=\"60\" ></td>";
        else
            echo "<td>" . $temp . "</td>";
        $i++;
    }
    echo "<td><a href=\"/mvc_test/animateur/lookone" . substr($gett, 0, strlen($gett) - 1) . "\" >" . "Plus" . "</a></td>";

    echo "</tr> ";
}


echo "</table>";
echo "</fieldset>";
echo "</article>";
?>
</section>
</body>
</html>