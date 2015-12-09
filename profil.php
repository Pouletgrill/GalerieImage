<?php
session_start();
include_once("BaseDeDonne.php");
include_once("BDClass.php");
$gestion = new Gestion();

include_once("headpage.php");

if(isset($_SESSION["user"]))
{
    echo("Ceci est un profil");
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