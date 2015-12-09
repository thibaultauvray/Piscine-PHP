<?php
if (isset($_POST['modify']))
{
	if (!isset($_POST['prix']) || !is_numeric($_POST['prix'])
	|| $_POST['prix'] <= 0 || !preg_match("/^[0-9]+(\.[0-9][0-9]?)?$/", $_POST['prix']))
	{
		echo "Veuillez entrer un prix correct, merci";
	}
	elseif ($_POST['nom'] === "")
	{
		echo "Veuillez entrez un mom, pluie de his";
	}
	else
	{
		$id = mysqli_real_escape_string($link, $_GET['id']);
		$nom = mysqli_real_escape_string($link, $_POST['nom']);
		$prix = mysqli_real_escape_string($link, $_POST['prix']);
		$sql = "UPDATE produit SET prix='$prix', nom='$nom' WHERE id = $id";
		mysqli_query($link, $sql);

		mysqli_query($link, "DELETE FROM categories_products WHERE id_produit=$id");
		foreach ($_POST['cate'] as $key) {
			$key_s = mysqli_real_escape_string($link, $key);
			$sqle = "INSERT INTO categories_products(id_produit, id_categories) VALUES ('$id', '$key_s')";
			mysqli_query($link, $sqle);
		}
	}

}

elseif (isset($_POST['delete']))
{
	$id = mysqli_real_escape_string($link, $_GET['id']);
	$sql = "DELETE FROM produit WHERE id=$id";
	mysqli_query($link, $sql);
	echo $sql;
}

?>

