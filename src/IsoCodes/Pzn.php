<?php

namespace IsoCodes;

/**
 * Class Pzn
 * Pharmazentralnummer (PZN) - The standard for identifying medicine in Germany.
 *
 * @see https://www.ifaffm.de/mandanten/1/documents/04_ifa_coding_system/IFA-Info_Check_Digit_Calculations_PZN_PPN_UDI_EN.pdf
 * @see https://de.wikipedia.org/wiki/Pharmazentralnummer
 */
class Pzn implements IsoCodeInterface
{
    /**
     * @param string $pzn
     *
     * @return bool
     */
    public static function validate($pzn)
    {
        $pzn = Utils::unDecorate($pzn, ['-', ' ', 'PZN', 'pzn']);

        if (strlen($pzn) !== 8 || ! ctype_digit($pzn)) {
            return false;
        }

        if (0 === (int) $pzn) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 7; ++$i) {
            $sum += (int) $pzn[$i] * ($i + 1);
        }

        $remainder = $sum % 11;

        if ($remainder === 10) {
            return false;
        }

        return $remainder === (int) $pzn[7];
    }
}
