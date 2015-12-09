<?PHP
include ('template/header.php');
if (isset($_POST['delete']))
{
	$_SESSION['cart'] = NULL;
}
if (array_key_exists('cart', $_SESSION) && $_SESSION['cart'] !== NULL)
{
	$i = 0;
	$total = 0;
	?>
	<table>
	<thead>
		<th>Produit</th>
		<th>Quantité</th>
		<th>Prix total</th>
		<th>Prix a l'unite</th>
	</thead>
	<?php
	foreach ($_SESSION['cart'] as $key => $value)
	{

		$price = $value['quantity'] * $value['price'];
		$total = $price + $total;
		?>
	<tr>
		<td><?php echo $key; ?></td>
		<td><?php echo $value['quantity']; ?></td>
		<td><?php echo $price; ?> €</td>
		<td><?php echo $value['price']; ?> €</td>
	</tr>
	<?php
	$_SESSION['total'] = $total;
	}
echo "</table>";
echo '<span class="total">Total : '.$total.'€</span>';
}
if (!isset($_SESSION['loggued_on_user']) || $_SESSION['loggued_on_user'] === "")
	echo "<a href='create.php' class='addcart button'>Se connecter</a>";
else
{
	if (array_key_exists('cart', $_SESSION) && $_SESSION['cart'] !== NULL)
	{
?>

<form action="commander.php" method="POST">
	<input type="submit" name="sacafoutre" class='addcart button' value="Commander" />
</form>
<?php }?>
<form action="panier.php" method="POST">
	<input type="submit" name="delete" class='addcart button' value="Vider le panier" />
</form>
<?php
	echo "";
}
echo "<div class='clearfix'></div>";
include 'template/footer.php';
?>
