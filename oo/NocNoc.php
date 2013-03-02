<?php 
/** 
* Created by JetBrains PhpStorm 
* User: tonton 
* Date: 26/02/13 
* Time: 6:25 PM 
* To change this template use File | Settings | File Templates 
*/ 
class NocNoc { 
 
    protected $hello; 
 
    function __construct() // Database Connection Information necessary for PDO class usage
    { 
		$dbUser = 'root';
		$dbPwd = '';
		$dsn = 'mysql:host=localhost;dbname=slink';

		try // to connect 
		{
			$this->hello = new PDO($dsn, $dbUser, $dbPwd);
		}

		catch (PDOException $e)
		{
			die ("Error ! : " . $e->getMessage());
		}
	}
}