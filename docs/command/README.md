| Command | Request | Description / Possible side effects |
|---------|---------|-------------------------------------|
| [Dvsa\Olcs\Transfer\Command\Application\CreateApplication](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Command/Application/CreateApplication.php) | **POST** <http://olcs-backend/api/application/> | Create a licence |
| --- | --- | Create an application |
| --- | --- | Create an application completion |
| --- | --- | Create an application tracking |
| --- | --- | (OPTIONAL) Set the type of licence data |
| --- | --- | Create application fee |
| --- | --- | Update application completion |
|---|---|---|
| [Dvsa\Olcs\Transfer\Command\Application\UpdateTypeOfLicence](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Command/Application/UpdateTypeOfLicence.php) | **PUT** <http://olcs-backend/api/application/1/type-of-licence> | (1) Reset application |
| --- | --- | (2) Update type of licence |
| --- | --- | (2) Update application completion |
| --- | --- | (2a) (Optional) Create application fee |
| --- | --- | (2a) (Optional) Generate licence number |
| --- | --- | (2b) (Optional) Cancel licence fees |
| --- | --- | (2b) (Optional) Create application fee |
|---|---|---|
| [Dvsa\Olcs\Transfer\Command\Licence\UpdateTypeOfLicence](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Command/Licence/UpdateTypeOfLicence.php) | **PUT** <http://olcs-backend/api/licence/7/type-of-licence> | Update licence type |
|---|---|---|
| [Dvsa\Olcs\Transfer\Command\Variation\UpdateTypeOfLicence](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Command/Variation/UpdateTypeOfLicence.php) | **PUT** <http://olcs-backend/api/Variation/2/type-of-licence> | Update licence type |
| --- | --- | Update application section statuses |
|---|---|---|
| [Dvsa\Olcs\Transfer\Command\Organisation\UpdateBusinessType](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Command/Organisation/UpdateBusinessType.php) | **PUT** <http://olcs-backend/api/organisation/1/business-type> | Update business type |
| --- | --- | Update application declaration |
|---|---|---|
| [Dvsa\Olcs\Transfer\Command\Application\Declaration](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Command/Application/UpdateDeclaration.php) | **PUT** <http://olcs-backend/api/application/1/declaration> | Update declaration/interim |
| --- | --- | Create Interim Fee |
| --- | --- | Cancel All Interim Fees |
|---|---|---|
| [Dvsa\Olcs\Transfer\Command\Irfo\CreateIrfoGvPermit](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Command/Irfo/CreateIrfoGvPermit.php) | **POST** <http://olcs-backend/api/irfo/gv-permit> | Create a IRFO GV Permit |
| [Dvsa\Olcs\Transfer\Command\Irfo\UpdateIrfoGvPermit](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Command/Irfo/UpdateIrfoGvPermit.php) | **PUT** <http://olcs-backend/api/irfo/gv-permit/1> | Update a IRFO GV Permit |
| [Dvsa\Olcs\Transfer\Command\Trailers\CreateTrailer](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Command/Trailers/CreateTrailer.php) | **POST** <http://olcs-backend/api/trailers/> | Create a trailer |
| [Dvsa\Olcs\Transfer\Command\Trailers\UpdateTrailer](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Command/Trailers/UpdateTrailer.php) | **PUT** <http://olcs-backend/api/trailers/1> | Update a trailer |
| [Dvsa\Olcs\Transfer\Command\Trailers\DeleteTrailer](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-transfer/blob/develop/src/Command/Trailers/DeleteTrailer.php) | **DELETE** <http://olcs-backend/api/trailers/> | Delete trailer(s) |
|---|---|---|
| [Dvsa\Olcs\Api\Domain\Command\Application\CreateApplicationFee](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-backend/blob/develop/module/Api/src/Domain/Command/Application/CreateApplicationFee.php) | **INTERNAL** | Create application fee |
| --- | --- | (Optional) Create task |
|---|---|---|
| [Dvsa\Olcs\Api\Domain\Command\Application\CancelAllInterimFees](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-backend/blob/develop/module/Api/src/Domain/Command/Application/CancelAllInterimFees.php) | **INTERNAL** | Cancel all interim fees |
|---|---|---|
| [Dvsa\Olcs\Api\Domain\Command\Application\CreateFee](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-backend/blob/develop/module/Api/src/Domain/Command/Application/CreateFee.php) | **INTERNAL** | Create a fee for an application |
|---|---|---|
| [Dvsa\Olcs\Api\Domain\Command\Application\GenerateLicenceNumber](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-backend/blob/develop/module/Api/src/Domain/Command/Application/GenerateLicenceNumber.php) | **INTERNAL** | Generate/Update licence number |
|---|---|---|
| [Dvsa\Olcs\Api\Domain\Command\Application\ResetApplication](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-backend/blob/develop/module/Api/src/Domain/Command/Application/ResetApplication.php) | **INTERNAL** | Delete Application |
| --- | --- | Delete Licence |
| --- | --- | Close Tasks |
| --- | --- | Create Application |
|---|---|---|
| [Dvsa\Olcs\Api\Domain\Command\Application\UpdateApplicationCompletion](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-backend/blob/develop/module/Api/src/Domain/Command/Application/UpdateApplicationCompletion.php) | **INTERNAL** | Update application section statuses |
|---|---|---|
| [Dvsa\Olcs\Api\Domain\Command\ApplicationCompletion\*](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-backend/blob/develop/module/Api/src/Domain/Command/ApplicationCompletion) | **INTERNAL** | Update individual section status |
|---|---|---|
| [Dvsa\Olcs\Api\Domain\Command\Fee\CreateFee](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-backend/blob/develop/module/Api/src/Domain/Command/Fee/CreateFee.php) | **INTERNAL** | Create fee |
|---|---|---|
| [Dvsa\Olcs\Api\Domain\Command\Fee\CancelFee](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-backend/blob/develop/module/Api/src/Domain/Command/Fee/CancelFee.php) | **INTERNAL** | Cancel fee |
|---|---|---|
| [Dvsa\Olcs\Api\Domain\Command\Licence\CancelLicenceFees](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-backend/blob/develop/module/Api/src/Domain/Command/Licence/CancelLicenceFees.php) | **INTERNAL** | Cancel all licence fees |
|---|---|---|
| [Dvsa\Olcs\Api\Domain\Command\Task\CreateTask](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-backend/blob/develop/module/Api/src/Domain/Command/Task/CreateTask.php) | **INTERNAL** | Create a task |
|---|---|---|
| [Dvsa\Olcs\Api\Domain\Command\Application\UpdateVariationCompletion](https://gitlab.inf.mgt.mtpdvsa/olcs/olcs-backend/blob/develop/module/Api/src/Domain/Command/Application/UpdateVariationCompletion.php) | **INTERNAL** | Update variation completion status (STUB that needs to be implemented) |
