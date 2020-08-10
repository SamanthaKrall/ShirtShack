<?php
require_once 'db_connector.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>
<link rel="stylesheet" href="loginStyle.css"> 
<div>
	<form action="upload.php" method="post" encrypte="multipart/form-data">
		<table align="center" width="100%">
			<tr>
				<td colspan="5">
				<h2>Add Products</h2>
				</td>
			</tr>
			<tr>
				<td><b>Product Title:</b></td>
				<td><input type="text" name="product_title" size="60" required/></td>
		 	</tr>
		 	<tr>
		 		<td><b>Product Image: </b></td>
		  		<td><input type="file" name="product_image" id="product_image" /></td>
			</tr>
			<tr>
		 		<td><b>Product Price: </b></td>
		  		<td><input type="text" name="product_price" required/></td>
			</tr>
			<tr>
		   		<td valign="top"><b>Product Description:</b></td>
		   		<td><textarea name="product_desc"  rows="10"></textarea></td>
			</tr>
			<tr>
		   		<td></td>
		   		<td colspan="5"><input type="submit" name="insert_post" value="Add Product"/></td>
			</tr>
		</table>
	</form>
</div>