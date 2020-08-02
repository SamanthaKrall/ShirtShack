<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cart</title>
	<link rel="stylesheet" href="loginStyle.css">
</head>
<body>
	<?php 
	require_once 'db_connector.php';
	require_once 'processShoppingCart.php';
	require_once 'CardBusinessTransactionService.php';
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	if(isset($_SESSION['orderID'])){
	    $oid = $_SESSION['orderID'];
	    $processCart = new processShoppingCart();
	    $currentorderquery = $processCart->getCurrentOrder($oid);
	    if($currentorderquery){
	        $cart_array = array();
	        while($order = $currentorderquery->fetch_assoc()){
	            array_push($cart_array, $order);
	        }
	        if($cart_array){
	            ?>
	            <table class="ttext" style="width:100%">
	            <tr>
	            	<td>Product Name</td>
	            	<td>Order List Row</td>
	            	<td>Product ID</td>
	            	<td>Order ID</td>
	            	<td>Purchase Items</td>
	            </tr>
	            <?php 
	            for($x = 0; $x < count($cart_array); $x++){
	                $pname = $processCart->getPName($cart_array[$x]['product_id']);
	                echo "<tr>";
	                echo "<td>" . $pname . "</td>";
	                echo "<td>" . $cart_array[$x]['OLID'] . "</td>";
	                echo "<td>" . $cart_array[$x]['product_id'] . "</td>";
	                echo "<td>" . $cart_array[$x]['product_quantity'] . "</td>";
	                echo "<td>" . $cart_array[$x]['order_id'] . "</td>";
	                echo "</tr>";
	           }
	           ?>
	           </table>
	           <?php 
	           echo $processCart->getPrice();
	           $transact = new CardBusinessTransactionService();
	           $transact->transaction($processCart->getPrice());
	       }
	   }
	} else {
	    echo "You need to shop for more of our awesome shirts!";
	}
	?>
	<form action="productPage.php" method="post">
		<input type="hidden" name="id" value="<?php echo $cart_array[$x]['product_id']?>">
		<button type="submit" class="button">Details</button>
	</form>
	<form action="creditCard.php" method="post">
		<input type="text" name="quantity" value="">
		<input type="hidden" name="id" value="<?php echo $_SESSION['userID']?>">
		<button type="submit" class="button">Add a payment method</button>
	</form>
</body>
</html>

<?php
