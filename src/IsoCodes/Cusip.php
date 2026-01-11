<?php

namespace IsoCodes;

/**
 * Class Cusip.
 * National Securities Identification Number for products issued from both the United States and Canada.
 * The acronym, pronounced as "kyoo-sip," derives from Committee on Uniform Security Identification Procedures.
 *
 * @see https://www.investopedia.com/ask/answers/what-is-a-cusip-number/
 * @see https://en.wikipedia.org/wiki/CUSIP
 */
class Cusip implements IsoCodeInterface
{
    public static function validate($cusip)
    {
        $cusip = (string) $cusip;
        if (9 !== strlen($cusip)) {
            return false;
        }
        $sum = 0;
        for ($i = 0; $i <= 7; ++$i) {
            $char = $cusip[$i];
            if (ctype_digit($char)) {
                $value = intval($char);
            } elseif (ctype_alpha($char)) {
                $position = ord(strtoupper($char)) - ord('A') + 1;
                $value = $position + 9;
            } elseif ('*' == $char) {
                $value = 36;
            } elseif ('@' == $char) {
                $value = 37;
            } elseif ('#' == $char) {
                $value = 38;
            } else {
                return false;
            }
            if (1 == $i % 2) {
                $value *= 2;
            }
            $sum += floor($value / 10) + ($value % 10);
        }

        return ord($cusip[8]) - 48 == (10 - ($sum % 10)) % 10;
    }
}
