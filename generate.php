<?php 

require_once './oo/Talk.class.php';

// Check if TRYING TO Generate Link. ////////
if (!empty($_POST['longUrl']) && !empty($_POST['name']) )
{
	// Get the variables //
	$long = $_POST['longUrl'];
	$name = $_POST['name'];

	$newBOND = new Work;

	
}
?>



<a href="./logout.php" class="btn btn-mini btn-warning">logout</a>
<!-- <button type="button" method="post" name="logout" class="btn btn-mini btn-warning">Logout</button> -->

<form method="post">
	<fieldset>
		<input 	type="url" 	  class="input-block-level" name="longUrl"	placeholder="The link You want to shrink">
		<input 	type="text"   class="input-block-level" name="name"		placeholder="Give it a name so it's pretty">
		<button type="submit" class="btn btn-large btn-primary">Slink it!</button>
	</fieldset>
</form>

