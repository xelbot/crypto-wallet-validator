<?php

namespace Xelbot\Crypto;

use Xelbot\Crypto\Exceptions\CurrencyNotFoundException;

class WalletValidatorFactory
{
    /**
     * @var array
     */
    protected static $currencies = [
        'ETH' => Validators\EthereumValidator::class,
    ];

    /**
     * @param string $currency
     *
     * @throws CurrencyNotFoundException
     *
     * @return Validators\AddressValidatorInterface
     */
    public static function create(string $currency): Validators\AddressValidatorInterface
    {
        $currencyKey = strtoupper($currency);
        $class = isset(self::$currencies[$currencyKey]) ? self::$currencies[$currencyKey] : null;
        if (!$class) {
            throw new CurrencyNotFoundException(sprintf('Currency "%s" not found.', $currency));
        }

        return new $class();
    }
}
