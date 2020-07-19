<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
		<title> Login </title> 
	</head>
	<body>
		<div class="picture_one">
		</div>
		<section class="section"> 
			<?php
			session_start();
			require_once 'db_connector.php';
			$db = new db_connector();
			$connection = $db->getConnection();
			if ($connection) {
				$attemptedLoginUsername = $_POST['Username'];
				$attemptedPassword = $_POST['Keycode'];
				$sql_statement = "SELECT * FROM users WHERE (user_name = '$attemptedLoginUsername' AND user_password = '$attemptedPassword') LIMIT 1";
				$result = mysqli_query($connection, $sql_statement);
				if ($result) {
					if (mysqli_num_rows($result) == 1) {
						$row = mysqli_fetch_assoc($result);
						$_SESSION['userName'] = $row['user_name'];
						$_SESSION['userID'] = $row['id'];
						$_SESSION['keycode'] = $row['user_password'];
						$_SESSION['Role'] = $row['user_role'];
						header('Location: userHome.php');
					} else {
						echo "Login unsuccessful<br>";
					}
				} else {
					echo "error" . mysqli_error($connection);
				}
			} else {
				echo "Error connecting " . mysqli_connect_errno();
			}
			?>
			<p class="lightLink">
				<a href="login.html">Go Back</a>
			</p>
		</section>
		<div class="picture_two">
		</div>
	</body>
</html>