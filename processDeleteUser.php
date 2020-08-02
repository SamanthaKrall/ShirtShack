<?php
require_once 'db_connector.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$db = new db_connector();
$connection = $db->getConnection();
$itemToDelete = $_GET['ID'];
$nametoDelete = $_GET['name'];
$sql_statement = "DELETE FROM users WHERE id = $itemToDelete";
if($connection){
    $result = mysqli_query($connection, $sql_statement);
    if($result){
           echo "Deleted user: " . $nametoDelete . "<br>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "Error: " . mysqli_connect_error();
}
?>