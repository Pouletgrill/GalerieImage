<?php
session_start();
include_once("BaseDeDonne.php");
include_once("BDClass.php");
$gestion = new Gestion();

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
            <p style='color: blue'>le commentaire a �t� enregistr�!</p>
             ");
            }
            else //si operation BD marche pas
            {
                echo ("
            <p style='color: red'>Un probleme est survenue dans la BD</p>
             ");
            }
        }
        else
        {
            echo ("
            <p style='color: red'>le commentaire est vide</p>
             ");
        }
        //echo("image:".$image." text:".$message);
    }
    else
    {
        echo "<p style='color: red'>Ce fichier n'existe pas.</p>";
    }
}
else
{
    echo "<p style='color: red'>Vous n'avez pas acc�s a commenter ce fichier.</p>";
}
?>
    <br>
    <br>
    <form class="comment" action="index.php" method="post">
        <input type="submit" value="Retour">
<?php
include_once("footpage.html");