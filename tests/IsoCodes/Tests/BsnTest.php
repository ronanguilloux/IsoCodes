<?php

namespace IsoCodes\Tests;

/**
 * @covers Isocodes\Bsn
 *
 * @author Albert Bakker <hello@abbert.nl>
 */
final class BsnTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['075278431'],
            ['182269978'],
            ['095690864'],
            ['012470715'],
            ['207107452'],
            ['282258450'],
            ['201845313'],
            ['012806249'],
            ['181136685'],
            ['081933976'],
            ['068812449'],
            ['225553028'],
            ['054368017'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['2018453'],    // < 8 chars
            ['0124707154'], // > 9 chars
            ['09569086'],   // https://nl.wikipedia.org/wiki/Elfproef
            ['054368017a'], // Not numeric
        ];
    }
}
