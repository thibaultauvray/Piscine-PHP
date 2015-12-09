<?php
	if (isset($_POST['modify']))
	{
		$nom = $_POST['nom'];
		if ($nom === "")
		{
			$err = "Veuillez renseignez un nom valide";
		}
		else
		{
			$id = $_GET['id'];
			$nom = mysqli_real_escape_string($link, $nom);
			if ((mysqli_query($link, "UPDATE categories SET nom='$nom' WHERE id='$id'")) === TRUE)
				$err = "Categorie modifiée";
			else
				$err ="Veuillez recommencer";

		}
	}

	if (isset($_POST['delete']))
	{
			$id = $_GET['id'];
			$nom = mysqli_real_escape_string($link, $nom);
			mysqli_query($link, "DELETE FROM categories WHERE id='$id'");
			header("Location:categories.php");
	}
?>