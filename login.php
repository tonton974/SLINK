<?php 

# So you want to LOGIN ? Register Maybe?

require_once ('./oo/Talk.class.php');
require_once ('./oo/Work.class.php');

session_start();

// Check if NEW USER GO TO register
if (isset($_POST['signup']))
{
	header("location: ./register.php")
}

// Check if TRYING TO LOGIN
if (isset($_POST['signin']))
{
	$pse = $_POST['pseudo']
	$pas = $_POST['pwd']

	// Instanciate ///
	$tryer = new User;

	// Authenticate /////////////////////////
	$userOK = $tryer->logHimIn($pse, $pas)

	// Testing for authentication success///////////
	if ($userOK != $_POST['pseudo'])
	{
		// Login IS effective /////
		$_SESSION['userIN'] = true;

		// logged effective FOR ////// 
		$_SESSION['userIS'] = $userOK;

		// Let's play now ///
		$work = new Work;

		// Redirect to DASHBOARD ///////////////////
		header ("Location: ./static/dashboard.php");
	}
	
	else $err = "wrong data given";
}

?>

<h2>Login or SignIn ?</h2>
<br>

<?php # Admit errors ###############################
if ($err == "wrong data given") 
echo '<span style="color: red;">'.$err.' </span>';?>

<!-- LET ME IN ####################################################################################-->
<form method="post" action="">
	<fieldset>
		<ul>
	<li><input type="text2user" name="pseudo"	value="pseudo" /></li> 
	<li><input type="password" 	name="pwd" 		value="" /></li> 
	<li><input type="submit" 	name="signin" 	value="Sign In" 	class="large blue button" /></li>
	<li><input type="submit" 	name="signup"	value="Signup Now"  class="large blue button" />
	</li>
		</ul>
	</fieldset> 
</form>