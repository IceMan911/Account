<?php

/**
 * @author David Novak 
 */

namespace IceMan;

class Account implements IAccount {

    /** @var string */
    private $owner;

    /** @var int */
    private $numberAccount;

    /** @var float */
    private $balances;

    public function __construct($owner, $number, $balances) {
        $this->owner = $owner;
        $this->numberAccount = $number;
        $this->balances = $balances;
    }

    /**
     * 
     * @param float $amount
     */
    public function insertMoney($amount) {
        if ($this->isAmountPositive($amount)) {
            $this->balances += $amount;
        }
    }

    /**
     * 
     * @param float $amount
     */
    public function selectMoney($amount) {
        if ($this->isAmountPositive($amount)) {
            if ($this->isMoney($amount)) {
                $this->balances -= $amount;
            }
        }
    }

    /**
     * 
     * @return float
     */
    public function getBalances() {
        return $this->balances;
    }

    /**
     * 
     * @param float $amount
     * @return boolean
     * @throws AcountException
     */
    private function isMoney($amount) {
        $boolean = TRUE;
        if ($this->balances > 0 && $this->balances >= $amount) {
            
        } else {
            $boolean = FALSE;
            throw new AccountException('Amount can not select ');
        }
        return $boolean;
    }

    /**
     * 
     * @param float $amount
     * @return boolean
     * @throws AmountException
     */
    private function isAmountPositive($amount) {
        $boolean = TRUE;
        if ($amount > 0) {
            
        } else {
            $boolean = FALSE;
            throw new AccountException('Amount must be positive');
        }
        return $boolean;
    }

}
