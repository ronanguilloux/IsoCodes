<?php

namespace IsoCodes;

/**
 * Utils
 */
class Utils
{
    /**
     * @param string $input
     * @param array  $hyphens
     *
     * @return string
     */
    public static function unDecorate($input, $hyphens = [])
    {
        $hyphensLength = count($hyphens);
        // removing hyphens
        for ($i = 0; $i < $hyphensLength; ++$i) {
            $input = str_replace($hyphens[$i], '', $input);
        }

        return $input;
    }
}
