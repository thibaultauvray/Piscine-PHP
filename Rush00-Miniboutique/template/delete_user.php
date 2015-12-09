<?PHP
include ('header.php');

if (array_key_exists('loggued_on_user', $_SESSION) && $_SESSION['loggued_on_user'] !== "")
{
	if (isset($_POST['delete_user']))
	{
		$query = 'DELETE FROM client WHERE email="'.$_SESSION['loggued_on_user'].'"';
		mysqli_query($link, $query);
		$_SESSION['loggued_on_user'] = "";
		header("Location:../index.php");
	}
}
?>
