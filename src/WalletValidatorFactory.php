<?php

namespace Xelbot\Crypto;

use Xelbot\Crypto\Exceptions\CurrencyNotFoundException;
use Xelbot\Crypto\Validators;

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
        $class = isset(self::$currencies[$currency]) ? self::$currencies[$currency] : null;
        if (!$class) {
            throw new CurrencyNotFoundException(sprintf('Currency "%s" not found.', $currency));
        }

        return new $class;
    }
}
