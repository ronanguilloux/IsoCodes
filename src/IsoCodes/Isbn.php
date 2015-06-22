<?php

namespace IsoCodes;

/**
 * Class Isbn
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class Isbn implements IsoCodeInterface
{
    /**
     * @param string   $isbn
     * @param int|null $type  10 or 13. Leave empty for both.
     *
     * @return bool
     */
    public static function validate($isbn, $type = null)
    {
        if ($type !== null && !in_array($type, [10, 13], true)) {
            throw new \InvalidArgumentException('ISBN type option must be 10 or 13');
        }

        $isbn = str_replace(' ', '', $isbn);
        $isbn = str_replace('-', '', $isbn); // this is a dash
        $isbn = str_replace('‐', '', $isbn); // this is an authentic hyphen

        if ($type === 10) {
            return self::validateIsbn10($isbn);
        }
        if ($type === 13) {
            return self::validateIsbn13($isbn);
        }

        return self::validateIsbn10($isbn) || self::validateIsbn13($isbn);
    }

    private static function validateIsbn10($isbn10)
    {
        if (strlen($isbn10) != 10) {
            return false;
        }

        if (!preg_match('/\\d{9}[0-9xX]/i', $isbn10)) {
            return false;
        }
        $check = 0;
        for ($i = 0; $i < 10; $i++) {
            if ($isbn10[$i] == 'X') {
                $check += 10 * intval(10 - $i);
            }
            $check += intval($isbn10[$i]) * intval(10 - $i);
        }

        return $check % 11 == 0;
    }

    private static function validateIsbn13($isbn13)
    {
        if (strlen($isbn13) != 13 || !ctype_digit($isbn13)) {
            return false;
        }

        $check = 0;

        for ($i = 0; $i < 13; $i += 2) {
            $check += $isbn13[$i];
        }

        for ($i = 1; $i < 12; $i += 2) {
            $check += $isbn13[$i] * 3;
        }

        return $check % 10 == 0;
    }
}
