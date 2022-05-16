<?php

namespace IsoCodes\Tests;

/**
 * Class InseeTest.
 *
 * @covers \IsoCodes\Insee
 */
class InseeTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['177022A00100229'],   // Corse: 2A
            ['253012B073004'],     // Corse: 2B, clef optionnelle omise
            ['278112B050002'],     // Corse 2B See http://xml.insee.fr/schema/nir.html
            ['177025626004544'],
            ['253077507300483'],
            ['188057208107893'],
            ['192077501720490'],
            ['260072000100289'],    // Corse, après le 01/01/1976
            ['260072000100289'],    // Corse, après le 01/01/1976
            ['718610018826448'],    // Etranger en cours d'immatriculation
            ['818610017357342'],    // Etranger en cours d'immatriculation
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['353072B07300483'],
            ['253072C07300483'],
        ];
    }
}
