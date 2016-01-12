<?php

namespace IsoCodes;

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
    public static function validate($phoneNumber, $country)
    {
        $phoneNumber = trim($phoneNumber);
        if (empty($phoneNumber)) {
            return false;
        }
        $country = strtoupper($country);
        $phoneUtil = PhoneNumberUtil::getInstance();
        $numberProto = $phoneUtil->parse($phoneNumber, $country);

        return $phoneUtil->isValidNumber($numberProto);
    }
}
