<?php
	include ('../connection.php');
	session_start();
	if (!isset($_SESSION['admin']))
	{
		header("Location: index.php");
	}
?>

<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
	<header class="container col-lg-12">

	<div class="clearfix"></div>
<?php
	include('template/menu.php');
?>
<div class="wrapper">


</header>
