<?php

namespace IsoCodes;

/**
 * Class Isbn.
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class Isbn implements IsoCodeInterface
{
    /**
     * @param string   $isbn
     * @param int|null $type 10 or 13. Leave empty for both
     *
     * @return bool
     */
    public static function validate($isbn, $type = null)
    {
        if (null !== $type && !in_array($type, [10, 13], true)) {
            throw new \InvalidArgumentException('ISBN type option must be 10 or 13');
        }

        $isbn = str_replace(' ', '', $isbn);
        $isbn = str_replace('-', '', $isbn); // this is a dash
        $isbn = str_replace('‐', '', $isbn); // this is an authentic hyphen

        if (10 === $type) {
            return self::validateIsbn10($isbn);
        }
        if (13 === $type) {
            return self::validateIsbn13($isbn);
        }

        return self::validateIsbn10($isbn) || self::validateIsbn13($isbn);
    }

    private static function validateIsbn10($isbn10)
    {
        if (10 != strlen($isbn10)) {
            return false;
        }

        if (!preg_match('/\\d{9}[0-9xX]/i', $isbn10)) {
            return false;
        }
        $check = 0;
        for ($i = 0; $i < 10; ++$i) {
            if ('X' == $isbn10[$i]) {
                $check += 10 * intval(10 - $i);
            }
            $check += intval($isbn10[$i]) * intval(10 - $i);
        }

        return 0 == $check % 11;
    }

    private static function validateIsbn13($isbn13)
    {
        $prefix = substr($isbn13, 0, 3);
        if (13 != strlen($isbn13) || !ctype_digit($isbn13) || !in_array($prefix, ['978', '979'])) {
            return false;
        }

        return Luhn::check($isbn13, 13, false);
    }
}
