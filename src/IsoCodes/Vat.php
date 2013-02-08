<?php

namespace IsoCodes;

/**
 * VAT
 * The Value Added Tax, or VAT, in the European Union is a general, broadly based consumption tax
 * assessed on the value added to goods and services.
 * @see http://ec.europa.eu/taxation_customs/vies/faq.html
 */
class Vat
{
     /**
     * validate
     * Checks if $vat is a valid, European Union VAT number
     *
     * @param  mixed   $vat
     * @return boolean
     */
    public static function validate($vat)
    {
        if (empty($vat)) {
            return false;
            //return new InvalidArgumentException("Valid VAT number cannot be empty");
        }
        // retrieve the $country code (2 letters)
        preg_match('/[A-Z]{2}/', $vat, $countries);
        if ( count($countries) != 1) {
            return false;
            //return new \InvalidArgumentException("Expected VAT numbers start with 2 uppercase letters");
        }
        $country = $countries[0];

        $matches = array();
        switch ($country) {
        case 'DE' :
        case 'EE' :
        case 'EL' :
        case 'PT' :
            $details = 'country code + 9 numbers';
            preg_match('/^' . $country . '[0-9]{9}$/', $vat, $matches);
            break;

        case 'BE' :
        case 'PL' :
        case 'SK' :
            $details = 'country code + 10 numbers';
            preg_match('/^' . $country . '[0-9]{10}$/', $vat, $matches);
            break;

        case 'AT' :
            $details = 'country code + U + 8 numbers';
            preg_match('/^' . $country . 'U[0-9]{8}$/', $vat, $matches);
            break;

        case 'BG' :
            $details = 'country code + 9 or 10 numbers';
            preg_match('/^' . $country . '[0-9]{9,10}$/', $vat, $matches);
            break;

        case 'CY' :
            $details = 'country code + 8 numbers + 1 char';
            preg_match('/^' . $country . '[0-9]{8}[a-z]{1}$/i', $vat, $matches);
            break;

        case 'DK' :
        case 'FI' :
        case 'HU' :
        case 'LU' :
        case 'MT' :
        case 'SI' :
            $details = 'country code + 8 numbers';
            preg_match('/^' . $country . '[0-9]{8}$/', $vat, $matches);
            break;

        case 'ES' :
            $details = 'country code + 9 numbers or chars';
            preg_match('/^' . $country . '[0-9a-z]{9}$/i', $vat, $matches);
            break;

        case 'IE' :
            $details = 'country code + 8 numbers or chars';
            preg_match('/^' . $country . '[0-9a-z]{8}$/i', $vat, $matches);
            break;

        case 'IT' :
        case 'FR' :
        case 'LV' :
            $details = 'country code + 11 numbers';
            preg_match('/^' . $country . '[0-9]{11}$/', $vat, $matches);
            break;

        case 'LT' :
            $details = 'country code + 9 or 12 numbers';
            preg_match('/^' . $country . '([0-9]{9}|[0-9]{12})$/', $vat, $matches);
            break;

        case 'NL' :
            $details = 'country code + 12 numbers or chars';
            preg_match('/^' . $country . '[0-9a-z]{12}$/i', $vat, $matches);
            break;

        case 'CZ' :
            $details = 'country code + 8, 9 or 10 numbers';
            preg_match('/^' . $country . '[0-9]{8,10}$/', $vat, $matches);
            break;

        case 'RO' :
            $details = 'country code + 2 to 10 numbers';
            preg_match('/^' . $country . '[0-9]{2,10}$/', $vat, $matches);
            break;

        case 'GB' :
            $details = 'country code + 5, 9 or 12 numbers or chars';
            preg_match('/^' . $country . '([0-9a-z]{5}|[0-9a-z]{9}|[0-9a-z]{12})$/i', $vat, $matches);
            break;

        case 'SE' :
            $details = 'country code + 12 numbers';
            preg_match('/^' . $country . '[0-9]{12}$/', $vat, $matches);
            break;

        default :
            $details = "Unmanaged error occured (because sometimes, shit happens)";
        }

        if (is_array($matches) && empty($matches)) {
            return false;
        }

        return true;
    }
}
