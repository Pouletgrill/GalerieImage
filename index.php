<?php
session_set_cookie_params(0);
session_start();
include_once("BaseDeDonne.php");
include_once("BDClass.php");
$Gestion = new Gestion();
date_default_timezone_set('America/Montreal');

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
    if(isset($_POST["username"]) && $_POST["username"] != "")//si du text a �t� entr�e
    {
        //echo($_POST["username"]);
        //echo($_POST["psw"]);
        if ($Gestion->ValidConnexion($_POST["username"],$_POST["psw"]))
        {
            $_SESSION["user"] = $_POST["username"];
            $Gestion->DateRefresh($_SESSION["user"],date("Y-m-d H:i:s"),get_client_ip2());
            if ($_POST["cbx"]) //Cr�� le timeout
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

function get_client_ip2() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}