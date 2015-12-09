<?php
include 'template/header.php';
include ('template/ajouter.php');

?>
<div class="form admin_form">

	<form action="ajouter.php" method="post">
		<fieldset>
			<h3>Ajouter une categorie</h3>
			<?php if(isset($err)) echo "<span class'succ'>$err</span>"; ?>
			<div class="labele">
				<label for="name">Nom : </label><input type="text" name="nom" value="" /> <br>
				<input type="submit" name="ajout" value="Ajouter la categorie" />
			</div>
		</fieldset>
	</form>
</div>
<?php

?>