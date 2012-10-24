<?php

namespace IsoCodes;

class Uknin implements IsoCodeInterface
{
    /**
     * UK's National Insurance number validator
     *
     * @author ronan.guilloux
     * @param string $uknin
     * @see http://www.govtalk.gov.uk/gdsc/html/frames/NationalInsuranceNumber-2-1-Release.htm
     * @return boolean
     */
    public static function validate( $uknin )
    {
        $regexpMustCheck = "/^[A-CEGHJ-NOPR-TW-Z]{1}[A-CEGHJ-NPR-TW-Z]{1}[0-9]{6}[A-D\s]{1}/i";
        $regexpMustNOTCheck = "/(^GB)|(^BG)|(^NK)|(^KN)|(^TN)|(^NT)|(^ZZ).+/i";

        return (boolean) (preg_match( $regexpMustCheck, $uknin ) && !preg_match( $regexpMustNOTCheck, $uknin ) );
    }
}
