<?php

namespace Dvsa\OlcsTest\Transfer\Query;

use Dvsa\Olcs\Transfer\Query\QueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation\AnnotationBuilder;
use PHPUnit_Framework_Assert;
use ReflectionMethod;

trait QueryTest
{
    /**
     * Should return a new blank QueryInterface DTO on which to run tests
     *
     * @return QueryInterface
     */
    abstract protected function createBlankQuery();

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
    abstract protected function getOptionalQueryFields();

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
     * @return []
     */
    abstract protected function getValidFieldValues();

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
     * @return []
     */
    abstract protected function getInvalidFieldValues();

    /**
     * Should return an array of expected transformations which input filters should apply to fields
     *
     * for example:
     *
     * return [
     *     'fieldWhichGetsTrimmed' => [' string ' => 'string'],
     *     'fieldWhichFiltersOutNonNumeric => ['a1b2c3' => '123'],
     * ];
     *
     * Tests expect the function 'getFoo' to exist for the function 'foo'.
     *
     * This DOES NOT assert that the value gets validated. To do that @see QueryTest::getValidFieldValues
     *
     * @return []
     */
    abstract protected function getFilterTransformations();

    /**
     * @dataProvider provideValidFieldCases
     *
     * @param array  $fieldValues
     * @param string $fieldName
     */
    public function testValidFields(array $fieldValues, $fieldName)
    {
        $query = $this->createPopulatedQuery($fieldValues);
        $this->assertQueryFieldValid($query, $fieldName);
    }

    /**
     * @dataProvider provideInvalidFieldCases
     *
     * @param $fieldName
     * @param $value
     */
    public function testInvalidField($fieldName, $value)
    {
        $fieldValues = [$fieldName => $value];
        $query = $this->createPopulatedQuery($fieldValues);
        $this->assertQueryFieldInvalid($query, $fieldName);
    }

    /**
     * @dataProvider provideFieldTransformationCases
     *
     * @param string $fieldName
     * @param mixed  $inputValue
     * @param mixed  $expectedValue
     */
    public function testFieldTransformations($fieldName, $inputValue, $expectedValue)
    {
        $fieldValues = [$fieldName => $inputValue];
        $query = $this->createPopulatedQuery($fieldValues);
        $this->assertTransformation($query, $fieldName, $inputValue, $expectedValue);
    }

    /**
     * @dataProvider provideGetterCases
     *
     * @param $fieldName
     */
    public function testGetterNames($fieldName)
    {
        PHPUnit_Framework_Assert::assertSame(
            "get" . ucwords($fieldName),
            (new ReflectionMethod($this->createBlankQuery(), "get$fieldName"))->getName(),
            "Getter for $fieldName is named incorrectly name"
        );
    }

    /**
     * @dataProvider provideGetterCases
     *
     * @param $fieldName
     */
    public function testGetters($fieldName)
    {
        $query = $this->createPopulatedQuery([$fieldName => 'DUMMY-VALUE']);

        PHPUnit_Framework_Assert::assertTrue(
            method_exists($query, "get$fieldName"),
            "Getter for $fieldName doesn't exit"
        );

        PHPUnit_Framework_Assert::assertSame(
            'DUMMY-VALUE',
            $query->{"get$fieldName"}(),
            "Getter for $fieldName did not return the correct data"
        );
    }

    /**
     * @dataProvider provideDefaultValueCases
     *
     * @param $fieldName
     */
    public function testDefaultValues($fieldName)
    {
        $query = $this->createBlankQuery();
        $queryContainer = $this->createQueryContainer($query);
        $inputFilter = $queryContainer->getInputFilter();
        $inputFilter->setValidationGroup([$fieldName]);
        $queryContainer->isValid();

        PHPUnit_Framework_Assert::assertNull(
            $inputFilter->getValues()[$fieldName],
            sprintf("Expected %s to be when omitted", $fieldName)
        );
    }

    public function provideDefaultValueCases()
    {
        foreach ($this->getOptionalQueryFields() as $fieldName) {
            yield [$fieldName];
        }
    }

