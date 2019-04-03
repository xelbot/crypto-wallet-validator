<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Xelbot\Crypto\WalletValidator;

class WalletValidatorTest extends TestCase
{
    public function testValidWallet()
    {
        $this->assertTrue(WalletValidator::validate('0x8617E340B3D01FA5F11F306F4090FD50E238070D', 'ETH'));
    }

    public function testInvalidWallet()
    {
        $this->assertFalse(WalletValidator::validate('0xd1220A0CF4B9BE7A2E6BA89F429762E7B9ADB', 'ETH'));
    }
}
