<ul class="menu">
	<div class="wrapper">
<?php
	$result = mysqli_query($link, "SELECT * FROM categories");
 	while ($row = mysqli_fetch_assoc($result)) {
 		echo "<li><a href=categorie?id=";
		echo $row['id'];
 		echo ">";
 		echo $row['nom'];
 		echo "</a></li>";
 	}
?>
	</div>
</ul>