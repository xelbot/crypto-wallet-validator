<?php

namespace Tests\Validators;

use Xelbot\Crypto\Validators\AddressValidatorInterface;
use Xelbot\Crypto\Validators\ZilliqaValidator;

class ZilliqaValidatorTest extends BaseAddressValidator
{
    protected $validAddresses = [
        'zil1ex2ph6e2arwfx0mpdmlwl9nsfxydmpvhg2zwy3',
        'zil14pu4qn4ngmkcq3dcpkw862lys2w7z38hq3ktua',
    ];

    protected $invalidAddresses = [
        'xxx',
    ];

    protected function createValidator(): AddressValidatorInterface
    {
        return new ZilliqaValidator();
    }
}
