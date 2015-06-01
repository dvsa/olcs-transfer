<?php

/**
 * Type Of Licence
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/application/single/type-of-licence")
 * @Transfer\Method("PUT")
 */
final class UpdateBusinessDetails extends AbstractCommand
{

//'name' => $data['data']['name'],
//'tradingNames' => isset($tradingNames['trading_name']) ? $tradingNames['trading_name'] : [],
//'natureOfBusinesses' => $data['data']['natureOfBusinesses'],
//'companyOrLlpNo' => isset($data['data']['companyNumber']['company_number'])
//? $data['data']['companyNumber']['company_number'] : null,
//'registeredAddress' => isset($data['registeredAddress']) ? $data['registeredAddress'] : null

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1}})
     */
    protected $name;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayValidator({"name":"Zend\Validator\NotEmpty"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1}})
     */
    protected $tradingNames;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayValidator({"name":"Zend\Validator\NotEmpty"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $natureOfBusinesses;

    protected $companyOrLlpNo;

    protected $registeredAddress;
}
