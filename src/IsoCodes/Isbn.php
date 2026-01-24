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
        if (null !== $type && ! in_array($type, [10, 13], true)) {
            throw new \InvalidArgumentException('ISBN type option must be 10 or 13');
        }

        $isbn = (string) $isbn;
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
        return Utils::luhnWithWeights($isbn10, 10, [10, 9, 8, 7, 6, 5, 4, 3, 2], 11, []);
    }

    private static function validateIsbn13($isbn13)
    {
        $prefix = substr($isbn13, 0, 3);
        if (13 != strlen($isbn13) || ! ctype_digit($isbn13) || ! in_array($prefix, ['978', '979'])) {
            return false;
        }

        return Utils::luhnForGTIN($isbn13, 13, false);
    }
}
