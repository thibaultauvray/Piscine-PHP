<?PHP
	include ('connection.php');
if (isset($_POST['register']))
{
function check_potential_error()
{
	include ('connection.php');

	if (strlen($_POST['passwd']) < 6)
	{
		$err_enre =  "Veuillez entrer un mot de passe de six caractères au moins";
		return ("Veuillez entrer un mot de passe de six caractères au moins");
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
	$query = mysqli_query($link, "SELECT * FROM `client`");
	while (($array = mysqli_fetch_assoc($query)) !== NULL)
	{
		if ($array['email'] === $_POST['mail'])
		{
			$err_enre =  "Ce compte existe déjà";
			return ("Ce compte existe déjà");
		}
	}
	return (TRUE);
}

if (!isset($_POST['fname']) || !isset($_POST['lname']) || !isset($_POST['passwd'])
	|| !isset($_POST['address']) || !isset($_POST['postal_code'])
	|| !isset($_POST['mail'])|| !isset($_POST['city']))
	$err_enre = "N'oubliez pas de remplir les champs obligatoires";
else
{
	if (check_potential_error() === TRUE)
	{
		$stmt = mysqli_prepare($link, "INSERT INTO client(email, nom, prenom, mdp, adresse, code_postal, ville, telephone) 
			VALUES (?, ?, ?, ?, ?, ? ,? ,?)");
		$bind = mysqli_stmt_bind_param($stmt, "ssssssss", $_POST['mail'], $_POST['lname'], $_POST['fname'], 
			hash("whirlpool", $_POST['passwd']), $_POST['address'], $_POST['postal_code'], $_POST['city'], $_POST['phone']);
		$exec = mysqli_stmt_execute($stmt);

//		$to_insert = "INSERT INTO client(email, nom, prenom, mdp, adresse, code_postal, ville, telephone)\n";
//		$to_insert = $to_insert."VALUES (\"".$_POST['mail'].",".$_POST['lname'];
//		$to_insert = $to_insert.",".$_POST['fname'];
//		$to_insert = $to_insert.",".hash("whirlpool", $_POST['passwd']);
//		$to_insert = $to_insert.",".$_POST['address'].",".$_POST['postal_code'];
//		$to_insert = $to_insert.",".$_POST['city'].",".$_POST['phone'].")";
//		echo $to_insert;
//		echo "<br>";
//		mysqli_query($link, $to_insert);
	$err_enre = TRUE;
	}
	else{
		$err_enre = check_potential_error();
	}
}
}
//echo $_POST['passwd']."<br>".$_POST['address']."<br>".$_POST['postal_code']."<br>";
?>