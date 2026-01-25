<?php

namespace IsoCodes;

/**
 * Utils.
 */
class Utils
{
    /**
     * @param mixed $input: null or string
     */
    public static function unDecorate($input, array $hyphens = []): string
    {
        $input = (string) $input;
        $hyphensLength = count($hyphens);
        // removing hyphens
        for ($i = 0; $i < $hyphensLength; ++$i) {
            $input = str_replace($hyphens[$i], '', $input);
        }

        return $input;
    }

    /**
     * @param mixed $value: null or string
     */
    public static function luhn($value, int $length, $hyphens): bool
    {
        $value = self::unDecorate($value, $hyphens);
        if (strlen($value) !== $length) {
            return false;
        }

        $sum = 0;
        $parity = $length % 2;
        for ($i = 0; $i < $length; ++$i) {
            $digit = (int) $value[$i];
            if ($i % 2 === $parity) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            $sum += $digit;
        }

        return 0 === ($sum % 10);
    }

    /**
     * @param mixed $value: null or string
     */
    public static function luhnForGTIN($value, int $length, bool $unDecorate = true, array $hyphens = []): bool
    {
        $value = $unDecorate ? self::unDecorate($value, $hyphens) : $value;
        $divider = 10;
        $multiplier = 3;

        if (strlen($value) != $length) {
            return false;
        }
        $expr = sprintf('/\\d{%d}/i', $length);
        if (! preg_match($expr, $value)) {
            return false;
        }
        if (0 === (int) $value) {
            return false;
        }

        $sum = 0;
        // the multiplier get applied differently (even or odd) according the value length
        // see https://blog.datafeedwatch.com/hubfs/blog/calculate-14-digit-gtin.png
        for ($i = 0; $i < $length; $i += 2) {
            if (0 === $length % 2) {
                $sum += $multiplier * (int) substr($value, $i, 1);
                $sum += (int) substr($value, $i + 1, 1);
            } else {
                $sum += (int) substr($value, $i, 1);
                $sum += $multiplier * (int) substr($value, $i + 1, 1);
            }
        }

        return 0 === $sum % $divider;
    }

    /**
     * Check a value using a weighted modulo algorithm.
     *
     * Used for ISBN-10, ISSN, etc.
     * The algorithm is:
     * 1. Calculate the sum of the products of each digit and its corresponding weight.
     * 2. Calculate the remainder of the sum divided by the divider (modulo).
     * 3. Calculate the complement: divider - remainder.
     * 4. If remainder is 0, check digit is 0.
     * 5. If complement is 10, check digit is 'X' (if applicable).
     *
     * @param string $value   The value to check
     * @param int    $length  Expected length of the value
     * @param array  $weights Weights to apply to each digit
     * @param int    $divider Modulo divider
     * @param array  $hyphens Characters to ignore (remove)
     */
    public static function luhnWithWeights(string $value, int $length, array $weights, int $divider, $hyphens): bool
    {
        $value = self::unDecorate($value, $hyphens);
        if ($length !== strlen($value)) {
            return false;
        }

        $digits = substr($value, 0, $length - 1);
        $check = substr($value, $length - 1, 1);
        $expr = sprintf('/\\d{%d}/i', $length - 1); // Check only the digits part
        if (! preg_match($expr, $digits)) {
            return false;
        }

        $sum = 0;
        $len = strlen($digits);
        for ($i = 0; $i < $len; ++$i) {
            $sum += $weights[$i] * (int) $digits[$i];
        }

        $rest = $sum % $divider;
        $expectedCheck = (0 === $rest) ? 0 : $divider - $rest;

        if (10 === $expectedCheck) { // Handle X case if applicable (mostly 11)
            return 'X' === strtoupper($check);
        }

        if (! is_numeric($check)) {
            return false;
        }

        return (int) $check === $expectedCheck;
    }

    /**
     * Calculate Check Character using ISO 7064, MOD 37-36.
     *
     * Used for ISAN.
     *
     * @param string $value The value to calculate check character for (hexadecimal)
     *
     * @return string The calculated check character
     */
    public static function iso7064Mod3736(string $value): string
    {
        $alphabet = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $value = strtoupper($value);
        $chars = str_split($value);
        $product = 36;

        foreach ($chars as $char) {
            $digit = strpos($alphabet, $char);

            // Check for invalid character not found in alphabet
            if (false === $digit) {
                // Fallback or Exception?
                // Existing implementation used intval(char, 16) which treats non-hex loosely.
                // But for strict Alphanumeric, we assume valid input or handle error.
                // Given strict types, we should continue or return error.
                // For now, let's behave like the old one, assuming sanitized input,
                // but strict validation isn't the job of this calculator itself usually.
                $digit = 0;
            }

            // 1. Add 36 to [digit] to get Intermediate Sum
            // But since we carry product, it is: Sum = Product + Digit
            $sum = $product + $digit;

            // 2. Adjust Intermediate Sum
            if ($sum > 36) {
                $sum -= 36;
            }
            if (0 === $sum) {
                $sum = 36;
            }

            // 3. Calculate Product
            $product = $sum * 2;

            // 4. Adjust Product
            if ($product >= 37) {
                $product -= 37;
            }
        }

        // Final Validation
        if (1 === $product) {
            return '0';
        }

        $checkValue = 37 - $product;

        // Convert to Alphanumeric
        return $alphabet[$checkValue];
    }
}
