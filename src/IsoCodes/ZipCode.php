<?php

namespace IsoCodes;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ZipCode.
 */
class ZipCode implements IsoCodeInterface
{
    /**
     * ZipCode patterns, generated from http://i18napis.appspot.com (updated: 2016-07-08).
     *
     * <code>
     *  $patterns = [];
     *  $data = json_decode(file_get_contents('http://i18napis.appspot.com/address/data'), true);
     *  $countries = explode('~', $data['countries']);
     *  foreach ($countries as $country) {
     *     $data = json_decode(file_get_contents('http://i18napis.appspot.com/address/data/'.$country), true);
     *     if (isset($data['zip'])) {
     *         $patterns[$country] = $data['zip'];
     *     }
     *  }
     *  var_export($patterns);
     * </code>
     */
    protected static $patterns = [
        'AC' => 'ASCN 1ZZ',
        'AD' => 'AD[1-7]0\\d',
        'AF' => '\\d{4}',
        'AG' => '.{1,255}',
        'AI' => '2640',
        'AL' => '\\d{4}',
        'AM' => '(37)?\\d{4}',
        'AO' => '.{1,255}',
        'AQ' => '-7151',
        'AR' => '((?:[A-HJ-NP-Z])?\\d{4})([A-Z]{3})?',
        'AS' => '(96799)(?:[ \\-](\\d{4}))?',
        'AT' => '\\d{4}',
        'AU' => '\\d{4}',
        'AW' => '.{1,255}',
        'AX' => '22\\d{3}',
        'AZ' => '\\d{4}',
        'BA' => '\\d{5}',
        'BB' => 'BB\\d{5}',
        'BD' => '\\d{4}',
        'BE' => '\\d{4}',
        'BF' => '[1-9]\\d{4}',
        'BG' => '\\d{4}',
        'BH' => '(?:\\d|1[0-2])\\d{2}',
        'BI' => '.{1,255}',
        'BJ' => '.{1,255}',
        'BL' => '9[78][01]\\d{2}',
        'BM' => '[A-Z]{2} ?[A-Z0-9]{2}',
        'BN' => '[A-Z]{2} ?\\d{4}',
        'BO' => '.{1,255}',
        'BQ' => '.{1,255}',
        'BR' => '\\d{5}-?\\d{3}',
        'BS' => '.{1,255}',
        'BT' => '\\d{5}',
        'BV' => '.{1,255}',
        'BW' => '.{1,255}',
        'BY' => '\\d{6}',
        'BZ' => '.{1,255}',
        'CA' => '[ABCEGHJKLMNPRSTVXY]\\d[ABCEGHJ-NPRSTV-Z] ?\\d[ABCEGHJ-NPRSTV-Z]\\d',
        'CC' => '6799',
        'CD' => '.{1,255}',
        'CF' => '.{1,255}',
        'CG' => '.{1,255}',
        'CH' => '\\d{4}',
        'CI' => '.{1,255}',
        'CK' => '.{1,255}',
        'CL' => '\\d{7}',
        'CM' => '.{1,255}',
        'CN' => '\\d{6}',
        'CO' => '\\d{6}',
        'CR' => '\\d{4,5}|\\d{3}-\\d{4}',
        'CU' => '(CP)?\\d{5}',
        'CV' => '\\d{4}',
        'CW' => '.{1,255}',
        'CX' => '6798',
        'CY' => '\\d{4}',
        'CZ' => '\\d{3} ?\\d{2}',
        'DE' => '\\d{5}',
        'DJ' => '.{1,255}',
        'DK' => '\\d{4}',
        'DM' => '.{1,255}',
        'DO' => '\\d{5}',
        'DZ' => '\\d{5}',
        'EC' => '[A-Z]\\d{4}[A-Z]|(?:[A-Z]{2})?\\d{6}',
        'EE' => '\\d{5}',
        'EG' => '\\d{5}',
        'EH' => '\\d{5}',
        'ER' => '.{1,255}',
        'ES' => '\\d{5}',
        'ET' => '\\d{4}',
        'FI' => '\\d{5}',
        'FJ' => '.{1,255}',
        'FK' => 'FIQQ 1ZZ',
        'FM' => '(9694[1-4])(?:[ \\-](\\d{4}))?',
        'FO' => '\\d{3}',
        'FR' => '\\d{2} ?\\d{3}',
        'GA' => '.{1,255}',
        'GB' => 'GIR ?0AA|((AB|AL|B|BA|BB|BD|BH|BL|BN|BR|BS|BT|BX|CA|CB|CF|CH|CM|CO|CR|CT|CV|CW|DA|DD|DE|DG|DH|DL|DN|DT|DY|E|EC|EH|EN|EX|FK|FY|G|GL|GY|GU|HA|HD|HG|HP|HR|HS|HU|HX|IG|IM|IP|IV|JE|KA|KT|KW|KY|L|LA|LD|LE|LL|LN|LS|LU|M|ME|MK|ML|N|NE|NG|NN|NP|NR|NW|OL|OX|PA|PE|PH|PL|PO|PR|RG|RH|RM|S|SA|SE|SG|SK|SL|SM|SN|SO|SP|SR|SS|ST|SW|SY|TA|TD|TF|TN|TQ|TR|TS|TW|UB|W|WA|WC|WD|WF|WN|WR|WS|WV|YO|ZE)(\\d[\\dA-Z]? ?\\d[ABD-HJLN-UW-Z]{2}))|BFPO ?\\d{1,4}',
        'GD' => '.{1,255}',
        'GE' => '\\d{4}',
        'GF' => '9[78]3\\d{2}',
        'GG' => 'GY\\d[\\dA-Z]? ?\\d[ABD-HJLN-UW-Z]{2}',
        'GH' => '.{1,255}',
        'GI' => 'GX11 1AA',
        'GL' => '39\\d{2}',
        'GM' => '.{1,255}',
        'GN' => '\\d{3}',
        'GP' => '9[78][01]\\d{2}',
        'GQ' => '.{1,255}',
        'GR' => '\\d{3} ?\\d{2}',
        'GS' => 'SIQQ 1ZZ',
        'GT' => '\\d{5}',
        'GU' => '(969(?:[12]\\d|3[12]))(?:[ \\-](\\d{4}))?',
        'GW' => '\\d{4}',
        'GY' => '.{1,255}',
        'HK' => '-999077',
        'HM' => '\\d{4}',
        'HN' => '\\d{5}',
        'HR' => '\\d{5}',
        'HT' => '\\d{4}',
        'HU' => '\\d{4}',
        'ID' => '\\d{5}',
        'IE' => '[\\dA-Z]{3} ?[\\dA-Z]{4}',
        'IL' => '\\d{5}(?:\\d{2})?',
        'IM' => 'IM\\d[\\dA-Z]? ?\\d[ABD-HJLN-UW-Z]{2}',
        'IN' => '\\d{6}',
        'IO' => 'BBND 1ZZ',
        'IQ' => '\\d{5}',
        'IR' => '\\d{5}-?\\d{5}',
        'IS' => '\\d{3}',
        'IT' => '\\d{5}',
        'JE' => 'JE\\d[\\dA-Z]? ?\\d[ABD-HJLN-UW-Z]{2}',
        'JM' => '(JM)[A-Z]{3}\\d{2}',
        'JO' => '\\d{5}',
        'JP' => '\\d{3}-?\\d{4}',
        'KE' => '\\d{5}',
        'KG' => '\\d{6}',
        'KH' => '\\d{5}',
        'KI' => 'KI\\d{4}',
        'KM' => '.{1,255}',
        'KN' => 'KN\\d{4}(\\-\\d{4})?',
        'KP' => '.{1,255}',
        'KR' => '\\d{3}(?:\\d{2}|-\\d{3})',
        'KW' => '\\d{5}',
        'KY' => 'KY\\d-\\d{4}',
        'KZ' => '\\d{6}',
        'LA' => '\\d{5}',
        'LB' => '(?:\\d{4})(?: ?(?:\\d{4}))?',
        'LC' => 'LC\\d{2}  \\d{3}',
        'LI' => '(948[5-9])|(949[0-7])',
        'LK' => '\\d{5}',
        'LR' => '\\d{4}',
        'LS' => '\\d{3}',
        'LT' => '\\d{5}',
        'LU' => '\\d{4}',
        'LV' => 'LV-\\d{4}',
        'LY' => '.{1,255}',
        'MA' => '\\d{5}',
        'MC' => '980\\d{2}',
        'MD' => '\\d{4}',
        'ME' => '8\\d{4}',
        'MF' => '9[78][01]\\d{2}',
        'MG' => '\\d{3}',
        'MH' => '(969[67]\\d)(?:[ \\-](\\d{4}))?',
        'MK' => '\\d{4}',
        'ML' => '.{1,255}',
        'MM' => '\\d{5}',
        'MN' => '\\d{5}',
        'MO' => '.{1,255}',
        'MP' => '(9695[012])(?:[ \\-](\\d{4}))?',
        'MQ' => '9[78]2\\d{2}',
        'MR' => '.{1,255}',
        'MS' => 'MSR\\d{4}',
        'MT' => '[A-Z]{3} ?\\d{2,4}',
        'MU' => '\\d{3}(?:\\d{2}|[A-Z]{2}\\d{3})',
        'MV' => '\\d{5}',
        'MW' => '\\d{6}',
        'MX' => '\\d{5}',
        'MY' => '\\d{5}',
        'MZ' => '\\d{4}',
        'NA' => '\\d{5}',
        'NC' => '988\\d{2}',
        'NE' => '\\d{4}',
        'NF' => '2899',
        'NG' => '\\d{6}',
        'NI' => '\\d{5}',
        'NL' => '[1-9]{1}\\d{3}[ ]?[A-Z]{2}',    // Changed: ZipCode cannot start with 0
        'NO' => '\\d{4}',
        'NP' => '\\d{5}',
        'NR' => '(NRU68)',
        'NU' => '-9974',
        'NZ' => '\\d{4}',
        'OM' => '(PC )?\\d{3}',
        'PA' => '\\d{4}',
        'PE' => '(?:LIMA \\d|CALLAO 0?)\\d|[0-2]\\d{4}',
        'PF' => '987\\d{2}',
        'PG' => '\\d{3}',
        'PH' => '\\d{4}',
        'PK' => '\\d{5}',
        'PL' => '\\d{2}-\\d{3}',
        'PM' => '9[78]5\\d{2}',
        'PN' => 'PCRN 1ZZ',
        'PR' => '(00[679]\\d{2})(?:[ \\-](\\d{4}))?',
        'PS' => '(P[1-9]\\d{6})|(\\d{3}-\\d{3})',
        'PT' => '\\d{4}-\\d{3}',
        'PW' => '(969(?:39|40))(?:[ \\-](\\d{4}))?',
        'PY' => '\\d{4}',
        'QA' => '.{1,255}',
        'RE' => '9[78]4\\d{2}',
        'RO' => '\\d{6}',
        'RS' => '\\d{5,6}',
        'RU' => '\\d{6}',
        'RW' => '.{1,255}',
        'SA' => '\\d{5}',
        'SB' => '.{1,255}',
        'SC' => '.{1,255}',
        'SD' => '\\d{5}',
        'SE' => '\\d{3} ?\\d{2}',
        'SG' => '\\d{6}',
        'SH' => '(ASCN|STHL) 1ZZ',
        'SI' => '\\d{4}',
        'SJ' => '\\d{4}',
        'SK' => '\\d{3} ?\\d{2}',
        'SL' => '.{1,255}',
        'SM' => '4789\\d',
        'SN' => '\\d{5}',
        'SO' => '[A-Z]{2} ?\\d{5}',
        'SR' => '.{1,255}',
        'SS' => '\\d{5}',
        'ST' => '.{1,255}',
        'SV' => 'CP [1-3][1-7][0-2]\\d',
        'SX' => '.{1,255}',
        'SY' => '.{1,255}',
        'SZ' => '[HLMS]\\d{3}',
        'TA' => 'TDCU 1ZZ',
        'TC' => 'TKCA 1ZZ',
        'TD' => '.{1,255}',
        'TF' => '.{1,255}',
        'TG' => '.{1,255}',
        'TH' => '\\d{5}',
        'TJ' => '\\d{6}',
        'TK' => '.{1,255}',
        'TL' => '.{1,255}',
        'TM' => '\\d{6}',
        'TN' => '\\d{4}',
        'TO' => '.{1,255}',
        'TR' => '\\d{5}',
        'TT' => '\\d{6}',
        'TV' => '.{1,255}',
        'TW' => '\\d{3}(\\d{2})?',
        'TZ' => '\\d{4,5}',
        'UA' => '\\d{5}',
        'UG' => '.{1,255}',
        'UM' => '96898',
        'US' => '(\\d{5})(?:[ \\-](\\d{4}))?',
        'UY' => '\\d{5}',
        'UZ' => '\\d{6}',
        'VA' => '00120',
        'VC' => 'VC\\d{4}',
        'VE' => '\\d{4}',
        'VG' => 'VG\\d{4}',
        'VI' => '(008(?:(?:[0-4]\\d)|(?:5[01])))(?:[ \\-](\\d{4}))?',
        'VN' => '\\d{6}',
        'VU' => '.{1,255}',
        'WF' => '986\\d{2}',
        'WS' => 'WS[1-2]\\d{3}',
        'XK' => '[1-7]\\d{4}',
        'YE' => '.{1,255}',
        'YT' => '976\\d{2}',
        'ZA' => '\\d{4}',
        'ZM' => '\\d{5}',
        'ZW' => '.{1,255}',
    ];

