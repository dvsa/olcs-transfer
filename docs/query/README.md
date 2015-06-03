### <http://olcs-backend/api/application/1>
#### [Dvsa\Olcs\Transfer\Query\Application\Application](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Application/Application.php)
```
{
    "administration": null,
    "bankrupt": null,
    "convictionsConfirmation": "N",
    "createdOn": "2015-05-21T14:19:52+0100",
    "declarationConfirmation": "N",
    "deletedDate": null,
    "disqualified": null,
    "financialEvidenceUploaded": null,
    "grantedDate": null,
    "hasEnteredReg": null,
    "id": 1,
    "insolvencyConfirmation": "N",
    "insolvencyDetails": null,
    "interimAuthTrailers": 20,
    "interimAuthVehicles": 10,
    "interimEnd": "2015-01-01",
    "interimReason": "Interim reason",
    "interimStart": "2014-01-01",
    "isMaintenanceSuitable": null,
    "isVariation": false,
    "lastModifiedOn": null,
    "liquidation": null,
    "niFlag": "N",
    "overrideOoo": "N",
    "prevBeenAtPi": null,
    "prevBeenDisqualifiedTc": null,
    "prevBeenRefused": null,
    "prevBeenRevoked": null,
    "prevConviction": null,
    "prevHadLicence": null,
    "prevHasLicence": null,
    "prevPurchasedAssets": null,
    "psvLimousines": null,
    "psvMediumVhlConfirmation": null,
    "psvMediumVhlNotes": null,
    "psvNoLimousineConfirmation": null,
    "psvNoSmallVhlConfirmation": null,
    "psvOnlyLimousinesConfirmation": null,
    "psvOperateSmallVhl": null,
    "psvSmallVhlConfirmation": null,
    "psvSmallVhlNotes": null,
    "receivedDate": "2010-12-15T10:48:00+0000",
    "receivership": null,
    "refusedDate": null,
    "safetyConfirmation": "N",
    "targetCompletionDate": null,
    "totAuthLargeVehicles": null,
    "totAuthMediumVehicles": null,
    "totAuthSmallVehicles": null,
    "totAuthTrailers": null,
    "totAuthVehicles": null,
    "totCommunityLicences": null,
    "version": 1,
    "withdrawnDate": null,
    "goodsOrPsv": {
        "description": "Goods Vehicle",
        "displayOrder": null,
        "id": "lcat_gv",
        "olbsKey": "GV",
        "refDataCategoryId": "lic_cat"
    },
    "interimStatus": {
        "description": "Requested",
        "displayOrder": null,
        "id": "int_sts_requested",
        "olbsKey": "Saved",
        "refDataCategoryId": "interim_status"
    },
    "licenceType": {
        "description": "Standard International",
        "displayOrder": null,
        "id": "ltyp_si",
        "olbsKey": "SI",
        "refDataCategoryId": "lic_type"
    },
    "status": {
        "description": "Not Yet Submitted",
        "displayOrder": null,
        "id": "apsts_not_submitted",
        "olbsKey": null,
        "refDataCategoryId": "app_status"
    },
    "withdrawnReason": null
}
```
---
### <http://olcs-backend/api/organisation/1>
#### [Dvsa\Olcs\Transfer\Query\Organisation\Organisation](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Organisation/Organisation.php)
```
{
    "allowEmail": "Y",
    "companyCertSeen": "N",
    "companyOrLlpNo": "12345678",
    "createdOn": "2015-05-21T14:19:52+0100",
    "id": 1,
    "irfoName": null,
    "irfoNationality": null,
    "isIrfo": "N",
    "isMlh": "N",
    "lastModifiedOn": "2015-05-21T14:56:56+0100",
    "name": "John Smith Haulage Ltd.",
    "version": 2,
    "viAction": null,
    "natureOfBusinesses": [
        {
            "description": "Growing of rice",
            "displayOrder": null,
            "id": "01120",
            "olbsKey": null,
            "refDataCategoryId": "SIC_CODE"
        }
    ],
    "type": {
        "description": "Limited Company",
        "displayOrder": 1,
        "id": "org_t_rc",
        "olbsKey": "RC",
        "refDataCategoryId": "org_type"
    },
    "hasInforceLicences": true
}
```
---
### <http://olcs-backend/api/cases/24/pi>
#### [Dvsa\Olcs\Transfer\Query\Cases\Pi](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Cases/Pi.php)
```
{
    "annualTestHistory": "Annual test history for case 24",
    "closedDate": null,
    "convictionNote": "test comments",
    "createdOn": "2013-11-12T12:27:33+0000",
    "deletedDate": null,
    "description": "Case for convictions against company\n  directors",
    "ecmsNo": "E123456",
    "erruOriginatingAuthority": null,
    "erruTransportUndertakingName": null,
    "erruVrm": null,
    "id": 24,
    "isImpounding": "N",
    "lastModifiedOn": null,
    "olbsKey": null,
    "olbsType": null,
    "openDate": "2012-03-21T00:00:00+0000",
    "penaltiesNote": null,
    "prohibitionNote": "prohibition test notes",
    "version": 1,
    "caseType": {
        "description": "Licence",
        "displayOrder": 3,
        "id": "case_t_lic",
        "olbsKey": null,
        "refDataCategoryId": "case_type"
    },
    "categorys": [],
    "erruCaseType": null,
    "outcomes": [],
    "pi": {
        "agreedDate": "2014-11-24",
        "briefToTcDate": null,
        "callUpLetterDate": null,
        "closedDate": null,
        "comment": "Test Pi",
        "createdOn": "2014-11-24T10:06:49+0000",
        "decSentAfterWrittenDecDate": null,
        "decisionDate": null,
        "decisionLetterSentDate": null,
        "decisionNotes": "S13 - Consideration of new application under Section 13",
        "deletedDate": null,
        "id": 1,
        "isCancelled": "N",
        "lastModifiedOn": "2014-12-11T10:49:57+0000",
        "licenceCurtailedAtPi": "N",
        "licenceRevokedAtPi": "N",
        "licenceSuspendedAtPi": "N",
        "notificationDate": null,
        "olbsKey": null,
        "olbsType": null,
        "sectionCodeText": null,
        "tcWrittenDecisionDate": null,
        "tcWrittenReasonDate": null,
        "version": 2,
        "witnesses": 0,
        "writtenReasonDate": null,
        "writtenReasonLetterDate": null,
        "agreedByTcRole": {
            "description": "Deputy Traffic Commissioner",
            "displayOrder": null,
            "id": "tc_r_dtc",
            "olbsKey": "DTC",
            "refDataCategoryId": "tc_role"
        },
        "decidedByTcRole": {
            "description": "Deputy Head of Traffic Regulation Unit",
            "displayOrder": null,
            "id": "tc_r_dhtru",
            "olbsKey": "DHTRU",
            "refDataCategoryId": "tc_role"
        },
        "piStatus": {
            "description": "PI Registered",
            "displayOrder": 2,
            "id": "pi_s_reg",
            "olbsKey": "RegisterPI",
            "refDataCategoryId": "pi_status"
        },
        "piTypes": [],
        "writtenOutcome": null,
        "agreedByTc": {
            "deleted": "N",
            "id": 2,
            "name": "Presiding TC Name 2"
        },
        "assignedTo": null,
        "decidedByTc": {
            "deleted": "N",
            "id": 2,
            "name": "Presiding TC Name 2"
        },
        "reasons": [],
        "decisions": [
            {
                "createdOn": null,
                "description": "Suspend Community Authorisation",
                "id": 65,
                "isNi": false,
                "isReadOnly": true,
                "lastModifiedOn": null,
                "sectionCode": "Art. 8(3)",
                "version": 1
            }
        ],
        "piHearings": [
            {
                "adjournedDate": "2014-03-16T11:30:00+0000",
                "adjournedReason": "adjourned reason",
                "cancelledDate": null,
                "cancelledReason": null,
                "createdOn": "2014-11-24T10:22:24+0000",
                "details": "S23 - Consider attaching...",
                "hearingDate": "2014-03-16T14:30:00+0000",
                "id": 1,
                "isAdjourned": "Y",
                "isCancelled": "N",
                "lastModifiedOn": null,
                "olbsKey": null,
                "olbsType": null,
                "piVenueOther": null,
                "presidingTcOther": null,
                "version": 1,
                "witnesses": 9
            },
            {
                "adjournedDate": null,
                "adjournedReason": null,
                "cancelledDate": null,
                "cancelledReason": null,
                "createdOn": "2014-11-24T10:22:24+0000",
                "details": "S23 - Consider attaching...",
                "hearingDate": "2014-04-05T14:30:00+0100",
                "id": 2,
                "isAdjourned": "N",
                "isCancelled": "N",
                "lastModifiedOn": null,
                "olbsKey": null,
                "olbsType": null,
                "piVenueOther": null,
                "presidingTcOther": null,
                "version": 1,
                "witnesses": 9
            }
        ],
        "hearingDate": "2014-04-05T14:30:00+0100",
        "callUpLetterDateTarget": "2014-03-01",
        "briefToTcDateTarget": "2014-03-22",
        "decisionLetterSentDateTarget": "2014-04-14",
        "tcWrittenDecisionDateTarget": "2014-05-08",
        "tcWrittenReasonDateTarget": "2014-04-14",
        "writtenReasonLetterDateTarget": "",
        "decSentAfterWrittenDecDateTarget": "2014-04-09"
    }
}
```
---
### <http://olcs-backend/api/licence/7>
#### [Dvsa\Olcs\Transfer\Query\Licence\Licence](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Licence/Licence.php)
```
{
    "cnsDate": null,
    "correspondenceCd": null,
    "createdBy": null,
    "createdOn": "2015-05-27T09:23:46+0100",
    "curtailedDate": null,
    "deletedDate": null,
    "enforcementArea": null,
    "establishmentCd": null,
    "expiryDate": "2016-01-01",
    "fabsReference": "",
    "feeDate": null,
    "goodsOrPsv": {
        "description": "Goods Vehicle",
        "displayOrder": null,
        "id": "lcat_gv",
        "olbsKey": "GV",
        "parent": null,
        "refDataCategoryId": "lic_cat"
    },
    "grantedDate": null,
    "id": 7,
    "inForceDate": "2010-01-12",
    "isMaintenanceSuitable": null,
    "lastModifiedBy": null,
    "lastModifiedOn": "2015-05-27T09:23:46+0100",
    "licNo": "OB1234567",
    "licenceType": {
        "description": "Standard International",
        "displayOrder": null,
        "id": "ltyp_si",
        "olbsKey": "SI",
        "parent": null,
        "refDataCategoryId": "lic_type"
    },
    "niFlag": "N",
    "olbsKey": null,
    "organisation": null,
    "psvDiscsToBePrintedNo": null,
    "reviewDate": "2010-01-12",
    "revokedDate": null,
    "safetyIns": "N",
    "safetyInsTrailers": null,
    "safetyInsVaries": null,
    "safetyInsVehicles": null,
    "status": {
        "description": "Valid",
        "displayOrder": null,
        "id": "lsts_valid",
        "olbsKey": "Valid",
        "parent": null,
        "refDataCategoryId": "lic_status"
    },
    "surrenderedDate": "2010-01-12T00:00:00+0000",
    "suspendedDate": null,
    "tachographIns": null,
    "tachographInsName": null,
    "totAuthLargeVehicles": null,
    "totAuthMediumVehicles": null,
    "totAuthSmallVehicles": null,
    "totAuthTrailers": 4,
    "totAuthVehicles": 12,
    "totCommunityLicences": null,
    "trafficArea": null,
    "trailersInPossession": null,
    "translateToWelsh": "N",
    "transportConsultantCd": null,
    "version": 1,
    "viAction": null,
    "applications": null,
    "cases": null,
    "changeOfEntitys": null,
    "communityLics": null,
    "companySubsidiaries": null,
    "conditionUndertakings": null,
    "documents": null,
    "fees": null,
    "operatingCentres": null,
    "licenceStatusRules": null,
    "licenceVehicles": null,
    "privateHireLicences": null,
    "psvDiscs": null,
    "publicationLinks": null,
    "tradingNames": null,
    "tmLicences": null,
    "workshops": null
}
```
---
### <http://olcs-backend/api/licence/7/type-of-licence>
#### [Dvsa\Olcs\Transfer\Query\Licence\TypeOfLicence](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Licence/TypeOfLicence.php)

