<?php
include ('template/header.php');


$sql = "SELECT id FROM commande";
$array = mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($array))
{
	$id = $row['id'];
	$sql = "SELECT client.nom AS nom_client, produit.nom AS nom_produit, quantite, commande_client.prix AS prix_unit, commande.prix AS prix_to, adresse, ville, code_postal, telephone, prenom 
	FROM commande_client, client, produit, commande WHERE commande.id=$id AND commande_client.id_commande = $id AND commande_client.id_produit=produit.id AND client.id = commande.id_client ";
	$array_sql = mysqli_query($link, $sql);
	echo "<section><table>";
	$i = 1;
	echo "<tr><td class='th'>Prenom</td><td class='th'>Nom</td><td class='th'>Adresse</td><td class='th'>Code postal</td><td class='th'>Ville</td><td class='th'>Telephone</td></tr>";
	while ($rowe = mysqli_fetch_assoc($array_sql)) 
	{
		if ($i == 1)
		{
			$total = $rowe['prix_to'];
			echo "<tr>";
			echo "<td>";
			echo $rowe['prenom'];
			echo "</td><td>";
			echo $rowe['nom_client'];
			echo "</td><td>";
			echo $rowe['adresse'];
			echo "</td><td>";
			echo $rowe['code_postal'];
			echo "</td><td>";
			echo $rowe['ville'];
			echo "</td><td>";
			echo $rowe['telephone'];
			echo "</td>";
			echo "</tr>";
			echo "<tr class='th'><td>Produit</td><td>Quantité</td><td>Prix unitaire</td><td>Prix total</td></tr>";
			$i++;
		}
		echo "<tr><td>";
		echo $rowe['nom_produit'];
		echo "</td><td>";
		echo $rowe['quantite'];
		echo "</td><td>";
		echo $rowe['prix_unit'].'€';
		echo "</td><td>";
		echo ($rowe['quantite'] * $rowe['prix_unit']).'€';

	}


	echo "</tr><tr class='th prix_to'><td>Prix total</td><td colspan='3'>";
	echo $total.'€';
	echo "</td></tr></table></section>";

}

?>