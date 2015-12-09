<?php
	include ('template/header.php');
	include "template/create.php";
	include "template/login.php";

?>

<div class="form">
<form id="create-account_form" class="std" method="post" action="create.php">
	<fieldset>
		<h3>Creer un compte</h3>
		<?php   
		if(isset($err_enre))
		{
			if ($err_enre === TRUE)
				echo "<span class='succ'>Votre compte a été créé avec succès</span>";
			else
				echo "<span class='erreur'> $err_enre </span>";
				
		}
	?>
		<div class="labele">
		<label for="email">E-mail : </label><input id="email" type="email" name="mail" /> <br>
		<label for="fname">Prénom : </label><input id="fname" type="text" name="fname" /> <br>
		<label for="lname">Nom : </label><input id="lname" type="text" name="lname" /> <br>
		<label for="passwd">Mot de pase : </label><input id="passwd" type="password" name="passwd" /> <br>
		<label for="postal_code">Code postal : </label><input id="postal_code" type="text" name="postal_code" /> <br>
		<label for="adress">Adresse : </label><input id="adress" type="text" name ="address" /> <br>
		<label for="city">Ville : </label><input id="city" type="text" name ="city" /> <br>
		<label for="telephone">Telephone : </label><input id="telephone" type="telephone" name="phone"> <br>
		<input type="submit" class="submit" value="Creer un compte" name="register">
		</div>
	</fieldset>
</form>
</div>

<div class="form">
<form id="create-account_form" class="std" method="post" action="create.php">
	<fieldset>
		<h3>Se connecter</h3>
		<?php   
		if(isset($conne))
		{
				echo "<span class='erreur'>$conne</span>";
		}
		?>
		<div class="labele">
		<label for="email">E-mail : </label><input id="email" type="email" name="mail" /> <br>
		<label for="passwd">Mot de pase : </label><input id="passwd" type="password" name="passwd" /> <br>
		<input type="submit" class="submit" name="conne" value="Se connecter">
		</div>
	</fieldset>
</form>
</div>