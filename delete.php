<?php
include_once("BaseDeDonne.php");
include_once("BDClass.php");
$gestion = new Gestion();

include_once("headpage.php");
$target_dir = "./Images/";
$image = $_GET["image"];
if($image[0] != '.')
{
    if(file_exists($target_dir . $image))
    if(unlink($target_dir . $image))
    {
        echo "L'image " . $image . " a �t� supprim�e.";
        $gestion->DelImageBd($image);
    }
    else
    {
        echo "L'image " . $image . " n'a pas �t� supprim�e.";
    }
    else
        echo "Ce fichier n'existe pas.";
}
else
{
    echo "Vous n'avez pas acc�s a supprimer ce fichier.";
}
?>
<br>
<br>
<form action="index.php" method="post">
    <input type="submit" value="Retour">
<?php
include_once("footpage.html");