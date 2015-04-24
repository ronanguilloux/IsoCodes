<?php

namespace IsoCodes;

/**
 * Class Uknin.
 */
class Uknin implements IsoCodeInterface
{
    /**
     * UK's National Insurance Number validator
     * Also known as NINO.
     *
     * @param string $uknin
     *
     * @author ronan.guilloux
     *
     * regexp must check        "/^[A-CEGHJ-NOPR-TW-Z]{1}[A-CEGHJ-NPR-TW-Z]{1}[0-9]{6}[A-D\s]{1}/i";
     * regexp must NOT check    "/(^GB)|(^BG)|(^NK)|(^KN)|(^TN)|(^NT)|(^ZZ).+/i";
     *
     * @see    http://www.hmrc.gov.uk/manuals/nimmanual/nim39110.htm
     * @see    http://stackoverflow.com/a/17929051/490589
     *
     * @return bool
     */
    public static function validate($uknin)
    {
        $regexpMustCheck    = "/^(?!BG|GB|NK|KN|TN|NT|ZZ)[ABCEGHJ-PRSTW-Z][ABCEGHJ-NPRSTW-Z]\d{6}[A-D]$/";

        return (boolean) preg_match($regexpMustCheck, $uknin);
    }
}
