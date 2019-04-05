<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Xelbot\Crypto\Exceptions\CurrencyNotFoundException;
use Xelbot\Crypto\Validators\EthereumValidator;
use Xelbot\Crypto\WalletValidatorFactory;

class WalletValidatorFactoryTest extends TestCase
{
    public function testUndefinedCurrency()
    {
        $this->expectException(CurrencyNotFoundException::class);
        $this->assertInstanceOf(EthereumValidator::class, WalletValidatorFactory::create('undefined'));
    }

    public function testEthereumValidator()
    {
        $this->assertInstanceOf(EthereumValidator::class, WalletValidatorFactory::create('ETH'));
        $this->assertInstanceOf(EthereumValidator::class, WalletValidatorFactory::create('eth'));
        $this->assertInstanceOf(EthereumValidator::class, WalletValidatorFactory::create('Eth'));
    }
}
