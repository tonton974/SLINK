<?php 

# I see, you wanna Register dont'cha?

require_once './oo/Talk.class.php';
require_once './oo/Work.class.php';

global $err; //  Admit $errors :| see below //

// ERROR Pwd do not match /////////////
if (isset($_POST['pseudo']) && ($_POST['pwd'] !== $_POST['pwdc'])) 
{
	$err = "Passwords do not match!";
}

// Got a pseudo in the form. ////////////////////////////////////////////////////////////////////////////////////////////////
// Validate email format. ///////////////////////////////////////////////////////////////////////////////////////////////////
// Passwords do match. //////////////////////////////////////////////////////////////////////////////////////////////////////
else if (isset($_POST['pseudo']) && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) && ($_POST['pwd']) == ($_POST['pwdc'])) 
{
	// Prepare parameters /////////////////
	$pse = addslashes($_POST['pseudo']);
	$mel = addslashes($_POST['email']);
	$pas = hash('sha256', ($_POST['pwd']));

	// Instanciate ////
	$surfer = new Talk;

	// Authenticate //////////////////////////////
	$surfer->register($pse, $mel, $pas);

}

require_once ('./static/head.php'); 

?>
<div class="coontainer">
	<form <form method="post" action="register.php" class="form-signin">
		<fieldset>
			<h5 	class="form-signin-heading">Hello and welcome</h5>
			<input 	type="text" 	class="input-block-level" name="pseudo"	placeholder="pseudo">
			<input 	type="email" 	class="input-block-level" name="email"	placeholder="Email address">
			<input 	type="password" class="input-block-level" name="pwd"	placeholder="Password">
			<input 	type="password" class="input-block-level" name="pwdc"	placeholder="Password">
			<button type="submit"	class="btn btn-large btn-primary"> Register </button>
		</fieldset>
	</form>
</div>

<?php require_once '/static/foot.php'; ?>