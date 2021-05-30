<?php
session_start();
	include('include/header.php');
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
	session_start();
	include('include/header.php');
?>
<html>
<head>
	<title>Admin Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
</body>
</html>