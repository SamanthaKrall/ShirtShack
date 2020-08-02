<?php
class Card {
    private $cardNumber;
    private $fName;
    private $mInitial;
    private $lName;
    private $expiration;
    private $cardCompany;
    private $debOrCred;
    private $CVVNumber;
    private $amount;
    
    public function __construct($cn, $fn, $mi, $ln, $ex, $cc, $dc, $cv, $am) {
        $this->cardNumber = $cn;
        $this->fName = $fn;
        $this->mInitial = $mi;
        $this->lName = $ln;
        $this->expiration = $ex;
        $this->cardCompany = $cc;
        $this->debOrCred = $dc;
        $this->CVVNumber = $cv;
        $this->amount = $am;
    }
    /**
     * @return mixed
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @return mixed
     */
    public function getFName()
    {
        return $this->fName;
    }

    /**
     * @return mixed
     */
    public function getMInitial()
    {
        return $this->mInitial;
    }

    /**
     * @return mixed
     */
    public function getLName()
    {
        return $this->lName;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * @return mixed
     */
    public function getCardCompany()
    {
        return $this->cardCompany;
    }

    /**
     * @return mixed
     */
    public function getDebOrCred()
    {
        return $this->debOrCred;
    }

    /**
     * @return mixed
     */
    public function getCVVNumber()
    {
        return $this->CVVNumber;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $cardNumber
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * @param mixed $fName
     */
    public function setFName($fName)
    {
        $this->fName = $fName;
    }

    /**
     * @param mixed $mInitial
     */
    public function setMInitial($mInitial)
    {
        $this->mInitial = $mInitial;
    }

    /**
     * @param mixed $lName
     */
    public function setLName($lName)
    {
        $this->lName = $lName;
    }

    /**
     * @param mixed $expiration
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
    }

    /**
     * @param mixed $cardCompany
     */
    public function setCardCompany($cardCompany)
    {
        $this->cardCompany = $cardCompany;
    }

    /**
     * @param mixed $debOrCred
     */
    public function setDebOrCred($debOrCred)
    {
        $this->debOrCred = $debOrCred;
    }

    /**
     * @param mixed $CVVNumber
     */
    public function setCVVNumber($CVVNumber)
    {
        $this->CVVNumber = $CVVNumber;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}