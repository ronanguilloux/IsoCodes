<?php

namespace IsoCodes;

/**
 * Class Upca for former UPC-A, Universal Product Code, 12 digits long codes.
 * This is a symlink, for convenience purposes only.
 *
 * @link https://en.wikipedia.org/wiki/Universal_Product_Code
 * @link https://en.wikipedia.org/wiki/Global_Trade_Item_Number
 * @link http://www.gs1.org/barcodes/ean-upc
 */
class Upca extends Gtin12 implements IsoCodeInterface
{
    /**
     * @param mixed $upca
     *
     * @deprecated in favor of Gtin12
     *
     * @return bool
     */
    public static function validate($upca)
    {
        return parent::check($upca, 12);
    }
}
