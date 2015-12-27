<?php

namespace IsoCodes;

/**
 * @link https://en.wikipedia.org/wiki/SEDOL
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class Sedol implements IsoCodeInterface
{
    /**
     * {@inheritdoc}
     */
    public static function validate($value)
    {
        if (strlen($value) !== 7) {
            return false;
        }

        $char6 = substr($value, 0, 6);

        if (!preg_match('/^[0-9BCDFGHJKLMNPQRSTVWXYZ]{6}$/', $char6)) {
            return false;
        }

        $weight = [1, 3, 1, 7, 3, 9, 1];
        $sum = 0;
        for ($i = 0; $i < 6; ++$i) {
            $sum += $weight[$i] * intval($char6[$i], 36);
        }
        $check = (10 - $sum % 10) % 10;

        return $value === $char6.$check;
    }
}
