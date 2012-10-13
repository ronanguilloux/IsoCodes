<?php

namespace Isocodes;

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
     * "CODE POSTAL" French zipcode validator
     * Pay attention to many exceptions & particularities, see @link
     *
     * @param string $codepostal
     * @link http://fr.wikipedia.org/wiki/Code_postal_en_France
     * @return boolean
     */
    public static function validateFrance($zipcode){
        $regexp = "/^[0-9]{5}$/";
        return (boolean)preg_match( $regexp, $zipcode );
    }

}
?>
