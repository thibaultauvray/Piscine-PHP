<?php
include 'template/header.php';
?>

 <div class="prod_ran">

<?php
echo "<section>";
	echo "<a href=ajouter.php class='button ajout'>Ajouter une categories</a></section>";
$query = mysqli_query($link, "SELECT * FROM `categories`");
while (($array = mysqli_fetch_assoc($query)) !== NULL)
{
	echo "<section>";
	echo "<p><a href=modify_cat?id=";
	echo $array['id'];
	echo ">";
	echo $array['nom'];
	echo "</a>";
	echo "</p>";
	echo "</section>";
}
?>

</div>