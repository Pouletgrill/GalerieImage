<head>
    <link rel='stylesheet' type='text/css' href='styles.css'>
</head>
<?php
include_once("headpage.php");
$image = $_GET["i"];

//Section Image
echo ("<div class='lediv'><img class='limg' src='./Images/". $image ."'></div>");

//Sections Commentaire
echo("
<hr>
<div class='comment'>
commentaire
");

    //Foreach commentaire

echo("
</div>
");




//////////////////////////////
echo("<hr>
<div class='delete'>
");
//Boutton Delete
echo("
    <form action='delete.php' method='get'>
        <input type='hidden' name='image' value='". $image ."'>
        <input type='submit' value='Supprimer'>
    </form>
");

//Boutton Commenter
echo("
    <form action='comment.php' method='post'>
        <input type='text' name='commentaireSec' maxlength='150'>
        <input type='hidden' name='image' value='". $image ."'>
        <input type='submit' value='Commenter'>
    </form>
");

//Boutton Retour
echo("
    <form action='index.php' method='post'>
        <input type='submit' value='Retour'>
    </form>
    </div>
");

include_once("footpage.html");