    public function provideGetterCases()
    {
        $fieldNames = array_unique(
            array_merge(
                $this->getOptionalQueryFields(),
                array_keys($this->getValidFieldValues()),
                array_keys($this->getInvalidFieldValues()),
                array_keys($this->getFilterTransformations())
            )
        );
        foreach ($fieldNames as $fieldName) {
            yield [$fieldName];
        }
    }

    public function provideValidFieldCases()
    {
        foreach ($this->getOptionalQueryFields() as $field) {
            yield "$field optional - null" => [[$field => null], $field];
            yield "$field optional - ''" => [[$field => ''], $field];
            yield "$field optional - false" => [[$field => false], $field];
            yield "$field optional - []" => [[$field => []], $field];
            yield "$field optional - unset" => [[], $field];
        }

        foreach ($this->getValidFieldValues() as $fieldName => $validValues) {
            foreach ($validValues as $validValue) {
                yield "$fieldName valid - " . var_export($validValue, true) => [
                    [$fieldName => $validValue],
                    $fieldName
                ];
            }
        }
    }

    public function provideInvalidFieldCases()
    {
        $invalidFieldValues = $this->getInvalidFieldValues();
        foreach ($invalidFieldValues as $fieldName => $invalidValues) {
            foreach ($invalidValues as $invalidValue) {
                yield "$fieldName invalid - " . var_export($invalidValue, true) => [$fieldName, $invalidValue];
            }
        }
    }

    public function provideFieldTransformationCases()
    {
        foreach ($this->getFilterTransformations() as $fieldName => $transformations) {
            foreach ($transformations as $inputValue => $expectedValue) {
                yield [$fieldName, $inputValue, $expectedValue];
            }
        }
    }

    protected function createQueryContainer(QueryInterface $query)
    {
        $annotationBuilder = new AnnotationBuilder();
        return $annotationBuilder->createQuery($query);
    }

    protected function assertQueryFieldValid(QueryInterface $query, $fieldName)
    {
        $queryContainer = $this->createQueryContainer($query);
        $queryContainer->getInputFilter()->setValidationGroup([$fieldName]);
        PHPUnit_Framework_Assert::assertTrue(
            $queryContainer->isValid(),
            sprintf(
                "Data should be valid, but failed with these messages: %s",
                json_encode($queryContainer->getMessages())
            )
        );
    }

    protected function assertQueryFieldInvalid(QueryInterface $query, $fieldName)
    {
        $queryContainer = $this->createQueryContainer($query);
        $inputFilter = $queryContainer->getInputFilter();
        $inputFilter->setValidationGroup([$fieldName]);

        PHPUnit_Framework_Assert::assertFalse($queryContainer->isValid(), "Expected $fieldName to be invalid");

        $actualInvalidFieldNames = array_keys($inputFilter->getInvalidInput());

        PHPUnit_Framework_Assert::assertSame(
            [$fieldName],
            $actualInvalidFieldNames,
            sprintf(
                "Expected a single validation failure on $fieldName, instead recieved the following violations: %s",
                json_encode($actualInvalidFieldNames)
            )
        );
    }

    /**
     * @param $query
     * @param $fieldName
     * @param $inputValue
     * @param $expectedValue
     */
    protected function assertTransformation($query, $fieldName, $inputValue, $expectedValue)
    {
        $queryContainer = $this->createQueryContainer($query);
        $inputFilter = $queryContainer->getInputFilter();
        $inputFilter->setValidationGroup([$fieldName]);
        $queryContainer->isValid();

        $actual = $inputFilter->getValues()[$fieldName];

        PHPUnit_Framework_Assert::assertSame(
            $expectedValue,
            $actual,
            sprintf(
                "Expected %s to be transformed from %s to %s",
                $fieldName,
                var_export($inputValue, true),
                var_export($expectedValue, true)
            )
        );
    }

    protected function createPopulatedQuery($fieldValues)
    {
        $query = $this->createBlankQuery();
        $query->exchangeArray($fieldValues);
        return $query;
    }
}
