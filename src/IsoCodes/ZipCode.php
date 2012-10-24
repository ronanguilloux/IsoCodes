<?php

namespace IsoCodes;

class ZipCode
{

    public static function validate( $zipcode, $country )
    {
        $zipcode = trim($zipcode);
        if (empty($zipcode)) {
            throw new \InvalidArgumentException("ERROR: The zipcode value cannot be empty.");
        }
        $methodName = "validate" . trim(ucfirst(strtolower($country)));
        if (!is_callable(array(__CLASS__, $methodName))) {
            throw new \InvalidArgumentException("ERROR: The zipcode validator for $country does not exists yet: feel free to add it.");
        }

        return call_user_func_array(array(__CLASS__ , $methodName), array($zipcode));
    }

    /**
     * US "ZIP+4" zipcode validator
     * @param  string  $zipcode
     * @return boolean
     */

    public static function validateUS($zipcode)
    {
        $regexp = "/^\d{5}(-\d{4})?$/";

        return (boolean) preg_match( $regexp, $zipcode );
    }

    /**
     * Canadian zipcode validator
     * Pay attention to many exceptions & particularities, see @link
     *
     * The postal code is a six-character alpha-numeric code in the format "ANA NAN"
     * where "A" represents an alphabetic character and "N" represents a numeric character.
     * A postal code is made up of two segments:
     * "Forward Sortation Area" (FSA) and "Local Delivery Unit" (LDU).
     *
     * Both "A0A 1A0" & "A0A1A0" are considered valid.
     *
     * "No postal code includes the letters D, F, I, O, Q, or U,
     * as the OCR equipment used in automated sorting could easily confuse them
     * with other letters and digits[citation needed],
     * especially when they are rendered as cursive handwriting.
     * The letters W and Z are used, but are not currently used as the first letter"
     *
     * @param string $zipcode
     * @link http://en.wikipedia.org/wiki/Postal_codes_in_Canada
     * @link http://en.wikipedia.org/wiki/List_of_A_postal_codes_of_Canada
     * @return boolean
     */
    public static function validateCanada($zipcode)
    {
        $regexp = "/^[ABCEGHJ-NPRSTVXY]{1}[0-9]{1}[ABCEGHJ-NPRSTV-Z]{1}[ ]?[0-9]{1}[ABCEGHJ-NPRSTV-Z]{1}[0-9]{1}$/";

        return (boolean) preg_match( $regexp, $zipcode );
    }

    /**
     * "CODE POSTAL" French zipcode validator
     * Pay attention to many exceptions & particularities, see @link
     *
     * variant : "/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/"
     *
     * @param string $zipcode
     * @link http://fr.wikipedia.org/wiki/Code_postal_en_France
     * @return boolean
     */
    public static function validateFrance($zipcode)
    {
        $regexp = "/^[0-9]{5}$/";

        return (boolean) preg_match( $regexp, $zipcode );
    }
}
