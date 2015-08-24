<?php

/**
 * SubmissionSection Validator
 *
 * @author Shaun Lizzio <shaun@lizzio.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Validators;

/**
 * SubmissionSection Validator
 *
 * @author Shaun Lizzio <shaun@lizzio.co.uk>
 */
class SubmissionSection extends \Zend\Validator\AbstractValidator
{
    const NOT_ARRAY = 'notArray';
    const NOT_IN_ARRAY = 'notInArray';

    protected $messageTemplates = array(
        self::NOT_ARRAY => 'The sections input must be an array of valid sections',
        self::NOT_IN_ARRAY => 'The input contains an invalid section',
    );

    protected $haystack = ['introduction', 'case-summary', 'case-outline', 'most-serious-infringement',
        'outstanding-applications', 'people', 'operating-centres', 'conditions-and-undertakings',
        'intelligence-unit-check', 'interim', 'advertisement', 'linked-licences-app-numbers', 'lead-tc-area',
        'current-submissions', 'auth-requested-applied-for', 'transport-managers', 'continuous-effective-control',
        'fitness-and-repute', 'previous-history', 'bus-reg-app-details', 'transport-authority-comments',
        'total-bus-registrations', 'local-licence-history', 'linked-mlh-history', 'registration-details',
        'maintenance-tachographs-hours', 'prohibition-history', 'conviction-fpn-offence-history',
        'annual-test-history', 'penalties', 'statements', 'other-issues', 'te-reports', 'site-plans',
        'planning-permission', 'applicants-comments',
        'visibility-access-egress-size', 'compliance-complaints', 'environmental-complaints', 'oppositions',
        'financial-information', 'maps', 'waive-fee-late-fee', 'surrender', 'annex', 'tm-details', 'tm-qualifications',
        'tm-responsibilities', 'tm-other-employment', 'tm-previous-history'
    ];


    public function isValid($value)
    {
        if (!is_array($value)) {
            $this->error(self::NOT_ARRAY);
            return false;
        }

        foreach ($value as $submissionSection) {
            if (!in_array(trim(strtolower($submissionSection)), $this->haystack)) {
                $this->error(self::NOT_IN_ARRAY);
                return false;
            }
        }

        return true;
    }
}
