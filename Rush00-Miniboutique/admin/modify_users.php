<?php
include 'template/header.php';
include ('template/modify_client.php');

	if (isset($_GET['id']))
	{
		$id = mysqli_real_escape_string($link, $_GET['id']);
		$query = 'SELECT * FROM client WHERE id="'.$id.'"';
		$array = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($array);
	if (empty($row))
	{
		echo "<span class='erreur'>Une erreur est survenue, veuillez revenir a l'accueil</span>";
	}
	else
	{
?>
<div class="form admin_form">

	<form action="modify_users.php?id=<?php echo $_GET['id']; ?>" method="post">
		<fieldset>
			<h3>Modifier le compte</h3>
			<?php if(isset($err_enre)) echo "<span class'succ'>$err_enre</span>"; ?>
			<div class="labele">
		<label for="name">Email: </label><input type="text" name="mail" value="<?php echo $row['email'];?>" /> <br>
		<label for="name">Nom: </label><input type="text" name="lname" value="<?php echo $row['nom'];?>" /> <br>
		<label for="name">Prenom : </label><input type="text" name="fname" value="<?php echo $row['prenom'];?>" /> <br>
		<label for="name">Mot de passe : </label><input type="passwd" name="passwd" value="" /> <br>
		<label for="name">Adresse: </label><input type="text" name="address" value="<?php echo $row['adresse'];?>" /> <br>
		<label for="name">Code Postal: </label><input type="text" name="postal_code" value="<?php echo $row['code_postal'];?>" /> <br>
		<label for="name">Ville: </label><input type="text" name="city" value="<?php echo $row['ville'];?>" /> <br>
		<label for="name">Telephone: </label><input type="text" name="phone" value="<?php echo $row['telephone'];?>" /> <br>
		<input type="submit" name="modify" value="Modifier le client" />
		<input type="submit" name="delete" value="Supprimer le client" />
	</div>
		</fieldset>
	</form>
</div>
<?php
	}
	}
	else{
		echo "<span class='erreur'>Une erreur est survenue, veuillez revenir a l'accueil</span>";
	}

?>