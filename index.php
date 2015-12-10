<?php
session_set_cookie_params(0);
session_start();
include_once("BaseDeDonne.php");
include_once("BDClass.php");
$Gestion = new Gestion();

//si qqun a check la box rester connecter
if(isset($_COOKIE["userCookie"]))
{
    $_SESSION["user"]=$_COOKIE["userCookie"];
}

//Ajouter l'entete
include_once("headpage.php");

if (isset($_POST["deconnect"]) && $_POST["deconnect"])
{
    session_destroy();                // supprime le fichier de session
    session_unset();
    setcookie("userCookie","",-1);
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
            $Gestion->DateRefresh($_SESSION["user"],date("Y-m-d H:i:s"));
            if ($_POST["cbx"]) //Créé le timeout
            {
                //Set Cookies
                setcookie("userCookie",$_SESSION["user"],(time()+24*60*60));
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