<?php
class Gestion
{
    private $bdd;
    function __construct()
    {
        global $bdd;
        $this->bdd = $bdd;
    }

    //Gestion Usager
    //////////////////////////////////////////////////////////////////////////////////////////////
    function ValidIdentity($FUsername)
    {
            $sqlSelect = $this->bdd->prepare("SELECT * FROM USAGER WHERE User = ?");

            $sqlSelect->bindParam(1,$FUsername, PDO::PARAM_STR);

            $sqlSelect ->execute();
            $toutlesUsagers =  $sqlSelect->fetchAll();
            $sqlSelect->closeCursor();

            return  (empty($toutlesUsagers)) ;
    }
    function ValidConnexion($FUsername,$FPassword)
    {
        $sqlSelect = $this->bdd->prepare("SELECT * FROM USAGER WHERE User=? AND Password=? ");

        $sqlSelect->bindParam(1,$FUsername, PDO::PARAM_STR);
        $sqlSelect->bindParam(2,$FPassword, PDO::PARAM_STR);

        $sqlSelect ->execute();
        $toutlesUsagers =  $sqlSelect->fetchAll();
        $sqlSelect->closeCursor();

        return  (!empty($toutlesUsagers)) ;
    }
    function AddUserBD($FFullname,$FUsername,$FPassword,$FIpAdress,$FDate)
    {
        if($sqlInsert = $this->bdd->prepare("INSERT INTO usager(User,Password,Fullname,Ipadress,timeconnexion) VALUES(?,?,?,?,?)"))
        {

            $sqlInsert->bindParam(1,$FUsername, PDO::PARAM_STR);
            $sqlInsert->bindParam(2,$FPassword, PDO::PARAM_STR);
            $sqlInsert->bindParam(3,$FFullname, PDO::PARAM_STR);
            $sqlInsert->bindParam(4,$FIpAdress, PDO::PARAM_STR);
            $sqlInsert->bindParam(5,$FDate, PDO::PARAM_STR);

            if($sqlInsert->execute())
            {
                $sqlInsert->closeCursor();
                return true;
            }
            else
            {
                $sqlInsert->closeCursor();
                return false;
            }
        }
        else
        {
            die("Erreur : MYSQL statement n'a pas pu être préparé");
        }
    }
    function SelectUsager()
    {
        if($sqlSelect = $this->bdd->prepare("SELECT * FROM USAGER"))
        {
            $sqlSelect ->execute();
            $toutlesUsagers =  $sqlSelect->fetchAll();
            $sqlSelect->closeCursor();

            return  $toutlesUsagers ;

        }
        else
        {
            die("Erreur : MYSQL statement n'a pas pu être préparé");
        }
    }
    function SelectUsagerInFo($fUser)
    {
        if($sqlSelect = $this->bdd->prepare("SELECT * FROM USAGER WHERE user=?"))
        {
            $sqlSelect ->bindParam(1, $fUser, PDO::PARAM_STR);
            $sqlSelect ->execute();
            $toutlesUsagers =  $sqlSelect->fetchAll();
            $sqlSelect->closeCursor();

            return  $toutlesUsagers ;

        }
        else
        {
            die("Erreur : MYSQL statement n'a pas pu être préparé");
        }
    }
    function UpdatePswd($fUser,$FPswd)
    {
        $sqlInsert = $this->bdd->prepare("UPDATE Usager SET password=? WHERE User=?");

        $sqlInsert->bindParam(1, $FPswd, PDO::PARAM_STR);
        $sqlInsert->bindParam(2, $fUser, PDO::PARAM_STR);

        if ($sqlInsert->execute()) {
            $sqlInsert->closeCursor();
            return true;
        } else {
            $sqlInsert->closeCursor();
            return false;
        }
    }
    function UpdateFullname($fUser,$FFullname)
    {
        $sqlInsert = $this->bdd->prepare("UPDATE Usager SET Fullname=? WHERE User=?");

        $sqlInsert->bindParam(1, $FFullname, PDO::PARAM_STR);
        $sqlInsert->bindParam(2, $fUser, PDO::PARAM_STR);

        if ($sqlInsert->execute()) {
            $sqlInsert->closeCursor();
            return true;
        } else {
            $sqlInsert->closeCursor();
            return false;
        }
    }
    function DeleteUser($FUser)
    {
        /*$sqlInsert1 = $this->bdd->prepare("DELETE FROM Commentaire WHERE User=?");
        $sqlInsert1->bindParam(1, $FUser, PDO::PARAM_STR);
        $sqlInsert1->execute();
        $sqlInsert1->closeCursor();

        $sqlInsert2 = $this->bdd->prepare("DELETE FROM image WHERE User=?");
        $sqlInsert2->bindParam(1, $FUser, PDO::PARAM_STR);
        $sqlInsert2->execute();
        $sqlInsert2->closeCursor();*/

        $sqlInsert3 = $this->bdd->prepare("DELETE FROM Usager WHERE User=?");
        $sqlInsert3->bindParam(1, $FUser, PDO::PARAM_STR);
        $sqlInsert3->execute();
        $sqlInsert3->closeCursor();
        $sqlInsert3->closeCursor();
    }
    function DateRefresh($FUser,$FDatetime)
    {
        $sqlInsert = $this->bdd->prepare("UPDATE Usager SET timeconnexion=? WHERE User=?");

        $sqlInsert->bindParam(1, $FDatetime, PDO::PARAM_STR);
        $sqlInsert->bindParam(2, $FUser, PDO::PARAM_STR);

        if ($sqlInsert->execute()) {
            $sqlInsert->closeCursor();
            return true;
        } else {
            $sqlInsert->closeCursor();
            return false;
        }
    }

