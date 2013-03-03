<?php 

# So you want to LOGIN ? Register Maybe?

require_once ('./oo/Talk.class.php');
require_once ('./oo/Work.class.php');

session_start();
global $err; //  Admit $errors :| see below //

// Check if NEW USER GO TO register
if (isset($_POST['signup']))
{
	header("location: register.php");
}

// Check if TRYING TO LOGIN
if (isset($_POST['email']) && $_POST['pwd'] )
{
	$mel = addslashes($_POST['email']);
	$pas = hash('sha256', ($_POST['pwd']));

	// Instanciate ///
	$tryer = new Talk;

	// Authenticate /////////////////////////
	$userOK = $tryer->logHimIn($mel, $pas);

	// Testing for authentication success///////////
	if ($userOK != $_POST['email'])
	{
		// Login IS effective /////
		$_SESSION['userIN'] = true;

		// logged effective FOR ////// 
		$_SESSION['userIS'] = $userOK;

		// Let's play now ///
		$work = new Work;

		// Redirect to DASHBOARD ///////////////////
		header ("Location: dashboard.php");
	}
	
	else $err = "wrong data given";
}

//  Admit errors ///////////////////////////////////
if ($err == "wrong data given") echo '<span style="color: red;">'.$err.' </span>';?>

<!-- LET ME IN ########################### -->

<form <form method="post" class="form-signin">
	<fieldset>
		<h5 class="form-signin-heading">Please sign in</h5>
		<input 	type="email" 	class="input-block-level" name="email"	placeholder="Email address">
		<input 	type="password" class="input-block-level" name="pwd"	placeholder="Password" name="pwd">
		<button type="submit"	action="login.php" class="btn btn-large btn-primary">Sign in</button>
		<input 	type="button"	onclick="self.location.href='register.php'" class="btn btn-large btn-primary" value= "Register"/>
	</fieldset>
</form>
	