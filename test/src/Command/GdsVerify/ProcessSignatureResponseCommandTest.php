<?php

namespace Dvsa\OlcsTest\Transfer\Command\GdsVerify;

use Dvsa\Olcs\Transfer\Command\CommandContainer;
use Dvsa\Olcs\Transfer\Command\GdsVerify\ProcessSignatureResponse;
use Dvsa\Olcs\Transfer\Query\QueryContainer;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use Dvsa\OlcsTest\Transfer\DtoTest;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class ProcessSignatureResponseCommandTest
 *
 * @package Dvsa\OlcsTest\Transfer\Command\GdsVerify
 */
class ProcessSignatureResponseCommandTest
{
    use CommandTest;

    /**
     * Should return a new blank DTO on which to run tests
     *
     * @return ArraySerializableInterface
     */
    protected function createBlankDto()
    {
        return new ProcessSignatureResponse([]);
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
            'application',
            'continuationDetail',
            'transportManagerApplication',
            'transportManagerApplicationOperatorSignature'
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
            'application' => ['1', '2', '9999'],
            'continuationId' => ['1', '2', '9999'],
            'transportManagerApplication' => ['1', '2', '9999'],
            'transportManagerApplicationOperatorSignature' => ['Y', 'N']
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
            'application' => ['i'],
            'continuationId' => ['i'],
            'transportManagerApplication' => ['i'],
            'transportManagerApplicationOperatorSignature' => [1, 2]
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
     * This DOES NOT assert that the value gets validated. To do that @see DtoTest::getValidFieldValues
     *
     * @return array
     */
    protected function getFilterTransformations()
    {
        return [
            'samlResponse' => [[' string ', 'string']],
            'transportManagerApplicationOperatorSignature' => [['Y ', ' N']]
        ];
    }
}
