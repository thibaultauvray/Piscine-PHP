<?php
include ('template/header.php');
if (isset($_POST['sacafoutre']))
{
$email = $_SESSION['loggued_on_user'];
$sql = "SELECT id FROM client WHERE email='$email'";
$array = mysqli_query($link, $sql);
$id = mysqli_fetch_assoc($array);
$ide = $id['id'];
$total = $_SESSION['total'];
$sql = "INSERT INTO commande(id_client, prix) VALUES('$ide', '$total')";
mysqli_query($link, $sql);
$lst_id = mysqli_insert_id($link);
foreach ($_SESSION['cart'] as $key => $value) 
{
	$sql = "SELECT id FROM produit WHERE nom='$key'";
	$array = mysqli_query($link, $sql);
	$id = mysqli_fetch_assoc($array);
	$id = $id['id'];
	$prix = $value['price'];
	$quantit = $value['quantity'];
	$sql = "INSERT INTO commande_client(id_produit, id_commande, prix, quantite) VALUES ('$id', '$lst_id', '$prix', '$quantit')";
	mysqli_query($link, $sql);
}
$_SESSION['cart'] = NULL;
}

header("Location:index.php");

?>