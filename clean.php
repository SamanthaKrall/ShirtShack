<link rel="stylesheet" href="loginStyle.css">
<?php
require_once 'db_connector.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$db = new db_connector();
$connection = $db->getConnection();
$sql_statement = "SELECT * FROM product";
if($connection){
    $result = mysqli_query($connection, $sql_statement);
    if($result) {
        while($row = mysqli_fetch_assoc($result)){?>
        <section class="section">
        <?php 
        echo $row['product_name'] . "<br>";
        echo $row['product_description'] . "<br>";
        echo "$" . $row['product_price'] . "<br>";
        echo "<img src='Pictures/" . $row['product_picture'] . ".jpg' height='200' width='200'><br>";
        ?>
                    <form action="productPage.php" method = "POST">
                        <input type = "hidden" name = "id" value = " <?php echo $products[$x]['product_id'] ?> "></input>
                        <button type = "submit" class="button">Details</button>
                    </form>
                    <form action="shoppingCart.php" method = "POST">
                    	<input type="text" name="quantity" value =""></input>
                        <input type = "hidden" name = "id" value = " <?php echo $products[$x]['product_id'] ?> "></input>
                        <button type = "submit" class="button">Add to Cart</button>
                    </form>
        </section>
        <?php 
        }
    }
}
?>