    /**
     * @param string       $zipcode
     * @param string|array $options       Country code (string) or options array
     * @param bool|null    $caseSentitive Deprecated: use options array instead
     *
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    public static function validate($zipcode, $options = [], $caseSentitive = null)
    {
        $zipcode = trim((string) $zipcode);
        if (empty($zipcode)) {
            return false;
        }

        if (is_string($options)) {
            $options = ['country' => $options];
            if (null !== $caseSentitive) {
                $options['case_sensitive'] = $caseSentitive;
            }
        } elseif (null === $options) {
            $options = [];
        }

        if (! is_array($options)) {
            $options = [];
        }

        $resolver = new OptionsResolver();
        $resolver->setDefaults([
            'country' => null,
            'case_sensitive' => false,
        ]);
        $resolver->setAllowedTypes('country', ['string', 'null']);
        $resolver->setAllowedTypes('case_sensitive', 'bool');

        $options = $resolver->resolve($options);

        $country = trim((string) $options['country']);

        if (empty($country)) {
            return false;
        }

        $country = strtoupper($country);
        if (! isset(self::$patterns[$country])) {
            throw new \InvalidArgumentException("ERROR: The zipcode validator for $country does not exists yet: feel free to add it.");
        }

        return (bool) preg_match('/^('.self::$patterns[$country].')$/'.($options['case_sensitive'] ? 'i' : ''), $zipcode);
    }

    /**
     * @return array The available countries code list. ['FR', 'US', 'ZA', ...]
     */
    public static function getAvailableCountries()
    {
        return array_keys(self::$patterns);
    }
}
