<?php
	session_start();
	include ('connection.php');
	include 'pianerpanio.php';
	if (array_key_exists('cart', $_SESSION) || $_SESSION['cart'] !== NULL)
	{
		$_SESSION['total_cart'] = count($_SESSION['cart']);
	}
	else
	{
		$_SESSION['total_cart'] = 0;
	}
?>

<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<title>Miniboutique</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<div class="wrapper">
	<header class="container col-lg-12">
		<div class="account"> <!-- A CHANGER AUQND ON EST CONNECTE -->
			<ul>
<?php
				if(isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "")
				{
					echo "<li><a href=account.php?mail=";
					echo $_SESSION['loggued_on_user'];
					echo "<li><a href='logout.php'>Se deconnecter<br></a></li>";
				}
				else
				{
?>
				<li><a href="create.php">Créer un compte<br></a></li>
				<li><a href="create.php">Se connecter<br></a></li>

<?php
				}
?>
			<li><a href="panier.php">Panier <br> <?PHP echo $_SESSION['total_cart']; ?> items</a></li>
			</ul>
		</div>
		<a href="index.php">
			<img src="img/logo.jpeg" alt="" class="logo"/>
		</a>
	</div>
	<div class="clearfix"></div>
<?php
	include('template/menu.php');
?>
<div class="wrapper">


	</header>
