<?php

namespace IsoCodes;

/**
 * Class Gsrn for Global Service Relation Number, GS1
 * Used by services organizations to identify their relationships with individual service providers
 * (such as doctors who work for a hospital) and individual service clients
 * (such as the metering points of an electricity company, or the loyalty account members of a retailer.).
 *
 * @link https://en.wikipedia.org/wiki/Global_Service_Relationship_Number
 * @link http://www.gs1.org/global-service-relation-number-gsrn
 * @link http://www.gs1.org/docs/idkeys/GS1_GSRN_Executive_Summary.pdf
 */
class Gsrn extends Gtin implements IsoCodeInterface
{
    /**
     * @param mixed $gsrn
     *
     * @return bool
     */
    public static function validate($gsrn)
    {
        return parent::check($gsrn, 18);
    }
}
