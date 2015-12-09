<?php

if(isset($_POST['submit'])) // le formulaire a été soumis avec le bouton [Envoyer]  
{
	$content_dir = '../img/'; // dossier où sera déplacé le fichier
	$file1 = $_FILES['ufile']['name'][0];
	if(empty($file1))
	{
   		echo 'erreur';	
	}
   	else
   	{
   		$tmp_file = $_FILES['ufile']['tmp_name'][0];
 	 	if (!is_uploaded_file($tmp_file))
  	 	{
   			exit("Les fichier sont introuvable");
   		}
   		$type_file = $_FILES['ufile']['type'][0];
   		if( !strstr($type_file, 'png') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
   		{
   			exit("Le fichier n'est pas une image");

   		}
   		$name_file = $_FILES['ufile']['name'][0];
   		if( preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $name_file) )
   		{
   			exit("Nom de fichier non valide");
   		}
   		if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
   		{
   			exit("Impossible de copier le fichier dans $content_dir");
   		}
    	$dirbdd = '../img/' . $name_file; // dossier où sera déplacé le fichier
		$dirbdd2 = 'img/' . $name_file;
    	echo "Le fichier a bien été uploadé";
		  $catego =  $_POST['cate'];
   		$titre = mysqli_real_escape_string($link, $_POST['nom']);
   		$prix = mysqli_real_escape_string($link, $_POST['prix']);
   		$descr = mysqli_real_escape_string($link, $_POST['descr']);
   		$sql = "INSERT INTO produit(nom, image, prix, description) VALUES ('$titre', '$dirbdd2', '$prix', '$descr')";
   		mysqli_query($link, $sql);
   		$lst_id = mysqli_insert_id($link);
   		foreach ($catego as $key) 
   		{
			$key_s = mysqli_real_escape_string($link, $key);
			$sqle = "INSERT INTO categories_products(id_produit, id_categories) VALUES ('$lst_id', '$key_s')";
			mysqli_query($link, $sqle);
   		}
	}
}
?>