<?php

namespace IceMan;

/**
 * @author David Novak
 */
class Account implements IAccount
{

    /** @var string */
    private $owner;

    /** @var int */
    private $numberAccount;

    /** @var float */
    private $balance;

    /**
     * @param string $owner
     * @param float $number
     * @param float $balance
     * @throws AccountException 
     */ 
    public function __construct($owner, $number, $balance)
    {
        $this->isAmountPositive($balance);
        $this->owner = $owner;
        $this->numberAccount = $number;
        $this->balance = $balance;
    }

    /**
     * @param float $amount
     */
    public function insertMoney($amount)
    {
        if ($this->isAmountPositive($amount)) {
            $this->balance += $amount;
        }
    }

    /**
     * @param float $amount
     */
    public function selectMoney($amount)
    {
        if ($this->isAmountPositive($amount) && $this->isMoney($amount)) {
            $this->balance -= $amount;
        }
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param float $amount
     * @return bool
     * @throws AccountException
     */
    private function isMoney($amount)
    {
        if ($this->balance <= $amount) {
            throw new AccountException('Amount must be higher or equal than balance');
        }
        return TRUE;
    }

    /**
     * @param float $amount
     * @return bool
     * @throws AccountException
     */
    private function isAmountPositive($amount)
    {
        if ($amount <= 0) {
            throw new AccountException('Amount must be positive');
        }
        return TRUE;
    }

}
