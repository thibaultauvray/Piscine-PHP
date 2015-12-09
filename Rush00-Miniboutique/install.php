<?php
include('connection.php');
if (isset($_POST['submit']))
{

$sql = file_get_contents("miniboutique.sql");
$sql_array = explode(";", $sql);
foreach ($sql_array as $val) 
{
mysqli_query($link, $val); 
}
}
?>

<form action="install.php" method="post">
	<input type="submit" name="submit" id="" value="INSTALLEZ" />
</form>