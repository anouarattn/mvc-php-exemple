<?php

class Utility {

    public static function upload($index, $destination, $maxsize = FALSE, $extensions = FALSE) {
        //Test1: fichier correctement uploadé
        if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0)
            return FALSE;
        //Test2: taille limite
        if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize)
            return FALSE;
        //Test3: extension
        $ext = substr(strrchr($_FILES[$index]['name'], '.'), 1);
        if ($extensions !== FALSE AND !in_array($ext, $extensions))
            return FALSE;
        //Déplacement
        $name_file = $ext . rand(1, 999999) . $index . '.' . $ext;
        $temp2 = move_uploaded_file($_FILES[$index]['tmp_name'], $destination . $name_file);
        return array($temp2, $name_file);
    }

    public static function grid(array $donnees, array $noms) {

        $size = count($donnees);
        $size2 = count($noms);

$nb=0;

        if ($nb != 1) {
                $nb=1;
            echo "<tr> ";

            for ($j = 0; $j < $size2; $j++) {

                echo "<th>" . $noms[$j] . "</th> ";
            }

            echo "</tr> ";
        }
        echo "<tr> ";
        

        foreach ($donnees as $value) {
            



 foreach ($value as $vi) {
 echo "<td>" . $vi . "</td>";

 
 }



            $nb = 1;
        }
    }

 

}

?>
