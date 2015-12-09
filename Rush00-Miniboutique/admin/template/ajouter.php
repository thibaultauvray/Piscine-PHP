<?php

function 	ft_doublon($nom)
{
	include ('../connection.php');
	$bo = TRUE;
	$select = "SELECT nom FROM categories";
	$array = mysqli_query($link, $select);
	while ($row = mysqli_fetch_assoc($array)) 
	{
		if ($row['nom'] === $nom)
			$bo = FALSE;
	}
	return ($bo);
}

if(isset($_POST['ajout'])) // le formulaire a été soumis avec le bouton [Envoyer]  
{
	if ($_POST['nom'] != '')
	{
		$nom = mysqli_real_escape_string($link, $_POST['nom']);
		if (ft_doublon($nom) === TRUE)
		{
			$sql = "INSERT INTO categories(nom) VALUES ('$nom')";
			mysqli_query($link, $sql);
			$err = "Categories ajouter";
		}
		else
		{
			$err = "Categories deja existante";
		}
	}
	else
	{
		$err = "Veuillez remplir un nom";
	}
}
?>