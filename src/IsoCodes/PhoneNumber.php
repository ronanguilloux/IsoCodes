<?php

namespace IsoCodes;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;

/**
 * Class PhoneNumber.
 */
class PhoneNumber
{
    /**
     * @param string $phoneNumber
     * @param string $country
     *
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    public static function validate($phoneNumber, $country = null)
    {
        $phoneNumber = trim($phoneNumber);
        if (empty($phoneNumber)) {
            return false;
        }
        $country = strtoupper($country);
        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $numberProto = $phoneUtil->parse($phoneNumber, $country);
        } catch (NumberParseException $e) {
            return false;
        }

        return $phoneUtil->isValidNumber($numberProto);
    }
}
