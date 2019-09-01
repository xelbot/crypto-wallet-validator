<?php

namespace Xelbot\Crypto\Validators;

class ZilliqaValidator implements AddressValidatorInterface
{
    /**
     * @param string $value
     *
     * @return bool
     */
    public function validate(string $value): bool
    {
        return false;
    }
}
