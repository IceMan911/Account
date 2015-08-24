<?php

namespace IceMan;

use Tester\Assert;

require __DIR__ . '/bootstrap.php';

class BankingTest extends \Tester\TestCase {

    public function testInsert() {

        $banka = new Account('David Novak', 123456, 5000);

        $banka->insertMoney(100);
        Assert::equal(5100, $banka->getBalances());
    }

    public function testSelect() {
        $banka = new Account('David Novak', 123456, 5000);

        $banka->selectMoney(100);
        Assert::equal(4900, $banka->getBalances());
    }

    /**
     * @throws AccountException
     */
    public function testInsertOnException() {
        $banka = new Account('David Novak', 123456, 5000);

        $banka->insertMoney(-100);  // Amount must be positive
        Assert::equal(5000, $banka->getBalances());
    }

    /**
     * @throws AccountException
     */
    public function testSelectOnException() {
        $banka = new Account('David Novak', 123456, 5000);

        $banka->selectMoney(5100);  // Amount can not select 
        Assert::equal(5000, $banka->getBalances());
    }

}

(new BankingTest())->run();
