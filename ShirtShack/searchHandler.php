<?php 
require_once 'productService.php';
$searchPhrase = $_POST['product'];
$p = new productService();
$products = $p->findProducts($searchPhrase);
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="loginStyle.css"> 
	</head>
    <body>
    	<h2 class="ttext">Search Results</h2>
    </body>
</html>
<?php
    if($products){
        include("_displaySearchResults.php");
    } else {
    echo "Nothing found<br>";
    }
?>
