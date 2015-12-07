<?php
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
        <input type='submit' value='Connexion'>
    </form>
    <hr>
    <h3>Pas de compte ? Crée toi en un !</h3>
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
        <input type='submit' value='Créer'>
    </form>
</div>

");
