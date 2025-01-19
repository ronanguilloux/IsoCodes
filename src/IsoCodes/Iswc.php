<?php

namespace IsoCodes;

/**
 * Class Iswc for International Standard Musical Work Code (ISWC)
 * is a unique identifier for musical works, similar to ISBN. It is adopted as international standard ISO 15707.
 *
 * @see https://en.wikipedia.org/wiki/International_Standard_Musical_Work_Code
 * @see http://www.ismn-international.org/publications/newsletter10/othersys.html
 * @see http://jsfiddle.net/sN3TU/
 */
class Iswc extends Luhn implements IsoCodeInterface
{
    /**
     * @param mixed $iswc
     *
     * @return bool
     */
    public static function validate($iswc)
    {
        $iswc = $iswc ?? '';

        if (!boolval(preg_match('/^\s*T[\-.]?(\d)(\d)(\d)[\-.]?(\d)(\d)(\d)[\-.]?(\d)(\d)(\d)[\-.]?(\d)\s*$/i', $iswc))) {
            return false;
        }
        $hyphens = ['‐', '-', '.'];
        $iswc = parent::unDecorate($iswc, $hyphens);

        $sum = 1;

        for ($i = 1; $i <= 9; ++$i) {
            $sum = $sum + $i * (int) $iswc[$i];
        }

        $rem = $sum % 10;
        if (0 !== $rem) {
            $rem = 10 - $rem;
        }

        return (int) $iswc[10] === $rem;
    }
}
