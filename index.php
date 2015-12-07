<?php
session_start();
include_once("BaseDeDonne.php");
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
        if ($_POST["username"]=="123" && $_POST["psw"]=="456")///////////Pluger a la BD
        {
            $_SESSION["user"] = $_POST["username"];
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
    include_once("galerie.php");
}
include_once("footpage.html");