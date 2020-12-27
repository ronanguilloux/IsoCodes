<?php

namespace IsoCodes;

/**
 * @example :
 * echo Ssn::validate('557-26-9048');
 *
 * As of 2011 SSN's are completely randomized
 *
 * @see    : http://www.socialsecurity.gov/employer/randomization.html)
 * @source  : http://haxorfreek.15.forumer.com/a/us-social-security-number-ssn-generator_post1847.html
 * @source  : https://gist.github.com/Kryptonit3/7b6bff5abab4a62e2b796a0e5a9ab94e
 *
 * Some special numbers are never allocated:
 * Numbers with all zeros in any digit group (000-##-####, ###-00-####, ###-##-0000).[36][37]
 * Numbers with 666 or 900–999 (Individual Taxpayer Identification Number) in the first digit group.[36]
 * special cases to care bout:
 *
 * @see     : https://stackoverflow.com/questions/1517026/how-can-i-validate-us-social-security-number/18385786#18385786
 */
class Ssn implements IsoCodeInterface
{
    /**
     * SSN validation.
     *
     * @param string $ssn
     *
     * @return bool
     */
    public static function validate($ssn)
    {
        $ssn = trim($ssn);

        // Must be in format AAA-GG-SSSS or AAAGGSSSS
        if (!preg_match('/^([0-9]{9}|[0-9]{3}-[0-9]{2}-[0-9]{4})$/', $ssn)) {
            return false;
        }

        $forbidden = [
            '078-051-120', // Woolworth Wallet Fiasco
            '219-099-999',  // Was used in an ad by the Social Security Administration
        ];

        if (in_array($ssn, $forbidden)) {
            return false;
        }

        $ssnFormatted = (9 == strlen($ssn)) ? preg_replace('/^([0-9]{3})([0-9]{2})([0-9]{4})$/', '$1-$2-$3', $ssn) : $ssn;
        $ssn_array = explode('-', $ssnFormatted);

        // number groups must follow these rules:
        // * no single group can have all 0's
        // * first group cannot be 666, 900-999
        // * second group must be 01-99
        // * third group must be 0001-9999

        foreach ($ssn_array as $group) {
            if (0 == $group) {
                return false;
            }
        }

        // Forbidden numbers
        return !(666 == $ssn_array[0] || '000' === $ssn_array[0] || $ssn_array[0] > 899);
    }
}
