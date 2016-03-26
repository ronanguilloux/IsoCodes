<?php

namespace IsoCodes;

/**
 * The Global Location Number (GLN) is part of the GS1 systems of standards.
 * It is a simple tool used to identify a location and can identify locations uniquely where required.
 * The mechanism for GLN is the same as GTIN-13.
 *
 * @link https://en.wikipedia.org/wiki/Global_Location_Number
 * @link https://en.wikipedia.org/wiki/Global_Trade_Item_Number
 */
class Gln extends Gtin13 implements IsoCodeInterface
{
    /**
     * @param mixed $gln
     *
     * @return bool
     */
    public static function validate($gln)
    {
        return parent::check($gln, 13);
    }
}
