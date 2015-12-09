<?php
include '../connection.php';
session_start();
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php
$conne ="";
if (isset($_POST['con_admin']))
{
if (!isset($_POST['mail']))
	echo "N'oubliez pas d'écrire votre adresse mail";
else if (!isset($_POST['passwd']))
	echo "N'oubliez pas d'écrire votre mot de passe";
else
{
	$passwd = hash("whirlpool", $_POST['passwd']);
	echo $passwd;
	$mail = mysqli_real_escape_string($link, $_POST['mail']);
	$query = 'SELECT login,mdp FROM admin WHERE login="'.$mail.'" AND mdp="'.$passwd.'"';
	$array = mysqli_query($link, $query);
	echo $query;
	if (mysqli_fetch_assoc($array) === NULL)
	{
		$conne = "Mauvais mail ou mauvais mot de passe, réessayez";
	}
	else
	{
		$conne = "OK";
		$_SESSION['admin'] = $_POST['mail'];
		header("Location: accueil.php");
	}
}
}
?>
<form id="create-account_form" class="std" method="post" action="index.php">
	<fieldset>
		<h3>Connexion</h3>
		<?php   
		if(isset($conne))
		{
			if ($conne !== "OK")
				echo "<span class='erreur'> $conne </span>";
				
		}
	?>
		<div class="labele">
		<label for="email">Login : </label><input id="email" type="text" name="mail" /> <br>
		<label for="passwd">Mot de pase : </label><input id="passwd" type="password" name="passwd" /> <br>
		<input type="submit" class="submit" value="Se connecter" name="con_admin">
		</div>
	</fieldset>
</form>
</body>
</html>