##### Includes [DEFAULT LICENCE ENTITY VALUES](#http-olcs-backend-api-licence-7)

```
    ...
    "canBecomeSpecialRestricted": false,
    "canUpdateLicenceType": false,
    "doesChangeRequireVariation": false
}
```
---
### <http://olcs-backend/api/variation/9>
#### [Dvsa\Olcs\Transfer\Query\Variation\Variation](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Variation/Variation.php)
##### You can also use the application endpoint to retrieve this data

##### Same as [DEFAULT APPLICATION ENTITY VALUES](#http-olcs-backend-api-application-1)

---
### <http://olcs-backend/api/variation/9/type-of-licence>
#### [Dvsa\Olcs\Transfer\Query\Variation\TypeOfLicence](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Variation/TypeOfLicence.php)

##### Includes [DEFAULT VARIATION ENTITY VALUES](#http-olcs-backend-api-variation-9)

```
    ...
    "canBecomeSpecialRestricted": false,
    "canUpdateLicenceType": true,
    "currentLicenceType": "ltyp_si"
}
```
---
### <http://olcs-backend/api/cases/24/legacy-offence>
#### [Dvsa\Olcs\Transfer\Query\Cases\LegacyOffenceList](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Cases/LegacyOffenceList.php)
```
{
    "count":1,
    "results":
    {
        "0":
        {
            "createdOn":"2015-05-28T10:53:34+0100",
            "definition":"Some Definition",
            "id":1,
            "isTrailer":"Y",
            "lastModifiedOn":"2015-05-28T10:53:34+0100",
            "notes":"Some Notes for Offence (case 24)",
            "numOfOffences":1,
            "offenceAuthority":"Authority 1",
            "offenceDate":"2014-09-26",
            "offenceToDate":"2015-09-26",
            "offenceType":"Some Offence Type",
            "offenderName":"Ronnie Biggs",
            "points":3,
            "position":"Some Position",
            "version":1,
            "vrm":"VRM12"
        }
    }
}
```
---
### <http://olcs-backend/api/cases/24/legacy-offence/1>
#### [Dvsa\Olcs\Transfer\Query\Cases\LegacyOffence](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Cases/LegacyOffence.php)
```
{
    "case": {
        "annualTestHistory": "Annual test history for case 24",
        "application": null,
        "caseType": null,
        "categorys": null,
        "closedDate": null,
        "convictionNote": "test comments",
        "createdBy": null,
        "createdOn": "2013-11-12T12:27:33+0000",
        "deletedDate": null,
        "description": "Case for convictions against company\n  directors",
        "ecmsNo": "E123456",
        "erruCaseType": null,
        "erruOriginatingAuthority": null,
        "erruTransportUndertakingName": null,
        "erruVrm": null,
        "id": 24,
        "isImpounding": "N",
        "lastModifiedBy": null,
        "lastModifiedOn": null,
        "licence": null,
        "olbsKey": null,
        "olbsType": null,
        "openDate": "2012-03-21T00:00:00+0000",
        "outcomes": null,
        "penaltiesNote": null,
        "prohibitionNote": "prohibition test notes",
        "transportManager": null,
        "version": 1,
        "appeals": null,
        "complaints": null,
        "conditionUndertakings": null,
        "convictions": null,
        "documents": null,
        "legacyOffences": null,
        "oppositions": null,
        "publicInquirys": null,
        "prohibitions": null,
        "seriousInfringements": null,
        "statements": null,
        "stays": null,
        "tmDecisions": null
    },
    "createdBy": {
        "accountDisabled": "N",
        "attempts": null,
        "contactDetails": null,
        "createdBy": null,
        "createdOn": "2013-11-27T00:00:00+0000",
        "deletedDate": null,
        "departmentName": null,
        "divisionGroup": null,
        "emailAddress": "terry.valtech@gmail.com",
        "hintAnswer1": null,
        "hintAnswer2": null,
        "hintQuestion1": null,
        "hintQuestion2": null,
        "id": 1,
        "jobTitle": null,
        "lastModifiedBy": null,
        "lastModifiedOn": "2013-11-27T00:00:00+0000",
        "lastSuccessfulLoginDate": "2013-01-26T09:00:00+0000",
        "localAuthority": null,
        "lockedDate": null,
        "loginId": "loggedinuser",
        "memorableWord": null,
        "memorableWordDigit1": null,
        "memorableWordDigit2": null,
        "mustResetPassword": "N",
        "organisation": null,
        "partnerContactDetails": null,
        "passwordExpiryDate": null,
        "passwordReminderSent": null,
        "pid": null,
        "resetPasswordExpiryDate": null,
        "team": null,
        "transportManager": null,
        "version": 1,
        "organisationUsers": null,
        "userRoles": null
    },
    "createdOn": "2015-05-28T10:53:34+0100",
    "definition": "Some Definition",
    "id": 1,
    "isTrailer": "Y",
    "lastModifiedBy": {
        "accountDisabled": "N",
        "attempts": null,
        "contactDetails": null,
        "createdBy": null,
        "createdOn": "2013-11-27T00:00:00+0000",
        "deletedDate": null,
        "departmentName": null,
        "divisionGroup": null,
        "emailAddress": "terry.valtech@gmail.com",
        "hintAnswer1": null,
        "hintAnswer2": null,
        "hintQuestion1": null,
        "hintQuestion2": null,
        "id": 1,
        "jobTitle": null,
        "lastModifiedBy": null,
        "lastModifiedOn": "2013-11-27T00:00:00+0000",
        "lastSuccessfulLoginDate": "2013-01-26T09:00:00+0000",
        "localAuthority": null,
        "lockedDate": null,
        "loginId": "loggedinuser",
        "memorableWord": null,
        "memorableWordDigit1": null,
        "memorableWordDigit2": null,
        "mustResetPassword": "N",
        "organisation": null,
        "partnerContactDetails": null,
        "passwordExpiryDate": null,
        "passwordReminderSent": null,
        "pid": null,
        "resetPasswordExpiryDate": null,
        "team": null,
        "transportManager": null,
        "version": 1,
        "organisationUsers": null,
        "userRoles": null
    },
    "lastModifiedOn": "2015-05-28T10:53:34+0100",
    "notes": "Some Notes for Offence (case 24)",
    "numOfOffences": 1,
    "offenceAuthority": "Authority 1",
    "offenceDate": "2014-09-26",
    "offenceToDate": "2015-09-26",
    "offenceType": "Some Offence Type",
    "offenderName": "Ronnie Biggs",
    "points": 3,
    "position": "Some Position",
    "version": 1,
    "vrm": "VRM12"
}
```
---
### <http://olcs-backend/api/trailers?licence=1>
#### [Dvsa\Olcs\Transfer\Query\Trailer\Trailers](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Trailer/Trailers.php)
```
{
    "count": 2,
    "results": [
        {
            "createdOn": "2015-01-01T00:00:00+0000",
            "deletedDate": null,
            "id": 3,
            "lastModifiedOn": "2015-03-02T00:00:00+0000",
            "olbsKey": null,
            "specifiedDate": "2015-03-02T00:00:00+0000",
            "trailerNo": "C0300",
            "version": 1
        },
        {
            "createdOn": "2015-01-01T00:00:00+0000",
            "deletedDate": null,
            "id": 4,
            "lastModifiedOn": "2015-04-01T00:00:00+0100",
            "olbsKey": null,
            "specifiedDate": "2015-04-01T00:00:00+0100",
            "trailerNo": "D4000",
            "version": 1
        }
    ]
}
```
---
### <http://olcs-backend/api/irfo/gv-permit/1>
#### [Dvsa\Olcs\Transfer\Query\Irfo\IrfoGvPermit](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Irfo/IrfoGvPermit.php)
```
{
    "createdBy": null,
    "createdOn": "2015-06-01T10:23:06+0100",
    "exemptionDetails": "testing",
    "expiryDate": null,
    "id": 1,
    "inForceDate": "2016-03-10",
    "irfoFeeId": null,
    "irfoGvPermitType":
    {
        "createdBy": null,
        "createdOn": null,
        "description": "ECMT 75% (Apr to Jun)",
        "id": 2,
        "irfoCountry": null,
        "lastModifiedBy": null,
        "lastModifiedOn": null,
        "version": 1
    },
    "irfoPermitStatus":
    {
        "description": "Refused",
        "displayOrder": null,
        "id": "irfo_perm_s_refused",
        "olbsKey": "Refused",
        "parent": null,
        "refDataCategoryId": "irfo_permit_status"
    },
    "isFeeExempt": "Y",
    "lastModifiedBy": null,
    "lastModifiedOn": "2015-06-02T14:27:10+0100",
    "noOfCopies": 10,
    "note": null,
    "olbsKey": null,
    "organisation": null,
    "permitPrinted": "N",
    "version": 6,
    "withdrawnReason": null,
    "yearRequired": 2010
}
```
---
### <http://olcs-backend/api/irfo/gv-permit?organisation=101&page=1&limit=1&sort=id&order=asc>
#### [Dvsa\Olcs\Transfer\Query\Irfo\IrfoGvPermitList](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Irfo/IrfoGvPermitList.php)
```
{
    "count": 2,
    "results":
    {
        "0":
        {
            "createdOn": "2015-06-01T10:23:06+0100",
            "exemptionDetails": "testing",
            "expiryDate": null,
            "id": 1,
            "inForceDate": "2016-03-10",
            "irfoFeeId": null,
            "isFeeExempt": "Y",
            "lastModifiedOn": "2015-06-02T14:27:10+0100",
            "noOfCopies": 10,
            "note": null,
            "olbsKey": null,
            "permitPrinted": "N",
            "version": 6,
            "yearRequired": 2010,
            "irfoPermitStatus":
            {
                "description": "Refused",
                "displayOrder": null,
                "id": "irfo_perm_s_refused",
                "olbsKey": "Refused",
                "refDataCategoryId": "irfo_permit_status"
            },
            "withdrawnReason": null,
            "irfoGvPermitType":
            {
                "createdOn": null,
                "description": "ECMT 75% (Apr to Jun)",
                "id": 2,
                "lastModifiedOn": null,
                "version": 1
            }
        }
    }
}
```
---
### <http://olcs-backend/api/cases/24/impoundings/?page=1&sort=id&order=ASC&limit=10>
#### [Dvsa\Olcs\Transfer\Query\Cases\ImpoundingList](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Cases/ImpoundingList.php)
```
{
    "count": 1,
    "results": {
        "0": {
            "applicationReceiptDate": "2014-06-09T11:15:00+0100",
            "closeDate": "2015-05-28T10:53:34+0100",
            "createdOn": "2015-05-28T10:53:34+0100",
            "hearingDate": "2014-06-10T15:45:00+0100",
            "id": 17,
            "lastModifiedOn": "2015-05-28T10:53:34+0100",
            "notes": "Some notes - db default",
            "outcomeSentDate": "2014-06-11T14:30:00+0100",
            "piVenueOther": null,
            "version": 1,
            "vrm": null,
            "impoundingLegislationTypes": [
                {
                    "description": "Section A At the time the vehicle was detained, the person using the vehicle held a valid licence (whether or not authorising the use of the vehicle);",
                    "displayOrder": null,
                    "id": "imlgis_type_goods_ni1",
                    "olbsKey": null,
                    "refDataCategoryId": "impound_legislation_goods_ni"
                },
                {
                    "description": "Section B At the time the vehicle was detained, the vehicle was not being, and had not been, used in contravention of section 1 of the 2010 Act;",
                    "displayOrder": null,
                    "id": "imlgis_type_goods_ni2",
                    "olbsKey": null,
                    "refDataCategoryId": "impound_legislation_goods_ni"
                }
            ],
            "impoundingType": {
                "description": "Hearing",
                "displayOrder": null,
                "id": "impt_hearing",
                "olbsKey": null,
                "refDataCategoryId": "impound_type"
            },
            "outcome": {
                "description": "Vehicle Returned",
                "displayOrder": null,
                "id": "impo_returned",
                "olbsKey": null,
                "refDataCategoryId": "impound_outcome"
            },
            "presidingTc": {
                "deleted": "N",
                "id": 1,
                "name": "Presiding TC Name 1"
            }
        }
    }
}
```
---
### <http://olcs-backend/api/cases/24/impoundings/17>
#### [Dvsa\Olcs\Transfer\Query\Cases\Impounding](https://gitlab.inf.mgt
.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Cases/Impounding.php)
```
{
    "applicationReceiptDate": "2014-06-09T11:15:00+0100",
    "case": {
        "annualTestHistory": "Annual test history for case 24",
        "application": null,
        "caseType": null,
        "categorys": null,
        "closedDate": null,
        "convictionNote": "test comments",
        "createdBy": null,
        "createdOn": "2013-11-12T12:27:33+0000",
        "deletedDate": null,
        "description": "Case for convictions against company\n  directors",
        "ecmsNo": "E123456",
        "erruCaseType": null,
        "erruOriginatingAuthority": null,
        "erruTransportUndertakingName": null,
        "erruVrm": null,
        "id": 24,
        "isImpounding": "N",
        "lastModifiedBy": null,
        "lastModifiedOn": null,
        "licence": null,
        "olbsKey": null,
        "olbsType": null,
        "openDate": "2012-03-21T00:00:00+0000",
        "outcomes": null,
        "penaltiesNote": null,
        "prohibitionNote": "prohibition test notes",
        "transportManager": null,
        "version": 1,
        "appeals": null,
        "complaints": null,
        "conditionUndertakings": null,
        "convictions": null,
        "documents": null,
        "legacyOffences": null,
        "oppositions": null,
        "publicInquirys": null,
        "prohibitions": null,
        "seriousInfringements": null,
        "statements": null,
        "stays": null,
        "tmDecisions": null
    },
    "closeDate": "2015-05-28T10:53:34+0100",
    "createdBy": null,
    "createdOn": "2015-05-28T10:53:34+0100",
    "hearingDate": "2014-06-10T15:45:00+0100",
    "id": 17,
    "impoundingLegislationTypes": [
        {
            "description": "Section A At the time the vehicle was detained, the person using the vehicle held a valid licence (whether or not authorising the use of the vehicle);",
            "displayOrder": null,
            "id": "imlgis_type_goods_ni1",
            "olbsKey": null,
            "parent": null,
            "refDataCategoryId": "impound_legislation_goods_ni"
        },
        {
            "description": "Section A At the time the vehicle was detained, the person using the vehicle held a valid licence (whether or not authorising the use of the vehicle);",
            "displayOrder": null,
            "id": "imlgis_type_goods_ni1",
            "olbsKey": null,
            "parent": null,
            "refDataCategoryId": "impound_legislation_goods_ni"
        }
    ],
    "impoundingType": {
        "description": "Hearing",
        "displayOrder": null,
        "id": "impt_hearing",
        "olbsKey": null,
        "parent": null,
        "refDataCategoryId": "impound_type"
    },
    "lastModifiedBy": null,
    "lastModifiedOn": "2015-05-28T10:53:34+0100",
    "notes": "Some notes - db default",
    "outcome": {
        "description": "Vehicle Returned",
        "displayOrder": null,
        "id": "impo_returned",
        "olbsKey": null,
        "parent": null,
        "refDataCategoryId": "impound_outcome"
    },
    "outcomeSentDate": "2014-06-11T14:30:00+0100",
    "piVenue": {
        "address": null,
        "createdBy": null,
        "createdOn": null,
        "endDate": null,
        "id": 3,
        "lastModifiedBy": null,
        "lastModifiedOn": null,
        "name": "venue_3",
        "olbsKey": null,
        "startDate": null,
        "trafficArea": null,
        "version": 1
    },
    "piVenueOther": null,
    "presidingTc": {
        "deleted": "N",
        "id": 1,
        "name": "Presiding TC Name 1"
    },
    "version": 1,
    "vrm": null
}
```
---
