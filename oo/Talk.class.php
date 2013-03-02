<?php 

# Here User TALK to LogHimIn &out. 

include_once "NocNoc.php"; 
include_once "User.interface.php";


class Talk extends NocNoc implements UserWill
{
    public function logHimIn($pseudo, $pwd)
    { 
        //secure the password ///
        $sec = hash(sha256, $pwd)

        // secure the login //////////////////////////////////////////////////////////////////
        $hello = $pdo->prepare('SELECT pseudo FROM slinkusers WHERE email = :a AND pwd = :b'); 
        
        // return a pseudo //////////////////////
        $hello->execute(':a'=>$pseudo,':b'=>$sec)

        // If login success receive $userIn ////
        if ($userIn = $this->pdo->query($hello))
        {
            session_start(); 
            header ('location: dashboard.php'); 
        } 
 
        return false; 
    }

    public function logHimOut() 
    {
        session_destroy(); 
        header ('location: ./index.php'); 
    }

    public function register($mail, $pseudo, $pwd/* #### PRENDRE UN PARAM ALEATOIRE #######*/)
    {
        //secure the password ///
        $sec = hash(sha256, $pwd)

        /* $token = PARAM RANDOM ##################### */

        $userFORM = array(
            'pse' => $pseudo,
            'mail'=> $email,
            'pwd' => $sec,
            'tok' => $token,
        );

        $regisTRY = $this->pdo->prepare('INSERT INTO slinkusers (pseudo, email, pwd, confirmToken) VALUES (:pse, :mail, :sec, :tok)');

    }
}