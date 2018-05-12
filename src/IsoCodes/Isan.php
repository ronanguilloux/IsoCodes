<?php

namespace IsoCodes;

/**
 * Class Isan.
 */
class Isan extends ModN implements IsoCodeInterface
{
    const HYPHENS = ['‐', '-', ' '];

    /**
     * Isan validator.
     * Ex: a V-ISAN (ISAN w/ version)
     *     ISAN 1881-66C7-3420-0000-7
     *          1881-66C7-3420  0000        7
     *        = root            = episode   control key.
     *
     * @param string $isan
     *
     * @link    http://www.isan.org/docs/isan_user_guide.pdf
     * @link    http://www.isan.org/docs/ISAN_FAQ.pdf
     * @link    https://en.wikipedia.org/wiki/International_Standard_Audiovisual_Number
     * @link    https://en.wikipedia.org/wiki/ISO_7064
     *
     * @return bool
     */
    public static function validate($isan)
    {
        $mod = 36; // MOD36,37, cf. ISO 7064
        $isanLen = 16; // root+episode = 16 digits
        $isan = Luhn::unDecorate(strtoupper($isan), self::HYPHENS);
        if ('ISAN' !== substr($isan, 0, 4)) {
            return false;
        }
        if (mb_strlen($isan) === 30) { // ISAN+root+episode+key+version+key = 30 digits, likely a Version-ISAN
            return self::validateVISAN($isan);
        }
        if (mb_strlen($isan) !== 21) { // ISAN+root+episode+key = 21 digits
            return false;
        }
        $key = substr($isan, -1);
        $isan = substr($isan, 4, $isanLen);

        return parent::check($isan, $key, $mod);
    }

    /**
     * version-Isan validator.
     * Ex: a V-ISAN (ISAN w/ version)
     *     ISAN 1881-66C7-3420-0000-7-0000-0005-U
     *          1881-66C7-3420  0000        7               0000-0005   U
     *        = root            = episode   control key     version     control key.
     *
     * @param string $vIsan
     *
     * @link    http://www.isan.org/docs/isan_user_guide.pdf
     * @link    http://www.isan.org/docs/ISAN_FAQ.pdf
     * @link    http://www.isan.org/template/1.2/goToPublicSearch.do?resetForm=1
     * @link    https://en.wikipedia.org/wiki/International_Standard_Audiovisual_Number
     * @link    https://en.wikipedia.org/wiki/ISO_7064
     *
     * @return bool
     */
    public static function validateVISAN($vIsan)
    {
        var_dump(mb_strlen($vIsan));
        $mod = 36; // MOD36,37, cf. ISO 7064
        $vIsanLen = 24; // root+episode = 16 digits
        $key = substr($vIsan, -1);
        $vIsan = substr($vIsan, 4, 16).substr($vIsan, 21, 8);

        return parent::check($vIsan, $key, $vIsanLen, $mod);
    }
}
