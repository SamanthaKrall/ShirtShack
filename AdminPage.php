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
		<section class="section"> 
			<form action="adminProductPage.php"> 
				<div class="row"> 
					<div>	
						<button type = "submit" class = "button"></button>			
					</div>
				</div>
				<div class="row"> 
					<button type="submit" class="button">Products</button>
				</div>
			</form>
			<form action= "adminUserPage.php">
				<div class="row"> 
					<div>	
						<button type = "submit" class = "button"></button>			
					</div>
				</div>
				<div class="row"> 
					<button type="submit" class="button">Users</button>
				</div>
			</form>
		</section>
	</body>
</html>