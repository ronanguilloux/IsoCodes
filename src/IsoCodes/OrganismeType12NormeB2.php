<?php

namespace IsoCodes;

/**
 * Class OrganismeType12NormeB2.
 */
class OrganismeType12NormeB2 implements IsoCodeInterface
{
    /**
     * validate 1-2 type keys, based on Social Scurity B2 Norm
     * French & Belgian "Clef type 1-2 Norme B2 Securité Sociale".
     *
     * @param string $code
     * @param int    $key
     *
     * @return bool
     */
    public static function validate($code = '', $key = -1)
    {
        $code = $code ?? '';
        $key = $key ?? -1;

        if (strlen($key) < 1) {
            return false;
        }

        if (!is_numeric($key)) {
            return false;
        }

        if (!is_string($code)) {
            return false;
        }

        if (strlen($code) < 2) {
            return false;
        }

        $numerals = str_split($code);
        $rank = array_reverse(array_keys($numerals));
        $orderedNumerals = [];
        foreach ($rank as $i => $rankValue) {
            $orderedNumerals[$rankValue + 1] = $numerals[$i];
        }
        $results = [];
        foreach ($orderedNumerals as $cle => $value) {
            $results[$value] = (0 == $cle % 2) ? ((int) $value * 1) : ((int) $value * 2);
        }
        $sum = 0;
        foreach ($results as $cle => $value) {
            $sum += array_sum(str_split($value));
        }
        $validKey = str_split($sum);
        $validKey = 10 - array_pop($validKey);

        return $key === $validKey;
    }
}
