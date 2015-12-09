<?php
function check_potential_error()
{
	include ('../connection.php');

	if (strlen($_POST['passwd']) < 6)
	{
		if ($_POST['passwd'] != "")
		{
			$err_enre =  "Veuillez entrer un mot de passe de six caractères au moins";
			return ("Veuillez entrer un mot de passe de six caractères au moins");
		}
	}
	if (!preg_match("/^.+@.+\..+$/", $_POST['mail']))
	{
		$err_enre =  "Veuillez entrer une adresse mail valide";
		return ("Veuillez entrer une adresse mail valide");
	}
	if (!preg_match("/^[0-9]+(-[0-9]+)?$/", $_POST['postal_code']))
	{
		$err_enre =  "Veuillez entrer un code postal valide";
		return ("Veuillez entrer un code postal valide");
	}
	if (!preg_match("/^[0-9]+.+\s+.+\s+.+$/", $_POST['address']))
	{
		$err_enre =  "Veuillez entrer une adresse valide";
		return ("Veuillez entrer une adresse valide");
	}
	if (isset($_POST['phone']) && !preg_match("/^\+?[0-9]+$/", $_POST['phone']))
	{
		$err_enre =  "Veuillez entrer un numéro valide";
		return ("Veuillez entrer un numéro valide");
	}
	return (TRUE);
}

if (isset($_POST['modify']))
{


	if (!isset($_POST['fname']) || !isset($_POST['lname']) || !isset($_POST['passwd'])
		|| !isset($_POST['address']) || !isset($_POST['postal_code'])
		|| !isset($_POST['mail'])|| !isset($_POST['city']))
	{
					echo "lol";
			$err_enre = "N'oubliez pas de remplir les champs obligatoires";
		}
	else
	{

		if (check_potential_error() === TRUE)
		{

			$id = mysqli_real_escape_string($link, $_GET['id']);
			$nom = mysqli_real_escape_string($link, $_POST['lname']);
			$mail = mysqli_real_escape_string($link, $_POST['mail']);
			$prenom = mysqli_real_escape_string($link, $_POST['fname']);
			$ville = mysqli_real_escape_string($link, $_POST['city']);
			$adresse = mysqli_real_escape_string($link, $_POST['address']);
			$code_postal = mysqli_real_escape_string($link, $_POST['postal_code']);
			$telephone = mysqli_real_escape_string($link, $_POST['phone']);
			if ($_POST['passwd'] !== "")
			{
				$passwd = hash("whirlpool", $_POST['passwd']);
				$sql = "UPDATE client SET email='$mail'  , nom='$nom' , prenom='$prenom', mdp='$passwd', adresse='$adresse', code_postal='$code_postal', ville='$ville', telephone='$telephone' WHERE id='$id'";
			}
			else
			{
				$sql = "UPDATE client SET email='$mail'  , nom='$nom' , prenom='$prenom', adresse='$adresse', code_postal='$code_postal', ville='$ville', telephone='$telephone' WHERE id='$id'";
			}
				if (mysqli_query($link, $sql) === TRUE)
					$err_enre = "Votre client a bien été modifié";
				else
					$err_enre = "Une erreur est survenue";


		}
		else
			$err_enre = check_potential_error();
	}
}
if (isset($_POST['delete']))
{
$id = mysqli_real_escape_string($link, $_GET['id']);
	$sql = "DELETE FROM client WHERE id=$id";
	
	mysqli_query($link, $sql);
	header("Location:client.php");
}

?>