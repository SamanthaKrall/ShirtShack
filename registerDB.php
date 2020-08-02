<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ei=edge">
	<title>Login</title>
</head>
<body>
	<div class="picture_one">	</div>
	<section class="section">
		<?php 
		session_start();
		require_once 'db_connector.php';
		$db = new db_connector();
		$connection = $db->getConnection();
		if($connection){
		    $FirstName = addslashes($_POST['Fname']);
		    $LastName = $_POST['Lname'];
		    $EmailAdd = $_POST['Email'];
		    $Password = $_POST['Keycode'];
		    $Username = $_POST['Username'];
		    $addToTable = "INSERT INTO users (first_name, last_name, email, user_password, user_name)
                            VALUES ('$FirstName', '$LastName', '$EmailAdd', '$Password', '$Username')";
		    if(mysqli_query($connection, $addToTable)){
		        echo "New record created successfully<br>";
		    } else {
		        echo "Something went wrong. Please try again<br>";
		        echo "Error: " . $addToTable . " " . mysqli_error($connection);
		    }
		}
		?>
		<p class="lightLink">Click <a href="login.html">here</a> to login!</p>
	</section>
	<div class="picture_two"></div>
</body>
</html>
<?php
?>