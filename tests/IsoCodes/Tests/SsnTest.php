<?php

namespace IsoCodes\Tests;

/**
 * SsnTest
 *
 * @covers IsoCodes\Ssn
 */
class SsnTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     *
     * @link http://fr.fakenamegenerator.com/social-security-number.php
     */
    public function getValidValues()
    {
        return array(
            array('423-05-9675'),
            array('432-01-5257'),
            array('600-01-4950'),
            array('619-01-7173'),
            array('651-01-3431')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array('574-09-0776'),
            array('123-45-6789'),
            array('1234-567-89'),
            array('123456789'),
            array('773-45-6789'),
        );
    }
}
