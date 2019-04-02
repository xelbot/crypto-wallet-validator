<?php

namespace Xelbot\Crypto\Validators;

interface AddressValidatorInterface
{
    /**
     * @param string $address
     *
     * @return bool
     */
    public function validate(string $address): bool;
}
