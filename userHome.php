<?php
session_start();
require_once 'db_connector.php';
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="loginStyle.css"> 
	</head>
	<body>
		<div class="picture_one">
			<h1 class="htext">
				<?php if (isset($_SESSION['userID'])){	?>
				Welcome 
				<?php echo $_SESSION['userName']; } ?>
			</h1>
		</div>
		<section class="sectionLight"> 
			<form method="post">
				<button type="submit" class="buttonLight" name='SP'>Search Products</button>
				<?php if($_SESSION['Role'] == "admin"){	?>
					<button type="submit" class="buttonLight" name='SAP'>Admin Page</button>
				<?php } ?>
				<button type="submit" class="buttonLight" name="SH">Shopping Cart</button>
				<button type="submit" class="buttonLight" formaction="logout.php">Logout</button>
			</form>
		</section>
		<section class="section">
			<?php
				if (isset($_POST['SP'])) {
					$page = "search.html";
				} elseif (isset($_POST['SAP']))	{
					$page = "AdminPage.php";
				} elseif(isset($_POST['SH'])) {
				    $page = "userCart.php";
				} else {
					$page = "clean.php";
				}
			?>
			<iframe height="150%" width="95%" src="<?php echo $page?>" class="framing"></iframe>
		</section>
	</body>
</html>