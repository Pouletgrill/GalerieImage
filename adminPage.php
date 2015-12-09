<?php
session_start();
include_once("BaseDeDonne.php");
include_once("BDClass.php");
$Gestion = new Gestion();
echo("
<div style='text-align: center'>
    <h1 style='background-color: darkseagreen'>Administration</h1>
    <form action='index.php' method=''>
        <input type='submit' value='Retour'>
    </form>
</div>");
if(isset($_SESSION["user"]) && $_SESSION["user"]=="admin")//Admin operation
{
    $TableauUser = $Gestion->SelectUsager();

    echo("
    <table style='border: double'>
    <tr>
        <td>Username</td>
        <td>Password</td>
        <td>Fullname</td>
        <td>IPadresse</td>
        <td>TimeConnexion</td>
    </tr>
    ");
    for($i = 0; $i < count($TableauUser);$i++) //TABLEAU
    {
        echo("
        <tr>
            <td>".$TableauUser[$i][0]."</td>
            <td>".$TableauUser[$i][1]."</td>
            <td>".$TableauUser[$i][2]."</td>
            <td>".$TableauUser[$i][3]."</td>
            <td>".$TableauUser[$i][4]."</td>
            <form action='index.php' method='post'>
                <td><button name='Desinscription' value='".$TableauUser[$i][0]."' >Supprimer</button></td>
            </form>
        </tr>
        ");
    }
echo("</table>");
}
else //Acces illégal
{
    echo("
            <p style='color: red;text-align: center'>Accès illégal a cette page, ".$_SESSION["user"]." n'est pas un administrateur</p>
            ");
}
include_once("footpage.html");