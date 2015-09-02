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
    private $balances;

    public function __construct($owner, $number, $balances)
    {
        $this->owner = $owner;
        $this->numberAccount = $number;
        $this->balances = $balances;
    }

    /**
     * @param float $amount
     */
    public function insertMoney($amount)
    {
        if ($this->isAmountPositive($amount)) {
            $this->balances += $amount;
        }
    }

    /**
     * @param float $amount
     */
    public function selectMoney($amount)
    {
        if ($this->isAmountPositive($amount) && $this->isMoney($amount)) {
            $this->balances -= $amount;
        }
    }

    /**
     * @return float
     */
    public function getBalances()
    {
        return $this->balances;
    }

    /**
     * @param float $amount
     * @return bool
     * @throws AccountException
     */
    private function isMoney($amount)
    {
        if ($this->balances <= 0 && $this->balances <= $amount) {
            throw new AccountException('Amount can not select');
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
