<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Manage Payment Methods</title>
	<link rel="stylesheet" href="loginStyle.css">
</head>
<body>
<?php
require_once 'CardBusinessTransactionService.php';
require_once 'Card.php';
$processCard = new CardBusinessTransactionService();
$card_array = $processCard->getCreditInfo($_SESSION['userID']);
if($card_array){
    ?>
    <table class="ttext" style="width:100%">
    	<tr>
    		<td>Card Number</td>
    		<td>First Name</td>
    		<td>Middle Initial</td>
    		<td>Last Name</td>
    		<td>Expiration</td>
    		<td>Card Company</td>
    		<td>Type Of Card</td>
    		<td>CVV</td>
    	</tr>
    	<?php 
    	for($x = 0; $x < count($card_array); $x++) {
    	    echo "<td>" . $card_array[$x]['card_number'] . "</td>";
    	    echo "<td>" . $card_array[$x]['first_name'] . "</td>";
    	    echo "<td>" . $card_array[$x]['middle_init'] . "</td>";
    	    echo "<td>" . $card_array[$x]['last_name'] . "</td>";
    	    echo "<td>" . $card_array[$x]['expiration'] . "</td>";
    	    echo "<td>" . $card_array[$x]['card_company'] . "</td>";
    	    echo "<td>" . $card_array[$x]['deb_or_credit'] . "</td>";
    	    echo "<td>" . $card_array[$x]['cvv_number'] . "</td>";
    	}
    	?>
    	</table>
	<?php 
} else {
    echo "You have not added any information yet!";
}
if(isset($_POST['create'])){
    ?>
    <form action="creditCard.php" method="post">
    	Card Number<input type="text" name="cardnumber"><br>
    	First Name<input type='text' name="firstname"><br>
    	Middle Initial<input type="text" name="middlei"><br>
    	Last Name<input type="text" name="lastname"><br>
    	Expiration<input type="text" name="expiration"><br>
    	Card Company<input type="text" name="cardcompany"><br>
    	Card Type (Credit or Debit)<input type="text" name="cardtype"><br>
    	CVV Number (Back of card)<input type="text" name="ccvnumber"><br>
    	Amount<input type="text" name="amount"><br>
    	<input type="hidden" name="create" value="0"><br>
    	<input type="submit">
    </form>
    <?php 
    if(isset($_POST['expiration'])){
        $card = new Card($_POST['cardnumber'], $_POST['firstname'], $_POST['middlei'], $_POST['lastname'], $_POST['expiration'], $_POST['cardcompany'], $_POST['cardtype'], $_POST['ccvnumber'], $_POST['amount']);
        $cn = $card->getCardNumber();
        $fn = $card->getFName();
        $mi = $card->getMInitial();
        $ln = $card->getLName();
        $ex = $card->getExpiration();
        $cc = $card->getCardCompany();
        $dc = $card->getDebOrCred();
        $cv = $card->getCVVNumber();
        $am = $card->getAmount();
        $addCard = new CardBusinessTransactionService();
        $addCard->addCreditInfo($cn, $fn, $mi, $ln, $ex, $cc, $dc, $cv, $am);
        echo "Card added successfully!";
    }
}
?>
</body>
	<form>
		<button name="create" formmethod="post" type="submit" class="buttonLight" formaction="creditCard.php" value="0">Create</button>
		<button name="delete" formmethod="post" type="submit" class="buttonLight" formaction="creditCard.php" value="1">Delete</button>
		<button name="update" formmethod="post" type="submit" class="buttonLight" formaction="creditCard.php" value="2">Update</button>
	</form>
</html>