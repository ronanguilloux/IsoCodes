<?php

namespace IsoCodes;

/**
 * Class Itf14: ITF-14 (Interleaved Two of Five) is the GS1 implementation
 * of an Interleaved 2 of 5 bar code to encode a Global Trade Item Number.
 * This is a symlink, for convenience purposes only.
 *
 * @link https://en.wikipedia.org/wiki/ITF-14
 * @link https://en.wikipedia.org/wiki/Global_Trade_Item_Number
 */
class Itf14 extends Gtin14 implements IsoCodeInterface
{
    /**
     * @param mixed $itf14
     *
     * @deprecated in favor of Gtin14
     *
     * @return bool
     */
    public static function validate($itf14)
    {
        return parent::check($itf14, 14);
    }
}
