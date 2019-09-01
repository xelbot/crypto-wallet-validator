<?php

namespace Tests\Validators;

use Xelbot\Crypto\Validators\AddressValidatorInterface;
use Xelbot\Crypto\Validators\EthereumValidator;

class EthereumValidatorTest extends BaseAddressValidator
{
    protected $validAddresses = [
        '0x159f5980F00F3CAeA165ABa48EC3D86148396165',
        '0xDa53D39f0Ea448Ec59C73b48A1526327a66ce5D6',
        '0xD91c013489d2Ed816DFf19cFCA684d0f973F1E79',
        'D91c013489d2Ed816DFf19cFCA684d0f973F1E79',
        '0xdb735FaE92792Ff0493C0Ae0dEbBa9dE9079EAaA',
        '0x8e8f80F45fAB6A4bc0b27328D09695d3c18129C8',
        '0xec3F381D227C1574Be8f102a86AA67E4f511D119',
        '0xAb696b28A21D4a10692e4f9026e34094d76fd5b5',
        '0x77E6727c41703B9184DDF15603f5C63168481464',
        '0xFFfFfFffFFfffFFfFFfFFFFFffFFFffffFfFFFfF',
    ];

    protected $invalidAddresses = [
        '0X159f5980F00F3CAeA165ABa48EC3D86148396165',
        '0xDa53D39f0',
        '0xd91c013489d2Ed816DFf19cFcA684d0f973F1E78',
        '0xAb696b28a21D4a10692e4F9026e34094d76fd5b5',
        '0xAaaAAAaaaAAAaaaaaaAAaaaAaAAAaAaaAAAaAaAa',
    ];

    protected function createValidator(): AddressValidatorInterface
    {
        return new EthereumValidator();
    }
}
