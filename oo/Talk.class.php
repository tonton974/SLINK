<?php 

# Here User TALK to LogHimIn &out. 

include_once 'NocNoc.php';
include_once 'UserWill.interface.php';


class Talk extends NocNoc implements UserWill
{
    public function logHimIn($email, $pwd)
    {
        // $sql == sqlfunction(:email :pwd) secure the login ///////////////////////
        // Helps prevent SQL injec: No need to manually quote the parameters ////////
        $sql   = "SELECT pseudo FROM slinkusers WHERE email = ? AND pwd = ?";
        $itsMe = $this->pdo->prepare($sql);
        $TESTT = $itsMe->execute(array($email,$pwd));
/*    
        // If login success receive $userIn ////
        if ($itsMe)
        {
            session_start();
            header ('location: dashboard.php');
        } 
 
        return false; 
*/    }

    public function logHimOut($pseudo) 
    {
        session_destroy(); 
        header ('location: ./index.php'); 
    }

    public function register($pseudo, $mail, $pwd)
    {
        // TRUE more entropy : Increases the unique-result likelihood 
        $token = sha1(uniqid(rand(),true)); #(23 characters).

        // PDO Prepared statement //////////////////////////////////////////////////////////
        $sql = "INSERT INTO slinkusers (pseudo, email, pwd, confirmToken) VALUES (?,?,?,?)";
        $newGUY = $this->pdo->prepare($sql);
        $newGUY->execute(array($pseudo,$mail,$pwd,$token));

        // Send confirmation email (MAC only) ///////////////////////////////////////////////////////////////////////////
        $to   = $email; 
        $subject = "Slink validation";
        $body = 'Hi, please follow this safe link to finish registeration :
            <a href="http://'.$_SERVER['HTTP_HOST'].'/activate.php?$token='.$token.'$email='.$to.'">White Rabbit</a>';
        $entete =   "MIME-Version:1.0\r\n";
        $entete .=  "Content-type: text/html; charset=UTF-8\r\n";
        $entete .=  "From: Slink.com::" . "\r\n " ."Reply-to:148282@supinfo.com " . "\r\n" ."X-mailer:PHP/" . phpversion();

        mail($to,$subject,$body,$entete);
    }

    
    public function already_exist($email, $pseudo)
    {
        $sql = "SELECT COUNT(*) FROM slinkusers WHERE pseudo = ? OR email = ?";
        $checker = $this->pdo->prepare($sql);
        $checker->execute(array(addslashes($pseudo, $email)));
        $foundU = $checker>rowCount($sql);
        return $foundU;
        // if ($foundU > 0) { die(name allready taken) }
    }


}