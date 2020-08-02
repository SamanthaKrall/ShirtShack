<?php
session_start();
require_once 'CardDataTransactionService.php';
class CardBusinessTransactionService {
    function getBalance(){
        $db = new db_connector();
        $conn = $db->getConnection();
        $dataTransactionService = new CardDataTransactionService($conn);
        $balance = $dataTransactionService->getBalance();
        $conn->close();
        return $balance;
    }
    function getBankingVault(){
        $db = new db_connector();
        $conn = $db->getConnection();
        $dataTransactionService = new BankVault($conn);
        $balance = $dataTransactionService->getBalance();
        return $balance;
    }
    function transaction($transaction){
        $db = new db_connector();
        $conn = $db->getConnection();
        $conn->autocommit(false);
        $conn->begin_transaction();
        $cardBalance = $this->getBalance();
        $cardData = new CardDataTransactionService($conn);
        $okCard = $cardData->updateBalance($cardBalance - $transaction);
        $bankVaultBalance = $this->getBankingVault();
        $bankVaultData = new BankVault($conn);
        $okBankVault = $bankVaultData->updateBalance($bankVaultBalance + $transaction);
        if($okCard && $okBankVault){
            $conn->commit();
            include 'transactionSuccess.php';
        } else {
            $conn->rollback();
            include 'transactionFailed.php';
        }
        $conn->close();
    }
    public function getCreditInfo($id){
        $cardData = new cardDataTransactionService();
        $userID = $_SESSION['userID'];
        $result = $cardData->getCreditInfo($userID);
        if($result){
            $card_array = array();
            while($cards = $result->fetch_assoc()){
                array_push($card_array, $cards);
            }
            return $card_array;
        } else {
            return;
        }
    }
    public function addCreditInfo($cn, $fn, $mi, $ln, $ex, $cc, $dc, $cv, $am){
        $cardData = new CardDataTransactionService();
        $result = $cardData->addCreditInfo($cn, $fn, $mi, $ln, $ex, $cc, $dc, $cv, $am);
        return $result;
    } 
}