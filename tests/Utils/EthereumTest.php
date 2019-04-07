<?php

namespace Tests\Utils;

use PHPUnit\Framework\TestCase;
use Xelbot\Crypto\Utils\Ethereum;

class EthereumTest extends TestCase
{
    public function testToChecksumAddress()
    {
        $this->assertEquals('1934C486Deb41ac9Ce984d95798789a6Ce4451b8', Ethereum::toChecksumAddress(sha1('test_0')));
        $this->assertEquals('5629Ddd238a3e934cFA4af81e239ec8e73C58aCe', Ethereum::toChecksumAddress(sha1('test_1')));
        $this->assertEquals('ab71Dfe1e79775bcFFD879eBC8D188beD9A24435', Ethereum::toChecksumAddress(sha1('test_2')));
        $this->assertEquals('20D57D8afB7B4cb6AD7228dE52430218C3443d82', Ethereum::toChecksumAddress(sha1('test_3')));
        $this->assertEquals('f8d4Bcb3073f3622ECA55b4B1370226C84491309', Ethereum::toChecksumAddress(sha1('test_4')));
        $this->assertEquals('22f9C34Bae1590696194fd59A1Bdf41d8Cf832dF', Ethereum::toChecksumAddress(sha1('test_5')));
        $this->assertEquals('e695e90a18C6eb7f46e0d517d45625eF10429e3E', Ethereum::toChecksumAddress(sha1('test_6')));
        $this->assertEquals('14387fFe72fBb0f97b782F08Ee397229B3700001', Ethereum::toChecksumAddress(sha1('test_7')));
        $this->assertEquals('6c068F0574eb3163B05fF315F3Fff7157dEFbCe9', Ethereum::toChecksumAddress(sha1('test_8')));
        $this->assertEquals('3c1BaA491565062E7564576D60F9d5b199EE9f75', Ethereum::toChecksumAddress(sha1('test_9')));
    }
}
