<?php

namespace Xelbot\Crypto\Utils;

use Exception;
use kornrunner\Keccak;

class Ethereum
{
    /**
     * @param string $address
     *
     * @return bool
     */
    public static function verifyChecksum(string $address): bool
    {
        try {
            $addressHash = Keccak::hash(strtolower($address), 256);
        } catch (Exception $e) {
            return false;
        }

        for ($i = 0, $len = strlen($address); $i < $len; $i++) {
            $z = intval($addressHash[$i], 16);
            if (($z > 7 && $address[$i] !== strtoupper($address[$i]))
                || ($z <= 7 && $address[$i] !== strtolower($address[$i]))
            ) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string $address
     *
     * @return string
     */
    public static function toChecksumAddress(string $address): string
    {
        $addressLower = strtolower($address);
        $result = '';

        try {
            $addressHash = Keccak::hash(strtolower($address), 256);
        } catch (Exception $e) {
            return '';
        }

        for ($i = 0, $len = strlen($address); $i < $len; $i++) {
            if (intval($addressHash[$i], 16) > 7) {
                $result .= strtoupper($addressLower[$i]);
            } else {
                $result .= $addressLower[$i];
            }
        }

        return $result;
    }
}
