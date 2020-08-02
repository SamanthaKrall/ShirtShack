<?php
require_once 'db_connector.php';
class CardDataTransactionService {

    function getBalance($id){
        $sql = "SELECT AMOUNT FROM cards WHERE CARDNUMBER LIKE ";
        $result = $this->conn->query($sql);
        if($result->num_rows == 0){
            return -1;
        } else {
            $row = $result->fetch_assoc();
            $amount = $row['AMOUNT'];
            return $amount;
        }
    }
    function updateBalance($amount){
        $sql = "UPDATE cards SET AMOUNT = $amount";
        $result = $this->conn->query($sql);
        if($result){
            return 1;
        } else {
            return 0;
        }
    }
    function getCreditInfo($id){
        $db = new db_connector();
        $conn = $db->getConnection();
        $creditInfo = "SELECT * FROM cards WHERE user_id = '$id' ";
        $cardInfo = $conn->query($creditInfo);
        return $cardInfo;
    }
    function addCreditInfo($cn, $fn, $mi, $ln, $ex, $cc, $dc, $cv, $am){
        $db = new db_connector();
        $conn = $db->getConnection();
        $id = $_SESSION['userID'];
        $creditInfo = "INSERT INTO cards (card_number, first_name, middle_init, last_name, expiration, card_company, deb_or_credit, cvv_number, user_id, amount) 
                        VALUES ('$cn', '$fn', '$mi', '$ln', '$ex', '$cc', '$dc', '$cv', '$id', '$am')";
        $cardInfo = $conn->query($creditInfo);
        return $cardInfo;
    }
}