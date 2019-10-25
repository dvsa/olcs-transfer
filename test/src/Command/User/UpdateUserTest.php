<?php

namespace Dvsa\OlcsTest\Transfer\Command\User;

use Dvsa\Olcs\Transfer\Command\User\UpdateUser;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use PHPUnit\Framework\TestCase;
use Zend\Stdlib\ArraySerializableInterface;

class UpdateUserTest extends TestCase
{
    use CommandTest;

    /**
     * Should return a new blank DTO on which to run tests
     *
     * @return ArraySerializableInterface
     */
    protected function createBlankDto()
    {
        return new UpdateUser();
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
            'translateToWelsh',
            'team',
            'application',
            'transportManager',
            'localAuthority',
            'partnerContactDetails',
            'accountDisabled',
            'resetPassword',
            'osType'
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
            'id' => ['111'],
            'version' => ['1'],
            'loginId' => ['login_id'],
            'resetPassword' => ['email'],
            'osType' => ['windows_7'],
            'userType' => ["partner"],
            'application' => ['1'],
            'transportManager' => ['2'],
            'localAuthority' => ['9'],
            'partnerContactDetails' => ['1'],
            'accountDisabled' => ['Y'],
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
            'id' => [['invalid-value']],
            'version' => [['invalid-value']],
            'loginId' => ['l'],
            'resetPassword' => ['emailz'],
            'osType' => ['windows_71', 'windows_101'],
            'userType' => ["partnerasd"],
            'application' => [['invalid-value']],
            'transportManager' => [['asdasd']],
            'localAuthority' => [['asfsad']],
            'partnerContactDetails' => [[-11]],
            'accountDisabled' => [10],
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
     *
     * @see DtoTest::getValidFieldValues
     *
     */
    protected function getFilterTransformations()
    {
        return [
            'id' => [[1, '1']],
            'version' => [[2, '2']],
            'loginId' => [['local-authority ', 'local-authority']],
            'resetPassword' => [['email ', 'email']],
            'osType' => [['windows_71 ', 'windows_71']],
            'userType' => [['partner ', 'partner']],
            'application' => [[54, '54']],
            'transportManager' => [[7, '7']],
            'localAuthority' => [[11, '11']],
            'partnerContactDetails' => [[12, '12']],
            'accountDisabled' => [[10, '10']],
        ];
    }
}
