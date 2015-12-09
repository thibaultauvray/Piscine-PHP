<?php
include 'template/header.php';
?>

 <div class="prod_ran">

<?php
echo "<section>";
	echo "<a href=ajout.php class='button ajout'>Ajouter un produit</a></section>";
$query = mysqli_query($link, "SELECT * FROM `produit`");
while (($array = mysqli_fetch_assoc($query)) !== NULL)
{
	echo "<section>";
	echo "<a href=modify.php?id=";
		echo $array['id'];
	echo ">";
	echo '<img src=../';
	echo $array['image'];
	echo "></a>";
	echo "<p class='product'><a href=modify.php?id=";
	echo $array['id'];
	echo ">";
	echo $array['nom']."</a></p>";
	echo "<p class='price'>".$array['prix']."</p>";
	echo "</section>";
}
?>

</div>