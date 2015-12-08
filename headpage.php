<div style="width: 100%;height: auto;background-color: darkseagreen; text-align: center">
    <hr/>
    <div style="text-align: right;margin-right: 20px">
        <?php
        if (isset($_SESSION["user"]))
        {
        echo("
            <form action='index.php' method='post'>
            <input type='submit' value='Déconnexion' name='deconnect'>
            </form>
            ");
            if ($_SESSION["user"]=="admin")
            {
                echo("
            <form action='adminPage.php' method=''>
            <input type='submit' value='Gestion Admin'>
            </form>
            ");
            }
        }
        ?>
    </div>
    <p style="font-size: 25px;font-weight: bold">Check moé ça!</p>
    <hr/>
</div>