<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="loginStyle.css"> 
	</head>
	<body>
		<div class="picture_one">
			<h1 class="htext">Thank you for Visiting!</h1>
		</div>
		<section class="section"> 
			<?php 
				session_start();
				$_SESSION = array();
				session_destroy();
				echo "You have succesfully logged out!";
			?>
			<p class="lightLink">
				Click<a href="login.html">here</a>to login!
			</p>
		</section>
		<div class="picture_two">
		</div>
	</body>
</html>