<?php
include 'template/header.php';
include ('template/modify.php');

	if (isset($_GET['id']))
	{
		$id = mysqli_real_escape_string($link, $_GET['id']);
		$query = 'SELECT * FROM produit WHERE id="'.$id.'"';
		$array = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($array);

		$query_cat = 'SELECT * FROM categories';
		$array_cat = mysqli_query($link, $query_cat);
		$query_cat_prod = "SELECT * FROM categories_products, produit, categories WHERE produit.id = id_produit AND produit.id = $id AND categories.id = categories_products.id_categories";
		$array_cat_prod = mysqli_query($link, $query_cat_prod);
		$row_cat = mysqli_fetch_assoc($array_cat_prod);
	if (empty($row))
	{
		echo "<span class='erreur'>Une erreur est survenue, veuillez revenir a l'accueil</span>";
	}
	else
	{
?>
<div class="form admin_form">

	<form action="modify.php?id=<?php echo $_GET['id']; ?>" method="post">
		<fieldset>
			<h3>Modifier le compte</h3>
			<div class="labele">
		<img src="../<?php echo $row['image']; ?>" alt="">
		<label for="name">Nom du produit: </label><input type="text" name="nom" value="<?php echo $row['nom'];?>" /> <br>
		<label for="prix">Prix : </label> <input type="text" name="prix" value="<?php echo $row['prix'] ?>"> <br>
<?php while ($po = mysqli_fetch_assoc($array_cat)) { 
		if ($row_cat['id_categories'] == $po['id'])
		{
		$row_cat = mysqli_fetch_assoc($array_cat_prod);
?>
		 <INPUT type="checkbox" name="cate[]" value="<?php echo $po['id']; ?>" checked> <?php echo $po['nom']; ?> <br>
<?php 
} 
else
{
?>
<INPUT type="checkbox" name="cate[]" value="<?php echo $po['id']; ?>"> <?php echo $po['nom']; ?> <br>
	<?php
}
}
	?>
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