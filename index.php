<?php
session_start();
include_once("BaseDeDonne.php");
include_once("headpage.html");
if (!isset($_SESSION["user"]))
{
    include_once("login.php");
}
else
{
    include_once("galerie.php");
}
include_once("footpage.html");