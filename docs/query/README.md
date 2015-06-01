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
### <http://olcs-backend/api/organisation/1/business-details>
#### [Dvsa\Olcs\Transfer\Query\Organisation\BusinessDetails](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Query/Organisation/BusinessDetails.php)

##### Extends [DEFAULT ORGANISATION ENTITY VALUES](#http-olcs-backend-api-organisation-1)
```
    ...
    "contactDetails": {
        "address": {
            "addressLine1": "Unit 9",
            "addressLine2": "Shapely Industrial Estate",
            "addressLine3": "Harehills",
            "addressLine4": "",
            "adminArea": null,
            "countryCode": {
                "countryDesc": "United Kingdom",
                "createdBy": null,
                "createdOn": null,
                "id": "GB",
                "irfoPsvAuths": null,
                "isMemberState": "Y",
                "lastModifiedBy": null,
                "lastModifiedOn": null,
                "version": 1
            },
            "createdBy": null,
            "createdOn": "2015-05-29T10:46:43+0100",
            "id": 21,
            "lastModifiedBy": null,
            "lastModifiedOn": "2015-05-29T10:46:43+0100",
            "olbsKey": null,
            "olbsType": null,
            "paonEnd": null,
            "paonStart": null,
            "postcode": "LS9 2FA",
            "saonEnd": null,
            "saonStart": null,
            "town": "Leeds",
            "uprn": null,
            "version": 1,
            "contactDetails": null
        },
        "contactType": {
            "description": "Registered",
            "displayOrder": null,
            "id": "ct_reg",
            "olbsKey": null,
            "parent": null,
            "refDataCategoryId": "contact_type"
        },
        "createdBy": null,
        "createdOn": "2014-11-24T10:30:04+0000",
        "deletedDate": null,
        "description": null,
        "emailAddress": null,
        "fao": null,
        "id": 21,
        "lastModifiedBy": null,
        "lastModifiedOn": "2014-11-24T10:30:04+0000",
        "olbsKey": null,
        "olbsType": null,
        "person": null,
        "version": 1,
        "writtenPermissionToEngage": "N",
        "phoneContacts": null
    }
}
```
---