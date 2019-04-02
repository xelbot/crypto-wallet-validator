<?php

namespace Xelbot\Crypto\Validators;

use Xelbot\Crypto\Utils\Ethereum;

class EthereumValidator implements AddressValidatorInterface
{
    /**
     * @param string $value
     *
     * @return bool
     */
    public function validate(string $value): bool
    {
        $matches = [];
        if (!preg_match('/^(0x)?([0-9a-fA-F]{40})$/', $value, $matches)) {
            return false;
        }

        $address = $matches[2];
        if ($address === strtolower($address) || $address === strtoupper($address)) {
            return true;
        }

        return Ethereum::verifyChecksum($address);
    }
}
