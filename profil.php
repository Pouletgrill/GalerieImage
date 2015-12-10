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
    if ($_SESSION["user"] == "admin" && isset($_POST["adminProfilRequest"]) || isset($_SESSION["adminRequest"]))
    {
        if (!isset($_SESSION["adminRequest"]))
        {
            $user = $_POST["adminProfilRequest"];
            $_SESSION["adminRequest"] = $user;
        }
        else
        {
            $user = $_SESSION["adminRequest"];
        }
    }
    else
    {
        $user = $_SESSION["user"];
    }

    PostGestion($gestion,$user);

    $usagerInfo = $gestion->SelectUsagerInFo($user);
    echo("
        <h1>Profil de ".$user."</h1>
        Nom complet
        <form action='profil.php' method='post'>
        <input type='text' name='Modif_Fullname' value='".$usagerInfo[0][2]."' maxlength='100'>
        <input type='submit' value='Modifier' name='Submit_Fullname'>
        </form>
        Mot De Passe
        <form action='profil.php' method='post'>
        <input type='password' name='Modif_Password' value='' maxlength='50'>
        <input type='submit' value='Modifier' name='Submit_Password'>
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

function PostGestion($fgestion,$fuser)
{
    if(isset($_POST["Submit_Password"]) && $_POST["Submit_Password"])
    {
        if(!empty($_POST["Modif_Password"]))
        {
            $fgestion->UpdatePswd($fuser,$_POST["Modif_Password"]);
        }
        else
        {
            echo("
            <p style='color: red'>Le mot de passe est vide</p>
            ");
        }
    }
    if(isset($_POST["Submit_Fullname"]) && $_POST["Submit_Fullname"])
    {
        if(!empty($_POST["Modif_Fullname"]))
        {
            $fgestion->UpdateFullname($fuser,$_POST["Modif_Fullname"]);
        }
        else
        {
            echo("
            <p style='color: red'>Le nom complet est vide</p>
            ");
        }
    }
}