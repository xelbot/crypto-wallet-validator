<?php

namespace Xelbot\Crypto\Utils;

/**
 * Please refer to bip-0173 for more details of the bech32 technical specification:
 * https://github.com/bitcoin/bips/blob/39a23b7/bip-0173.mediawiki#Bech32
 */
class Bench32
{
    public static $charset = 'qpzry9x8gf2tvdw0s3jn54khce6mua7l';

    protected static $gen = [0x3b6a57b2, 0x26508e6d, 0x1ea119fa, 0x3d4233dd, 0x2a1462b3];

    /**
     * @param string $s
     *
     * @return array|null
     */
    public static function decode(string $s): ?array
    {
        if ($s !== strtolower($s) && $s !== strtoupper($s)) {
            return null;
        }

        $s = strtolower($s);
        $pos = strrpos($s, '1');
        $length = strlen($s);
        if ($pos === false || $pos < 1 || $pos + 7 > $length || $length > 90) {
            return null;
        }

        $hrp = substr($s, 0, $pos);

        $data = [];
        for ($i = $pos + 1; $i < $length; $i++) {
            $idx = strpos(self::$charset, $s[$i]);
            if ($idx === false) {
                return null;
            }

            $data[] = $idx;
        }

        if (!self::verifyChecksum($hrp, $data)) {
            return null;
        }

        return $data;
    }

    /**
     * @param string $hrp
     * @param array $data
     *
     * @return bool
     */
    protected static function verifyChecksum(string $hrp, array $data): bool
    {
        return self::polymod(array_merge(self::hrpExpand($hrp), $data)) === 1;
    }

    /**
     * @param string $hrp
     *
     * @return array
     */
    protected static function hrpExpand(string $hrp): array
    {
        $ret = [];
        $length = strlen($hrp);
        for ($i = 0; $i < $length; $i++) {
            $ret[] = ord($hrp[$i]) >> 5;
        }

        $ret[] = 0;

        for ($i = 0; $i < $length; $i++) {
            $ret[] = ord($hrp[$i]) & 31;
        }

        return $ret;
    }

    protected static function polymod(array $v): int
    {
        $chk = 1;
        $len = count($v);
        for ($i = 0; $i < $len; $i++) {
            $top = $chk >> 25;
            $chk = ($chk & 0x1ffffff) << 5 ^ $v[$i];
            for ($j = 0; $j < 5; $j++) {
                if (($top >> $j) & 1) {
                    $chk ^= self::$gen[$j];
                }
            }
        }

        return $chk;
    }
}
