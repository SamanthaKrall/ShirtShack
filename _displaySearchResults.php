<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="loginStyle.css"> 
        <title>Product Results</title>
	</head>
	<body>
		<table class="ttext" style="width:25%">
    		
        		<?php 
                    for($x = 0; $x < count($products); $x++){
                        echo "<td>" . $products[$x]['product_name'] . "</td>";
                        echo "<td>" . $products[$x]['product_description'] .  "</td>";
                        echo "<td>" . "$" . $products[$x]['product_price'] . "</td>";
                        echo "<td><img src='Pictures/" . $products[$x]['product_picture'] . ".jpg' height='300' width='300'></td>";
                ?>
                   <td>
                    <form action="productPage.php" method = "POST">
                        <input type = "hidden" name = "id" value = " <?php echo $products[$x]['product_id'] ?> "></input>
                        <button type = "submit" class="button">Details</button>
                    </form>
                    <form action="shoppingCart.php" method = "POST">
                    	<input type="text" name="quantity" value =""></input>
                        <input type = "hidden" name = "id" value = " <?php echo $products[$x]['product_id'] ?> "></input>
                        <button type = "submit" class="button">Add to Cart</button>
                    </form>
                    </td>
                <?php } ?>
                  
        </table>
	</body>
</html>

