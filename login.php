<?php
include_once("BDClass.php");

$Gestion = new Gestion();

echo("
<div style='text-align: center;width: auto'>
    <h3>Connexion</h3>
    <form action='index.php' method='post'>
        Identifiant:<br>
        <input type='text' name='username'>
        <br>
        Mot de passe:<br>
        <input type='password' name='psw'>
        <br>
        Rester connect�:
        <input type='checkbox' name='cbx'>
        <br><br>
        <input type='submit' value='Connexion' name='login'>
    </form>
    <hr>");

    if (isset($_POST["add"]) && $_POST["add"])
    {
        if($_POST["username_n"] == "" ||
            $_POST["fullname_n"] == "" ||
            $_POST["psw_n1"] == "" ||
            $_POST["psw_n2"] == "")
        {
            echo("
            <p style='color: red;text-align: center'>Un des champs est vide</p>
            ");
        }
        else if (!$Gestion->ValidIdentity($_POST["username_n"]))
        {
            echo("
            <p style='color: red;text-align: center'>L'identifiant est deja utilis�</p>
            ");
        }
        else if($_POST["psw_n1"] != $_POST["psw_n2"])
        {
            echo("
            <p style='color: red;text-align: center'>Le mot de passe n'est pas correctement confirmer</p>
            ");
        }
        else
        {
            if($Gestion->AddUserBD($_POST["fullname_n"],$_POST["username_n"],$_POST["psw_n1"]))//Conmpte cr��
            {
                echo("
            <p style='color: blue;text-align: center'>Compte cr�e!</p>
            ");
                unset($_POST["add"]);
            }
            else
            {
                echo("
            <p style='color: red;text-align: center'>Une �rreur est survenue lors de la cr�ation de l'usager</p>
            ");
            }
        }
    }
echo("
    <h3>Pas de compte ? Cr�e toi en un !</h3>
    <form action='index.php' method='post'>
        Nom complet:<br>
        <input type='text' name='fullname_n'>
        <br>
        Identifiant:<br>
        <input type='text' name='username_n'>
        <br>
        Mot de passe:<br>
        <input type='password' name='psw_n1'>
        <br>
        Confirmer mot de passe:<br>
        <input type='password' name='psw_n2'>
        <br><br>
        <input type='submit' value='Cr�er' name='add'>
    </form>
</div>
");