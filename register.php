 <!-- I see, you wanna Register dont'cha? -->

<?php require_once ('./static/head.php'); ?>

<?php 
require_once ('./oo/Talk.class.php'); 
require_once ('./oo/Work.class.php'); 

?>

<form method="post" action="">
	<fieldset>
		<ul>
	<li><input type="mail" 		value="eMail"	name="email" /></li>
	<li><input type="text" 		value="pseudo"	name="pseudo" /></li>	
	<li><input type="password"	value=""		name="pwd" /></li>
	<li>
		<input type="submit" 	value="Signup Now" name="signup" class="large blue button" />
	</li> 
		</ul>
	</fieldset> 
</form>

<?php require_once ('./static/footer.php'); ?>