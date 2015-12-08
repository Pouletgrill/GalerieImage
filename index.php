<?php
session_set_cookie_params(0);
session_start();
include_once("BaseDeDonne.php");
include_once("BDClass.php");
$Gestion = new Gestion();

//Ajouter l'entete
include_once("headpage.php");

if (isset($_POST["deconnect"]) && $_POST["deconnect"])
{
    session_destroy();                // supprime le fichier de session
    session_unset();
    header("Location: index.php");
}

if (!isset($_SESSION["user"]))
{
    if(isset($_POST["username"]) && $_POST["username"] != "")//si du text a été entrée
    {
        //echo($_POST["username"]);
        //echo($_POST["psw"]);
        if ($Gestion->ValidConnexion($_POST["username"],$_POST["psw"]))
        {
            $_SESSION["user"] = $_POST["username"];
            if ($_POST["cbx"]) //Créé le timeout
            {
                $_SESSION["loggin_time"] = time();
                //Set Cookies
            }
            header("Location: index.php");
        }
        else
        {
            echo("
            <p style='color: red;text-align: center'>l'identifiant ou le mot de passe est incorrect</p>
            ");
        }
    }
    include_once("login.php");
}
else
{
   /* if (isset($_SESSION["loggin_time"]))
        echo($_SESSION["loggin_time"]);
   */
    include_once("galerie.php");
}
include_once("footpage.html");