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
        if (9 !== strlen($cusip)) {
            return false;
        }
        $sum = 0;
        for ($i = 0; $i <= 7; ++$i) {
            $c = $cusip[$i];
            if (ctype_digit($c)) {
                $v = intval($c);
            } elseif (ctype_alpha($c)) {
                $position = ord(strtoupper($c)) - ord('A') + 1;
                $v = $position + 9;
            } elseif ('*' == $c) {
                $v = 36;
            } elseif ('@' == $c) {
                $v = 37;
            } elseif ('#' == $c) {
                $v = 38;
            } else {
                return false;
            }
            if (1 == $i % 2) {
                $v *= 2;
            }
            $sum += floor($v / 10) + ($v % 10);
        }

        return ord($cusip[8]) - 48 == (10 - ($sum % 10)) % 10;
    }
}
