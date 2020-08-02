 <?php 
 require_once 'db_connector.php';
 require_once 'processShoppingCart.php';
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 ?>
 <html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <link rel="stylesheet" href="loginStyle.css"> 
	</head>
	<body>
 <?php
 $id = $_SESSION['userID'];
 $pid = $_POST['id'];
 $quantity = $_POST['quantity'];
 $processCart = new processShoppingCart();
 if(isset($_SESSION['orderID'])){
     $pastorderquery = $processCart->insert($pid, $quantity);
 } else {
     $processCart->addProductID($id);
     $pastorderquery = $processCart->insert($pid, $quantity);
 }
 if($pastorderquery){
     $cart_array = array();
     while($order = $pastorderquery->fetch_assoc()){
         array_push($cart_array, $order);
     }
     if($cart_array){
         ?>
         <table class="ttext" style="width:100%">
         	<tr>
         		<td>Order List Row ID</td>
         		<td>Product ID</td>
         		<td>Product Quantity</td>
         		<td>Order ID</td>
         	</tr>
         	<?php 
         	for($x = 0; $x < count($cart_array); $x++){
         	    echo "<td>" . $cart_array[$x]['OLID'] . "</td>";
         	    echo "<td>" . $cart_array[$x]['product_id'] . "</td>";
         	    echo "<td>" . $cart_array[$x]['product_quantity'] . "</td>";
         	    echo "<td>" . $cart_array[$x]['order_id'] . "</td>";
         	    echo "</tr>";
            }
    }
 } else {
     echo "Try more";
 }
 ?>
 </table>
 </body>
 </html>
 