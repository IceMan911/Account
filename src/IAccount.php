<?php

namespace IceMan;

/**
 * @author David Novak
 */
interface IAccount 
{

    /**
     * @param float $amount 
     */
    public function insertMoney($amount);

    /**
     * @param float $amount 
     */
    public function selectMoney($amount);
}