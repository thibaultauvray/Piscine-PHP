<?php
include 'template/header.php';
?>

 <div class="prod_ran">

<?php
echo "<section>";
	echo "<a href=ajouter_client.php class='button ajout'>Ajouter un client</a></section>";
$query = mysqli_query($link, "SELECT * FROM `client`");
while (($array = mysqli_fetch_assoc($query)) !== NULL)
{
	echo "<section>";
	echo "<strong><a href=modify_users.php?id=";
	echo $array['id'];
	echo ">";
		echo "</strong>";
	echo $array['email'];
	echo "</a>";
	echo "<p>";
	echo $array['nom'];
	echo "</p>";
	echo "<p>";
	echo $array['prenom'];
	echo "</p>";	
	echo "<p>";
	echo $array['adresse'];
	echo "</p>";	
	echo "<p>";
	echo $array['code_postal'];
	echo "</p>";	
	echo "<p>";
	echo $array['ville'];
	echo "</p>";	
	echo "<p>";
	echo $array['telephone'];
	echo "</p>";

	echo "</section>";
}
?>

</div>