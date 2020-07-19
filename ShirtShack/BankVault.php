<?php
require_once 'db_connector.php';
class BankVault{
    private $conn;
    function __construct($conn){
        $this->conn = $conn;
    }
    function getBalance(){
        $sql = "SELECT BALANCE FROM bankvault";
        $result = $this->conn->query($sql);
        if($result->num_rows == 0){
            return -1;
        } else {
            $row = $result->fetch_assoc();
            $balance = $row['BALANCE'];
            return $balance;
        }
    }
    function updateBalance($bal){
        $sql = "UPDATE bankvault SET BALANCE = $bal";
        $result = $this->conn->query($sql);
        if($result != null){
            return 1;
        } else {
            return 0;
        }
    }
}