<?php
include 'template/header.php';
 ?>

 <div class="prod_ran">

 <?php

if (isset($_GET['id']))
{
	$id = mysqli_real_escape_string($link, $_GET['id']);
	$query = "SELECT produit.nom, image, prix, produit.id FROM produit, categories, categories_products WHERE id_categories = $id AND id_produit = produit.id AND id_categories = categories.id ORDER BY produit.nom ASC";
	$array = mysqli_query($link, $query);
	while ($row = mysqli_fetch_assoc($array))
	{
?>
<section>
	<a href=single.php?id=<?php echo $row['id']; ?>>
	<img src=<?php echo $row['image']; ?>></a>
	<p class='product'><a href=single.php?id=<?php echo $row['id']; ?>>
	<?php echo $row['nom']; ?></a></p>
	<p class='price'><?php echo $row['prix']; ?></p>
</section>

<?php

} // WHILE

?>
</div>
<?php

include 'template/footer.php';
}
?>
