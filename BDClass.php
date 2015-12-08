<?php
class Gestion
{
    private $bdd;
    function __construct()
    {
        global $bdd;
        $this->bdd = $bdd;
    }

    function ValidIdentity($Username)
    {
        //check dans la BD
        return true;
    }

    function AddUserBD($FFullname,$FUsername,$FPassword)
    {
        if($sqlInsert = $this->bdd->prepare("INSERT INTO usager(User,Password,Fullname) VALUES(?,?,?)"))
        {

            $sqlInsert->bindParam(1,$FUsername, PDO::PARAM_STR);
            $sqlInsert->bindParam(2,$FPassword, PDO::PARAM_STR);
            $sqlInsert->bindParam(3,$FFullname, PDO::PARAM_STR);

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
}





