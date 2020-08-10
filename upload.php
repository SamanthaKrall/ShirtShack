<link rel="stylesheet" href="loginStyle.css"> 
<?php
$target_dir = "product_images/";
$target_file = $target_dir . basename($_FILES['product_image']['name']);
$uploadOK = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST['insert_post'])){
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    
    // Getting the image from the field
    $product_image  = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];
    
    move_uploaded_file($product_image_tmp,"Pictures/$product_image");
    
    require_once 'db_connector.php';
    $db = new db_connector();
    $connection = $db->getConnection();
    if($connection){
        
        $insert_product = "INSERT INTO products (product_id, product_name, product_description, product_picture, product_price)
    VALUES ('', '$product_title','$product_desc','$product_image','$product_price') ";
        if(mysqli_query($connection, $insert_product)){
            echo "New product successfully added<br>";
        }else{
            echo "Something went wrong. Please try again<br>";
        }
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>