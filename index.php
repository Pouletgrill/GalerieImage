<?php
session_start();
include_once("BaseDeDonne.php");
include_once("headpage.html");
if (!isset($_SESSION["user"]))
{
    if(isset($_POST["username"]) && $_POST["username"] != "")//si du text a été entrée
    {
        //echo($_POST["username"]);
        //echo($_POST["psw"]);
        if ($_POST["username"]=="123" && $_POST["psw"]=="456")
        {
            echo("
            <p style='color: blue;text-align: center'>Bon identifiant</p>
            ");
            $_SESSION["user"] = $_POST["username"];
        }
        else
        {
            echo("
            <p style='color: red';text-align: center>l'identifiant ou le mot de passe est incorrect</p>
            ");
        }
    }
    else
    {
        //Rien a faire
        echo("not set");
    }
    include_once("login.php");
}
else
{
    include_once("galerie.php");
}
include_once("footpage.html");