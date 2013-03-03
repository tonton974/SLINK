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
        $sql   = "SELECT userid FROM slinkusers WHERE email = ? AND pwd = ?";
        $itsMe = $this->pdo->prepare($sql);
        $_SESSION['userID'] = $itsMe->execute(array($email,$pwd));
/*    
        // If login success receive $userIn ////
        if ($itsMe)
        {
            session_start();
            header ('location: dashboard.php');
        } 
 
        return false; 
*/    }

    public function logHimOut($userid) 
    {
        session_start();
        session_unset();
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

        /*// Send confirmation email (MAC only) ///////////////////////////////////////////////////////////////////////////
        $from = "Slink Webmaster <148282@supinfo.com>";
        $to = "Ramona Recipient <$email>";
        $subject = "Slink validation";
        $body = "Bonjour, veuillez activer votre compte en cliquent ici : <a href=\"http://'.$_SERVER\['HTTP_HOST'].'/activate.php?$token='.$token.'$email='.$to.'\">Activation du compte</a>'";
        $entete =   "MIME-Version:1.0\r\n";
        $entete .=  "Content-type: text/html; charset=UTF-8\r\n";
        $entete .=  "From: Slink.com::" . "\r\n " ."Reply-to:148282@supinfo.com " . "\r\n" ."X-mailer:PHP/" . phpversion();

        $entete = str_replace("\n.", "\n..", $entete);
        mail($to,$subject,$body,$entete);*/
    }

    
    public function already_exist($email, $pseudo)
    {
        $sql = "SELECT COUNT(*) FROM slinkusers WHERE pseudo = ? OR email = ?";
        $checker = $this->pdo->prepare($sql);
        $checker->execute(array(addslashes($pseudo, $email)));
        $foundU = $checker>rowCount($sql);

        if ($foundU > 0) { die('name allready taken'); }
    }


}