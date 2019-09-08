<?php

namespace Xelbot\Crypto\Validators;

use Xelbot\Crypto\Utils\Bench32;

class ZilliqaValidator implements AddressValidatorInterface
{
    /**
     * @param string $value
     *
     * @return bool
     */
    public function validate(string $value): bool
    {
        if (stripos($value, 'zil1') === 0) {
            $data = Bench32::decode($value);

            return $data && (count($data) === 38);
        }

        return false;
    }
}
