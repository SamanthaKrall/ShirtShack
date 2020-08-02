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
$sql_statement = "SELECT * FROM users ";
if($connection) {
    $result = mysqli_query($connection, $sql_statement);
    if($result){
        while($row = mysqli_fetch_assoc($result)){?>
        <section class="section">
        <?php
            echo "User ID: " . $row['id'] . "<br>";
            echo "User Email: " . $row['email'] . "<br>";
            echo "User First Name: " . $row['first_name'] . "<br>";
            echo "User Last Name: " . $row['last_name'] . "<br>";
            echo "User Password: " . $row['user_password'] . "<br>";
            echo "Username: " . $row['user_name'] . "<br>";
            echo "User Role: " . $row['user_role'] . "<br>";
            ?>
            <div class="row">
                <form action="processDeleteUser.php">
                    <input type = "hidden" name = "ID" value =" <?php echo $row['id']?>"></input>
                    <input type = "hidden" name = "name" value = " <?php echo $row['user_name']?>"></input>
                    <div style="margin-left: auto;margin-right: auto;">
                        <button type = "submit" class="button">Delete</button>
                    </div>
                </form>
            <form action="showEditUser.php">
            <input type = "hidden" name = "ID" value = " <?php echo $row['id']?>"></input>
            <input type = "hidden" name = "name" value = " <?php echo $row['first_name']?>"></input>
            <div style="margin-right: auto;margin-left: auto;">
            <button type = "submit" class="button">Edit</button>
            </div>
            </form>
            </div><br>
            </section>
            <?php
        }
    } 
}
?>