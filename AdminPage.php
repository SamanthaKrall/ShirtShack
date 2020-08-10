<?php
require_once 'db_connector.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
		<title>Administration</title> 
		<link rel="stylesheet" href="loginStyle.css"> 
	</head>
	<body>
		<div class="lightlink"> 
			<li> 
				<a href="adminProductPage.php">Products</a>
			</li>
			<li>
				<a href="adminUserPage.php">Users</a>
			</li>
			<li>
				<a href="insert_product.php">Add Product</a>
			</li>
		</div>
	</body>
</html>