    //Gestion Image
    //////////////////////////////////////////////////////////////////////////////////////////////
    function AddImageBd($fImageName,$fUser,$fDate)
    {
        $sqlInsert = $this->bdd->prepare("INSERT INTO image(IdImage,User,date) VALUES(?,?,?)");

        $sqlInsert->bindParam(1, $fImageName, PDO::PARAM_STR);
        $sqlInsert->bindParam(2, $fUser, PDO::PARAM_STR);
        $sqlInsert->bindParam(3, $fDate, PDO::PARAM_STR);

        if ($sqlInsert->execute()) {
            $sqlInsert->closeCursor();
            return true;
        } else {
            $sqlInsert->closeCursor();
            return false;
        }
    }
    function DelImageBd($FImageName)
    {
        $sqlDelete = $this->bdd->prepare("DELETE FROM Image WHERE IdImage = ?");

        $sqlDelete->bindParam(1, $fImageName, PDO::PARAM_STR);
        $sqlDelete->execute();
        $sqlDelete->closeCursor();
    }
    function GetInfoFromImage($ImageId)
    {
        if($sqlSelect = $this->bdd->prepare("SELECT user, date FROM image WHERE IdImage=?"))
        {
            $sqlSelect->bindParam(1, $ImageId, PDO::PARAM_STR);
            $sqlSelect ->execute();
            $usager =  $sqlSelect->fetchAll();
            $sqlSelect->closeCursor();

            return  $usager ;

        }
        else
        {
            die("Erreur : MYSQL statement n'a pas pu être préparé");
        }
    }

    //Gestion Commentaire
    //////////////////////////////////////////////////////////////////////////////////////////////
    function CommenterPhoto($FIdImage,$FUser,$FDate,$FCommentaire)
    {
        $sqlInsert = $this->bdd->prepare("INSERT INTO Commentaire(IdImage,User,Date,commentaire) VALUES(?,?,?,?)");

        $sqlInsert->bindParam(1, $FIdImage, PDO::PARAM_STR);
        $sqlInsert->bindParam(2, $FUser, PDO::PARAM_STR);
        $sqlInsert->bindParam(3, $FDate, PDO::PARAM_STR);
        $sqlInsert->bindParam(4, $FCommentaire, PDO::PARAM_STR);

        if ($sqlInsert->execute()) {
            $sqlInsert->closeCursor();
            return true;
        } else {
            $sqlInsert->closeCursor();
            return false;
        }
    }
    function GetCommentaireFromImage($FIdImage)
    {
       if($sqlSelect = $this->bdd->prepare("SELECT user,date,commentaire,IdCommentaire FROM commentaire WHERE IdImage=?"))
        {
            $sqlSelect ->bindParam(1, $FIdImage, PDO::PARAM_STR);
            $sqlSelect ->execute();
            $toutlesUsagers =  $sqlSelect->fetchAll();
            $sqlSelect->closeCursor();

            return  $toutlesUsagers ;

        }
        else
        {
            die("Erreur : MYSQL statement n'a pas pu être préparé");
        }
    }
    function DelCommentaireBd($IdCommentaire)
    {
        $sqlDelete = $this->bdd->prepare("DELETE FROM commentaire WHERE IdCommentaire=?");

        $sqlDelete->bindParam(1, $IdCommentaire, PDO::PARAM_STR);
        $sqlDelete->execute();
        $sqlDelete->closeCursor();
    }
}





