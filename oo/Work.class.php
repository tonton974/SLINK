<?php 

# Here User WORK with Links: Generate-SHow-Redirect-Freeze-Kill them sl!nks. 

require_once 'NocNoc.php';
require_once 'LinkWill.interface.php';
require_once 'LinkWill.interface.php';

class Work extends NocNoc implements LinkWill 
{
	public function generate($longUrl,$name,$byUser)
	{
		$name    = addslashes($name);
        $longUrl = addslashes($longUrl);

        // THERE IT IS THE MAIN SERVICE OF THE WEBSITE ///////////////////////////
        do { $Claude = uniqid(); } 
        while (strlen($Claude) > 0 && strlen($Claude) < 7);

        $shotCode = "http://". $_SERVER['HTTP_HOST'] . "/go.php?p=" . $Claude;

        $sql = "INSERT INTO slinkdb (longURL, name, shortCODE) VALUES (?,?,?)";
        $newLINK = $this->pdo->prepare($sql);
        $newLINK->execute(array($longUrl,$name,$shotCode));
	}

    public function getAll($sessPSEUDO)
    {
        $postsList = array();
    
        // Last entry first. ///////////////////////////////////////////////
        $sql = "SELECT * FROM slinkdb WHERE by = ? ORDER BY dateAdded DESC";
        $newSlink = $this->pdo->prepare($sql);
        $bag = $newSlink->execute($_SESSION['userID']);
    
        //Construction du tableau d'objets Post
        while($row = $bag->fetch(PDO::FETCH_ASSOC))
        {
            //Récupération de l'auteur
            $sql = "SELECT * FROM blog_user WHERE id= ?";
            $req2 = $this->pdo->prepare($sql);
            $req2->execute(array($row['user_id']));
            
            while($row2 = $req2->fetch(PDO::FETCH_ASSOC))
            {
                $author = new User($row2['id'], $row2['firstName'], $row2['lastName'], $row2['email'], $row2['password']);
                break; //Un seul tour de boucle
            }

            $post = new Post($row['id'], $row['title'], $row['body'], $row['publicationDate'], $author);
        
            array_push($postsList, $post);
        }
        return $postsList;
    }

    public function redirect($getCODE)
    {
    	////////////////////////////////////////////////////
    }

    public function disable($getCODE)
    {
    	////////////////////////////////////////////////////
    }

    public function delete($getCODE)
    {
    	////////////////////////////////////////////////////
    }

}

?>