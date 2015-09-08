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
        $this->account = new Account('David Novak', 123456789, 1000);

        $this->account->insertMoney(100.0);
        Assert::equal(1100.0, $this->account->getBalance());
    }

    public function testSelect()
    {
        $this->account = new Account('David Novak', 123456789, 5000.0);

        $this->account->selectMoney(100.0);
        Assert::equal(4900.0, $this->account->getBalance());
    }

    public function testInsertException()
    {
        $this->account = new Account('David Novak', 123456, 5000);

        Assert::exception(function() {
            $this->account->insertMoney(-200);
        }, 'IceMan\AccountException', 'Amount must be positive');
    }

    public function testSelectException()
    {
        $this->account = new Account('David Novak', 123456, 500);

        Assert::exception(function() {
            $this->account->selectMoney(600);
        }, 'IceMan\AccountException', 'Amount must be higher or equal than balance');
    }

    /**
     * @throws \IceMan\AccountException
     */
    public function testInitException()
    {
        new Account('David', 123456, -1);
    }
}

(new AccountTest())->run();
