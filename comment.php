<?php
session_start();
include_once("BaseDeDonne.php");
include_once("BDClass.php");
$gestion = new Gestion();
date_default_timezone_set('America/Montreal');

include_once("headpage.php");
$target_dir = "./Images/";
$image = $_POST["image"];
$message = $_POST["commentaireSec"];
if($image[0] != '.')
{
    if(file_exists($target_dir . $image))
    {
        if(!empty($message)) //si message pas vide
        {
            if($gestion->CommenterPhoto($image,$_SESSION["user"],date("Y-m-d H:i:s"),$message)) //si operation BD marche
            {
                echo ("
            <p style='color: blue'>Succès! Le commentaire a été enregistré!</p>
             ");
            }
            else //si operation BD marche pas
            {
                echo ("
            <p style='color: red'>Erreur. Un probleme est survenue dans la BD</p>
             ");
            }
        }
        else
        {
            echo ("
            <p style='color: red'>Erreur. Le commentaire est vide.</p>
             ");
        }
        //echo("image:".$image." text:".$message);
    }
    else
    {
        echo "<p style='color: red'>Erreur. Ce fichier n'existe pas.</p>";
    }
}
else
{
    echo "<p style='color: red'>Erreur. Vous n'avez pas accès a commenter ce fichier.</p>";
}
?>
    <!--<form class="comment" action="index.php" method="post">
        <input type="submit" value="Retour">-->
    <FORM><INPUT class="comment" Type="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>
<?php
include_once("footpage.html");