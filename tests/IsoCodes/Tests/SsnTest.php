<?php

namespace IsoCodes\Tests;

/**
 * Class SsnTest.
 *
 * @covers \IsoCodes\Ssn
 */
class SsnTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     *
     * @see http://fr.fakenamegenerator.com/social-security-number.php
     */
    public function getValidValues()
    {
        return [
            ['423-05-9675'],
            ['432-01-5257'],
            ['600-01-4950'],
            ['619-01-7173'],
            ['651-01-3431'],
            ['123-45-6789'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['123-45-67890'],
            ['000-45-67890'],
            ['666-45-67890'],
            ['998-45-67890'],
            ['078-051-120'], // Woolworth Wallet Fiasco
            ['219-099-999'],  // Was used in an ad by the Social Security Administration
        ];
    }
}
