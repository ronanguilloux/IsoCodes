<?php

namespace IsoCodes;

/**
 * Class Dun14 for former Distribution Unit Number, 14 digits long codes.
 * This is a symlink, for convenience purposes only.
 *
 * @link https://en.wikipedia.org/wiki/Global_Trade_Item_Number
 */
class Dun14 extends Gtin14 implements IsoCodeInterface
{
    /**
     * @param mixed $dun14
     *
     * @deprecated in favor of Gtin14
     *
     * @return bool
     */
    public static function validate($dun14)
    {
        return parent::check($dun14, 14);
    }
}
