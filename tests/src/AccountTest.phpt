<?php

namespace IceMan;

use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

/**
 * @author David Novak
 */
class AccountTest extends \Tester\TestCase 
{

    /** @var Account */
    public $account;

    public function testInsert() 
    {
        $this->account = new Account('David Novak', 123456789, 0.0);

        $this->account->insertMoney(100.0);
        Assert::equal(100.0, $this->account->getBalances());
    }

    public function testSelect() 
    {
        $this->account = new Account('David Novak', 123456789, 5000.0);

        $this->account->selectMoney(100.0);
        Assert::equal(4900.0, $this->account->getBalances());
    }

//    /**
//     * @throws AccountException
//     */
//    public function testInsertOnException() {
//        $banka = new Account('David Novak', 123456, 5000);
//
//        $banka->insertMoney(-100);  // Amount must be positive
//        Assert::equal(5000, $banka->getBalances());
//    }
//
//    /**
//     * @throws AccountException
//     */
//    public function testSelectOnException() {
//        $banka = new Account('David Novak', 123456, -5);
//
//        $banka->selectMoney(5100);  // Amount can not select 
//        Assert::equal(5000, $banka->getBalances());
//    }
}

(new AccountTest())->run();