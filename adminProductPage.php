<link rel="stylesheet" href="loginStyle.css"> 
<?php
require_once 'db_connector.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$db = new db_connector();
$connection = $db->getConnection();
if($_SESSION['Role'] != 'admin') {
    echo "Please login as an Admin<br>";
    exit;
}
$sql_statement = "SELECT * FROM product ";
if($connection){
    $result = mysqli_query($connection, $sql_statement);
    if($result){
        while($row = mysqli_fetch_assoc($result)){?>
            <section class="section">
            <?php
            echo "Product ID: " . $row['product_id'] . "<br>";
            echo "Product Name: " . $row['product_name'] . "<br>";
            echo "Product Description: " . $row['product_description'] . "<br>";
            echo "Product Price: $" . $row['product_price'] . "<br>";
            echo "<img src='Pictures/" . $row['product_picture'] . ".jpg' height='200' width='200'><br>";
            ?>
            <div class="row">
                <form action="processDeleteItem.php">
                    <input type = "hidden" name = "ID" value =" <?php echo $row['product_id']?>"></input>
                    <input type = "hidden" name = "name" value = " <?php echo $row['product_name']?>"></input>            
                    <div style="margin-left: auto;margin-right: auto;">
                        <button type = "submit" class="button">Delete</button>
                        <button type = "submit" class="button" formaction="showEditForm.php">Edit</button>
                    </div>
                </form>
            </div><br>
            </section>
            <?php
        }
    }
    
}
?>