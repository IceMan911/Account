<?php

/**
 * @author David Novak
 */

namespace IceMan;

interface IAccount {

    /**
     * 
     * @param float $amount 
     */
    public function insertMoney($amount);

    /**
     * 
     * @param float $amount 
     */
    public function selectMoney($amount);
}
