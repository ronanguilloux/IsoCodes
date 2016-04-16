<?php

namespace IsoCodes\Tests;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
abstract class AbstractIsoCodeInterfaceTest extends AbstractIsoCodeTest
{
    /**
     * @dataProvider getValidValues
     */
    final public function testValidValues($value)
    {
        $class = $this->getIsoCodesClass();
        $this->assertTrue($class::validate($value), 'Value "'.$value.'" should be valid.');
    }

    /**
     * @dataProvider getInvalidValues
     */
    final public function testInvalidValues($value)
    {
        $class = $this->getIsoCodesClass();
        $valueStr = is_array($value) ? implode(', ', $value) : $value;
        $this->assertFalse($class::validate($value), 'Value "'.$valueStr.'" should be invalid.');
    }
}
