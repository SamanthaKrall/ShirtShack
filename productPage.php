<?php 
require_once 'db_connector.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db = new db_connector();
$connection = $db->getConnection();
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
		<title>Item Information</title> 
		<link rel="stylesheet" href="loginStyle.css">
	</head>
	<body>
		<section class="section">
			<div class="row">
				<?php 
				$id = $_POST['id'];
				$sql_query = "SELECT * FROM product WHERE product_id = '$id'";
				$result = $connection->query($sql_query);
				$product_array = array();
				while($product = $result->fetch_assoc()){
				    array_push($product_array,$product);
				}
				for($x = 0; $x < count($product_array); $x++){
				?>
				<div class="sixtcolumn">
					<?php echo $product_array[$x]['product_name'];?>
					<?php echo $product_array[$x]['product_description'];?>
					<?php echo "$" . $product_array[$x]['product_price'];?>
					<?php echo "<img src='Pictures/" . $product_array[$x]['product_picture'] . ".jpg' height='400' width='400' align='right'>";?>
				</div>
                    <form action="productPage.php" method = "POST">
                        <input type = "hidden" name = "id" value = " <?php echo $products[$x]['product_id'] ?> "></input>
                        <button type = "submit" class="button">Details</button>
                    </form>
                    <form action="shoppingCart.php" method = "POST">
                    	<input type="text" name="quantity" value =""></input>
                        <input type = "hidden" name = "id" value = " <?php echo $products[$x]['product_id'] ?> "></input>
                        <button type = "submit" class="button">Add to Cart</button>
                    </form>
				<?php } ?>
			</div>
		</section>
	</body>
</html>