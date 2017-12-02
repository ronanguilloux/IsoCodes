<?php

namespace IsoCodes\Tests;

use PHPUnit\Framework\TestCase;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
abstract class AbstractIsoCodeTest extends TestCase
{
    /**
     * @return array[]
     */
    abstract public function getValidValues();

    /**
     * @return array[]
     */
    abstract public function getInvalidValues();

    final public function testEmptyValues()
    {
        $class = $this->getIsoCodesClass();
        foreach ($this->getEmptyValues() as $value) {
            $this->assertFalse($class::validate($value), 'Empty value should be invalid.');
        }
    }

    /**
     * @return array
     */
    final protected function getEmptyValues()
    {
        return [
            '',
            ' ',
            '  ',
            null,
        ];
    }

    final protected function getIsoCodesClass()
    {
        $testClassTab = explode('\\', get_class($this));

        return 'IsoCodes\\'.str_replace('Test', '', end($testClassTab));
    }
}
