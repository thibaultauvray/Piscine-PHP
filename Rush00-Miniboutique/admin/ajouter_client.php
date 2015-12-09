<?php
include 'template/header.php';
include ('template/ajouter_client.php');

?>
<div class="form admin_form">

	<form action="ajouter_client.php" method="post">
		<fieldset>
			<h3>Ajouter un client</h3>
			<?php if(isset($err_enre)) echo "<span class'succ'>$err_enre</span>"; ?>
			<div class="labele">
				<label for="name">Email : </label><input type="text" name="mail" value="" /> <br>
				<label for="name">Nom : </label><input type="text" name="fname" value="" /> <br>
				<label for="name">Prenom : </label><input type="text" name="lname" value="" /> <br>
				<label for="name">Mot de passe : </label><input type="text" name="passwd" value="" /> <br>
				<label for="name">Adresse : </label><input type="text" name="postal_code" value="" /> <br>
				<label for="name">Code Postal : </label><input type="text" name="address" value="" /> <br>
				<label for="name">Ville : </label><input type="text" name="city" value="" /> <br>
				<label for="name">Telephone : </label><input type="text" name="phone" value="" /> <br>
				<input type="submit" name="register" value="Ajouter la categorie" />
			</div>
		</fieldset>
	</form>
</div>
<?php

?>