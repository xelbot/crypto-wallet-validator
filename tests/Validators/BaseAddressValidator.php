<?php

namespace Tests\Validators;

use PHPUnit\Framework\TestCase;
use Xelbot\Crypto\Validators\AddressValidatorInterface;

abstract class BaseAddressValidator extends TestCase
{
    protected $validAddresses = [];

    protected $invalidAddresses = [];

    abstract protected function createValidator(): AddressValidatorInterface;

    public function testValidAddresses()
    {
        $validator = $this->createValidator();

        foreach ($this->validAddresses as $address) {
            $this->assertTrue($validator->validate($address));
        }
    }

    public function testInvalidAddresses()
    {
        $validator = $this->createValidator();

        foreach ($this->invalidAddresses as $address) {
            $this->assertFalse($validator->validate($address));
        }
    }
}
