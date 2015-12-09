<?php
session_start();
include_once("BaseDeDonne.php");
include_once("BDClass.php");
$gestion = new Gestion();

if ($_SESSION["user"] == "admin" && isset($_SESSION["SelectedUser"]))
{
    $user = $_SESSION["SelectedUser"];
}
else
{
    $user = $_SESSION["user"];
}


include_once("headpage.php");

if(isset($_SESSION["user"]))
{
    if ($_SESSION["user"] == "admin" && isset($_SESSION["SelectedUser"]))
    {
        $user = $_SESSION["SelectedUser"];
    }
    else
    {
        $user = $_SESSION["user"];
    }
    $usagerInfo = $gestion->SelectUsagerInFo($user);
    echo("
        <h1>Profil de ".$user."</h1>
        Nom Usager (Ne pas oublier de changer le user session si il doit changer)
        <form action='profil.php' method='post'>
        <input type='text' name='commentaireSec' value=".$usagerInfo[0][0]." maxlength='50' minlength=5>
        <input type='submit' value='Modifier'>
        </form>
        Mot De Passe
        <form action='profil.php' method='post'>
        <input type='password' name='commentaireSec' value=".$usagerInfo[0][1]." maxlength='50' minlength=5>
        <input type='submit' value='Modifier'>
        </form>
        Nom complet
        <form action='profil.php' method='post'>
        <input type='text' name='commentaireSec' value=".$usagerInfo[0][2]." maxlength='100' minlength=5>
        <input type='submit' value='Modifier'>
        </form>
    ");
}
else
{
    echo("
<div style='text-align: center'>
            <p style='color: red;text-align: center'>Veuillez vous connecter</p>
            <form action='index.php'>
                <input type='submit' value='Retour'>
            </form>
</div>
            ");
}

include_once("footpage.html");