<head>
    <link rel='stylesheet' type='text/css' href='styles.css'>
</head>
<?php
session_start();
include_once("BaseDeDonne.php");
include_once("BDClass.php");
$gestion = new Gestion();

include_once("headpage.php");
$image = $_GET["i"];
$ImageInfos=0;
if(($ImageInfos = $gestion->GetInfoFromImage($image)))
{
    $imageUser = $ImageInfos[0][0];
    $imageDate = $ImageInfos[0][1];
}

gestionPost($gestion);
//Section Image
echo ("
<div class='lediv'>
    <img class='limg' src='./Images/". $image ."'>
</div>
<div class='comment'>
    <p>Auteur: ".$imageUser."</p>
    <p>Date de Création: ".$imageDate."</p>
</div>
");

//Sections Commentaire
echo("
<hr>
<div class='comment'>
commentaire
");
$tableauCommentaire = $gestion->GetCommentaireFromImage($image);
echo("
    <table border='1' style='width:100%'>
    <tr>
        <td>User</td>
        <td>Date</td>
        <td>Commentaire</td>
    </tr>
    ");
for($i = 0; $i < count($tableauCommentaire);$i++) //TABLEAU
{
    echo("
        <tr>
            <td>".$tableauCommentaire[$i][0]."</td>
            <td>".$tableauCommentaire[$i][1]."</td>
            <td>".$tableauCommentaire[$i][2]."</td>");
    if ($tableauCommentaire[$i][0] == $_SESSION["user"]||$_SESSION["user"] =="admin")
    echo("
            <form action='gestimage.php' method='post'>
                <td>
                    <input type='submit' value='Supprimer' name='SupCom'>
                    <input type='hidden' value='".$tableauCommentaire[$i][3]."' name='IdImagePost'>
                </td>
            </form>
        </tr>
        ");
}
echo("
</table>
</div>
");

//////////////////////////////
echo("<hr>
<div class='delete'>
");
//Boutton Delete
if ($imageUser == $_SESSION["user"] || $_SESSION["user"] == "admin")
{
    echo("
    <form action='delete.php' method='get'>
        <input type='hidden' name='image' value='". $image ."'>
        <input type='submit' value='Supprimer'>
    </form>
");
}

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

function gestionPost($fgestion)
{
    if(isset($_POST["SupCom"]) && $_POST["SupCom"])
    {
        $fgestion->DelCommentaireBd($_POST["IdImagePost"]);
        header("location: index.php");
    }
}