<?php

$image = $_GET["i"];

echo '<div class="lediv"><img class="limg" src="./Images/'. $image .'"></div>';

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<hr>
<div class="delete">
    </form>
    <?php
    echo '<form action="delete.php" method="get">';
    echo '<input type="hidden" name="image" value="'. $image .'">';
    echo '<input type="submit" value="Delete">';
    echo '</form>';?>

    <form action="index.php" method="post">
        <input type="submit" value="Retour à l'accueil">


</div>
</body>
</html>
