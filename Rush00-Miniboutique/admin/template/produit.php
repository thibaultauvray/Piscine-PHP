<?php
include 'template/header.php';
?>

<div>
<?php
$query = mysqli_query($link, "SELECT * FROM `produit` ORDER BY RAND()");
while (($array = mysqli_fetch_assoc($query)) !== NULL)
{
	echo "<section>";
	echo "<a href=single.php?id=";
		echo $array['id'];
	echo ">";
	echo '<img src=../';
	echo $array['image'];
	echo "></a>";
	echo "<p class='product'><a href=single.php?id=";
	echo $array['id'];
	echo ">";
	echo $array['nom']."</a></p>";
	echo "<p class='price'>".$array['prix']."</p>";
	echo "</section>";
}
?>

</div>