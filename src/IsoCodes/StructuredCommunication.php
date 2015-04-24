<?php

namespace IsoCodes;

/**
 * Class StructuredCommunication.
 */
class StructuredCommunication implements IsoCodeInterface
{
    /**
     * @param string $structure
     *
     * @return bool
     */
    public static function validate($structure)
    {
        if (12 !== strlen($structure)
        ) {
            return false;
        }

        $sequences = substr($structure, 0, 10);
        $key       = substr($structure, -2);
        $control   = $sequences % 97; // final control must be a 2-digits:
        $control   = (1 < strlen($control)) ? $control : sprintf('0%d', $control);

        return $key === $control;
    }
}
