<?php

namespace Xelbot\Crypto;

class WalletValidator
{
    /**
     * @param string $address
     * @param string $currency
     *
     * @return bool
     */
    public static function validate(string $address, string $currency): bool
    {
        $validator = WalletValidatorFactory::create($currency);

        return $validator->validate($address);
    }
}
