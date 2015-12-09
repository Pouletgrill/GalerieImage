<?php
class Gestion
{
    private $bdd;
    function __construct()
    {
        global $bdd;
        $this->bdd = $bdd;
    }

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
            die("Erreur : MYSQL statement n'a pas pu �tre pr�par�");
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
            die("Erreur : MYSQL statement n'a pas pu �tre pr�par�");
        }
    }
}





