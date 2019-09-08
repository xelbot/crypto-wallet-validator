<?php

namespace Tests\Validators;

use Xelbot\Crypto\Validators\AddressValidatorInterface;
use Xelbot\Crypto\Validators\ZilliqaValidator;

class ZilliqaValidatorTest extends BaseAddressValidator
{
    protected $validAddresses = [
        'zil1ex2ph6e2arwfx0mpdmlwl9nsfxydmpvhg2zwy3',
        'zil14pu4qn4ngmkcq3dcpkw862lys2w7z38hq3ktua',
        'zil102n74869xnvdwq3yh8p0k9jjgtejruft268tg8',
        'zil148fy8yjxn6jf5w36kqc7x73qd3ufuu24a4u8t9',
        'zil1fdv7u7rll9epgcqv9xxh9lhwq427nsql58qcs9',
        'ZIL1EX2PH6E2ARWFX0MPDMLWL9NSFXYDMPVHG2ZWY3',
    ];

    protected $invalidAddresses = [
        'xxx',
        'zil148fy8yjxn6jf5w36kqc7x73qd3ufuu24000000',
        'zil148Fy8yjXN6jf5w36kQc7x73qd3ufuu24a4u8t9',
    ];

    protected function createValidator(): AddressValidatorInterface
    {
        return new ZilliqaValidator();
    }
}
