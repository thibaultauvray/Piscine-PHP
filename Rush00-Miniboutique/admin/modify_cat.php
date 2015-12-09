<?php
include 'template/header.php';
include ('template/modify_cat.php');

	if (isset($_GET['id']))
	{
		$id = mysqli_real_escape_string($link, $_GET['id']);
		$query = 'SELECT * FROM categories WHERE id="'.$id.'"';
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

	<form action="modify_cat.php?id=<?php echo $_GET['id']; ?>" method="post">
		<fieldset>
			<h3>Modifier le compte</h3>
			<?php if(isset($err)) echo "<span class'succ'>$err</span>"; ?>
			<div class="labele">
		<label for="name">Nom de la categories: </label><input type="text" name="nom" value="<?php echo $row['nom'];?>" /> <br>
		<input type="submit" name="modify" value="Modifier le produit" />
		<input type="submit" name="delete" value="Supprimer le produit" />
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