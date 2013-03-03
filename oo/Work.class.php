<?php 

# Here User WORK with Links: Generate-SHow-Redirect-Freeze-Kill them sl!nks. 

require_once 'NocNoc.php';
require_once 'LinkWill.interface.php';
require_once 'LinkWill.interface.php';

class Work extends NocNoc implements LinkWill 
{
	
	public function generate   ($name,$longUrl)
	{
		$name = addslashes($name);
        $longUrl = addslashes($longUrl);

        
        
        //add to db
	}
    public function getAll     ($sessPSEUDO)
    {
        //$sql = "SELECT";
        //$hell = $dbh->prepare();
        // $sth->execute(array(
    	// $red = $sth->fetchAll() //////////////////////////////////////////////////
    }
    public function redirect   ($getCODE)
    {
    	////////////////////////////////////////////////////
    }        // I did not brok my head here.
    public function disable    ($getCODE)
    {
    	////////////////////////////////////////////////////
    }
    public function delete     ($getCODE)
    {
    	////////////////////////////////////////////////////
    }
}

?>