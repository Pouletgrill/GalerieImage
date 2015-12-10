<?php
include_once("BaseDeDonne.php");
include_once("BDClass.php");
$gestion = new Gestion();

// exemple avec le répertoire courant
$repertoire = "./Images";

// la valeur de retour de scandir est un tableau
$fichiers = scandir($repertoire);

$compteur = 0;
?>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<table class="vision">
    <?php
    if ($fichiers !== FALSE)
    {
        for ($i = sizeof($fichiers) - 1; $i >= 0; $i--)
        {
            $nomFichier = $fichiers[$i];
            if ($nomFichier[0] != "." && !empty($gestion->GetInfoFromImage($nomFichier)))
            {
                if($compteur == 5)
                {
                    echo "</tr>";
                    $compteur = 0;
                }

                if($compteur % 5 == 0)
                    echo "<tr>";

                echo '<td><a href="gestimage.php?i=' . $nomFichier . '"><img src="Images/' . $nomFichier . '"></a></td>';

                $compteur++;
            }

            if($i == (0) && $compteur != 5)
            {
                echo "</tr>";
            }
        }
    }
    else
    {
        die("Erreur: repertoire invalide");
    }
    ?>
</table>

<table class="upload" style="border: none">
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <tr>
        <td>
            Titre : <input type="text" name="TitreImage" value="" maxlength="50">
        </td>
    </tr>
    <tr>
        <td>
            Fichier : <input name="fichier" type="file">
        </td>
    </tr>
        <tr>
            <td>
                <input type="submit" value="Envoyer le fichier"></form>
            </td>
        </tr>
</table>