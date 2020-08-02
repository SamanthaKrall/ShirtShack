 <?php
 require_once 'db_connector.php';
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 session_start();
 $db = new db_connector();
 $connection = $db->getConnection();
 $id = $_GET['ID'];
 if($connection){
    $sql_statement = "SELECT * FROM product WHERE  product_id = '$id' LIMIT 1 ";
    $result = mysqli_query($connection, $sql_statement);
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $productName = $row['product_name'];
            $productDescription = $row['product_description'];
            $productPrice = $row['product_price'];
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }
 } else {
     echo "Error: " . mysqli_connect_error();
 }
 ?>
<div class="form-container">
	<h2>Edit a Product</h2>
	<p>Fill out all of the fields and submit</p>
	<form action="processEditItem.php">
		<input type = "hidden" name = "id" value = "<?php echo $id; ?>"></input>
    	Product Name:<input type="text" name="pname" value = " <?php echo $productName; ?>"></input><br>
    	Product Description:<input type="text" name="pdescription" value = " <?php echo $productDescription;?>"></input><br>
    	Product Price:<input type="text" name="pprice" value = " <?php echo $productPrice; ?>"></input><br>
    	<button type="submit">Submit Changes</button>
	</form>
</div>