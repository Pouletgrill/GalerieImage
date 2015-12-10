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
        Rester connecté:
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
            <p style='color: red;text-align: center'>L'identifiant est deja utilisé</p>
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
            if($Gestion->AddUserBD($_POST["fullname_n"],$_POST["username_n"],$_POST["psw_n1"],get_client_ip(),"2000-12-12 23:23:23"))//Conmpte créé
            {
                echo("
            <p style='color: blue;text-align: center'>Compte crée!</p>
            ");
                unset($_POST["add"]);
            }
            else
            {
                echo("
            <p style='color: red;text-align: center'>Une érreur est survenue lors de la création de l'usager</p>
            ");
            }
        }
    }
echo("
    <h3>Pas de compte ? Crée toi en un !</h3>
    <form action='index.php' method='post'>
        Nom complet:<br>
        <input type='text' name='fullname_n' maxlength='50'>
        <br>
        Identifiant:<br>
        <input type='text' name='username_n' maxlength='50'>
        <br>
        Mot de passe:<br>
        <input type='password' name='psw_n1' maxlength='50'>
        <br>
        Confirmer mot de passe:<br>
        <input type='password' name='psw_n2' maxlength='50'>
        <br><br>
        <input type='submit' value='Créer' name='add'>
    </form>
</div>
");

function get_client_ip() {
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