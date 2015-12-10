<?php
session_start();
include_once("BaseDeDonne.php");
include_once("BDClass.php");
$Gestion = new Gestion();
date_default_timezone_set('America/Montreal');

include_once("headpage.php");

$target_dir = "./Images/";
$target_file = $target_dir . basename($_FILES["fichier"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fichier"]["tmp_name"]);
    if($check !== false) {
        echo "Le fichier est une image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file) && $uploadOk == 1) {
    echo "D�sol�. Ce fichier existe d�j�.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fichier"]["size"] > 4000000 && $uploadOk == 1) {
    echo "D�sol�. Ce ficier est trop large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"  && $uploadOk == 1) {
    echo "D�sol�. Seulement les fichiers JPG, JPEG, PNG & GIF sont accept�s.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "D�sol�. Votre fichier n'as pas �t� t�l�vers�.";
// if everything is ok, try to upload file
} else {
    $RandUniqId = uniqid("img_",false);
    if (move_uploaded_file($_FILES["fichier"]["tmp_name"],$target_dir.$RandUniqId /*$target_file*/)) //Si ca marche!
    {
        echo "Le fichier ". basename( $_FILES["fichier"]["name"]). " a �t� t�l�vers�.";
        $Gestion->AddImageBd($RandUniqId,$_SESSION["user"],date("Y-m-d H:i:s"));
        //echo($_SESSION["user"]);
    } else {
        echo "D�sol�. Il y a eu un erreur avec le fichier.";
    }
}
?>
<br>
<form action="index.php" method="post">
<input type="submit" value="Retour � l'accueil">
<?php
include_once("footpage.html");