<?php

namespace IsoCodes\Tests;

/**
 * Class MacTest.
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class MacTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['01-2d-4c-ef-89-ab'],
            ['01-2D-4C-EF-89-AB'],
            ['01:2d:4c:ef:89:ab'],
            ['01:2D:4C:EF:89:AB'],
            ['01-2d-4c-ef-89-59'],
            ['ff-2d-4c-ef-89-59'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            [999999999],
            [9999.9999],
            ['01-2d-4c-ef-89-ab-06'],   // Only 6 groups of digits
            ['01-2d:4c-ef:89-ab'],      // Mixed separators are not allowed
            ['01-2d-4c-EF-89-ab'],      // Mixed cases are not allowed
            ['01-2d-4C-ef-89-ab'],      // Mixed cases are not allowed
            ['01-2dc-4c-ef-89-ab'],     // Only 2 digits per group
        ];
    }
}
