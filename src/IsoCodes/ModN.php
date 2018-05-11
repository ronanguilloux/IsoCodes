<?php

namespace IsoCodes;

/**
 * Class ModN.
 */
class ModN
{
    /**
     * ModN validator.
     *
     * @param string $val
     * @param int    $len
     * @param bool   $unDecorate
     * @param array  $hyphens
     *
     * @link    https://en.wikipedia.org/wiki/ISO_7064
     *
     * @return bool
     */
    public static function check($val, $key, $mod = 36)
    {
        $lastProduct = -1;
        $iso7064 = array_merge(range(0, 9), range('A', 'Z'));
        $iso7064 = array_map('strval', $iso7064);
        $values = str_split($val);
        $adjustedProduct = $mod;
        foreach ($values as $index => $digit) {
            $digit = hexdec($digit);
            $intermediateSum = $digit + $adjustedProduct;
            $adjustedIntermediateSum = ($intermediateSum > $mod) ? ($intermediateSum - $mod) : $intermediateSum;
            $product = 2 * $adjustedIntermediateSum;
            $adjustedProduct = ($product > ($mod + 1)) ? ($product - ($mod + 1)) : $product;
            if (mb_strlen($val) === ($index + 1)) {
                $lastProduct = ($mod + 1) - $adjustedProduct;
                if (1 === $adjustedProduct) {
                    $lastProduct = 0;
                }
            }
        }
        $check = $iso7064[$lastProduct];

        return $key === $check;
    }
}
