<?php

namespace Dvsa\OlcsTest\Transfer\Query\Licence;

use Dvsa\Olcs\Transfer\Query\Licence\Vehicles;
use Dvsa\OlcsTest\Transfer\Query\QueryTest;
use PHPUnit\Framework\TestCase;
use Zend\Stdlib\ArraySerializableInterface;

class VehiclesTest extends TestCase
{
    use QueryTest;

    /**
     * Should return a new blank DTO on which to run tests
     *
     * @return ArraySerializableInterface
     */
    protected function createBlankDto()
    {
        return new Vehicles();
    }

    /**
     * Should return a list of optional fields
     *
     * for example:
     *
     * return ['optionalField', 'anotherOptionalField']
     *
     * Each field is expected to be set to null after validation
     *
     * @return string[]
     */
    protected function getOptionalDtoFields()
    {
        return [
            'vrm',
            'disc'
        ];
    }

    /**
     * Should return an array of valid field values (i.e. those which should pass validation)
     *
     * for example:
     *
     * return [
     *     'fieldName' => [
     *         'good-value-1',
     *         'good-value-2',
     *     ],
     *     'anotherFieldName' => ['good-value'],
     * ];
     *
     * @return array
     */
    protected function getValidFieldValues()
    {
        return [
            'id' => [
                '1'
            ],
            'disc' => [
                'Y', 'N'
            ]
        ];
    }

    /**
     * Should return an array of invalid field values (i.e. those which should fail validation)
     *
     * for example:
     *
     * return [
     *     'fieldName' => [
     *         'bad-value-1',
     *         'bad-value-2',
     *     ],
     *     'anotherFieldName' => ['bad-value'],
     * ];
     *
     * @return array
     */
    protected function getInvalidFieldValues()
    {
        return [
            'id' => [
                0
            ],
            'disc' => [
                ['a'],
                'a',
                1,
                true
            ]
        ];
    }

    /**
     * Should return an array of expected transformations which input filters should apply to fields
     *
     * for example:
     *
     * return [
     *     'fieldWhichGetsTrimmed' => [[' string ', 'string']],
     *     'fieldWhichFiltersOutNonNumericDigits => [
     *         ['a1b2c3', '123'],
     *         [99, '99'],
     *     ],
     * ];
     *
     * Tests expect the function 'getFoo' to exist for the function 'foo'.
     *
     * This DOES NOT assert that the value gets validated. To do that @return array
     * @see DtoTest::getValidFieldValues
     *
     */
    protected function getFilterTransformations()
    {
        return [
            'id' => [
                [99, '99']
            ],
            'includeRemoved' => [
                [1, true],
                [0, false],
                [-1, true],
                ['true', true],
                ['', false],
            ],
            'vrm' => [
                ['a', 'a'],
                [' a', 'a'],
                ['a ', 'a'],
                [' a ', 'a'],
            ],
            'disc' => [
                ['a', 'a'],
                [' a', 'a'],
                ['a ', 'a'],
                [' a ', 'a'],
            ]
        ];
    }
}
