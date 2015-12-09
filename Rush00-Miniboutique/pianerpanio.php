<?PHP
include ('connection.php');

if (!isset($_POST['addtocart']) || !isset($_GET['id']) || $_GET['id'] === "")
	return (0);
if (!isset($_POST['quantity']) || !is_numeric($_POST['quantity'])
	|| $_POST['quantity'] <= 0 || !preg_match("/^[0-9]+$/", $_POST['quantity']))
{
	echo "Veuillez nous donner une quantité cohérente... Cordialement.";
	return (0);
}
$query = 'SELECT id,nom,prix FROM produit WHERE id="'.$_GET['id'].'"';
$array = mysqli_query($link, $query);
if (($array = mysqli_fetch_assoc($array)) === NULL)
{
	echo "Le produit que vous avez demandé n'est plus attribué, votre demande ne peux pas aboutir";
	return (0);
}
if (!array_key_exists('cart', $_SESSION) || $_SESSION['cart'] === NULL)
{
	$_SESSION['cart'][$array['nom']]['price'] = $array['prix'];
	$_SESSION['cart'][$array['nom']]['quantity'] = $_POST['quantity'];
}
else
{
	if (!array_key_exists($array['nom'], $_SESSION['cart']))
	{
		$_SESSION['cart'][$array['nom']]['price'] = $array['prix'];
		$_SESSION['cart'][$array['nom']]['quantity'] = $_POST['quantity'];
	}
	else
	{
		$_SESSION['cart'][$array['nom']]['quantity'] += $_POST['quantity'];
	}
}
?>
