| Command | Request | Description / Possible side effects |
|---------|---------|-------------------------------------|
| Dvsa\Olcs\Transfer\Command\Application\CreateApplication | **POST** <http://olcs-backend/api/application/> | Create a licence |
| --- | --- | Create an application |
| --- | --- | Create an application completion |
| --- | --- | Create an application tracking |
| --- | --- | (OPTIONAL) Set the type of licence data |
| --- | --- | Create application fee |
| --- | --- | Update application completion |
|---|---|---|
| Dvsa\Olcs\Transfer\Command\Application\UpdateTypeOfLicence | **PUT** <http://olcs-backend/api/application/1/type-of-licence> | (1) Reset application |
| --- | --- | (2) Update type of licence |
| --- | --- | (2) Update application completion |
| --- | --- | (2a) (Optional) Create application fee |
| --- | --- | (2a) (Optional) Generate licence number |
| --- | --- | (2b) (Optional) Cancel licence fees |
| --- | --- | (2b) (Optional) Create application fee |
|---|---|---|
| Dvsa\Olcs\Transfer\Command\Licence\UpdateTypeOfLicence | **PUT** <http://olcs-backend/api/licence/7/type-of-licence> | Update licence type |
|---|---|---|
| Dvsa\Olcs\Transfer\Command\Organisation\UpdateBusinessType | **PUT** <http://olcs-backend/api/organisation/1/business-type> | Update business type |
| --- | --- | Update application completion |
|---|---|---|
| Dvsa\Olcs\Api\Domain\Command\Application\CreateApplicationFee | **INTERNAL** | Create application fee |
| --- | --- | (Optional) Create task |
|---|---|---|
| Dvsa\Olcs\Api\Domain\Command\Application\GenerateLicenceNumber | **INTERNAL** | Generate/Update licence number |
|---|---|---|
| Dvsa\Olcs\Api\Domain\Command\Application\ResetApplication | **INTERNAL** | Delete Application |
| --- | --- | Delete Licence |
| --- | --- | Close Tasks |
| --- | --- | Create Application |
|---|---|---|
| Dvsa\Olcs\Api\Domain\Command\Application\UpdateApplicationCompletion | **INTERNAL** | Update application section statuses |
|---|---|---|
| Dvsa\Olcs\Api\Domain\Command\ApplicationCompletion\* | INTERNAL | Update individual section status |
|---|---|---|
| Dvsa\Olcs\Api\Domain\Command\Fee\CreateFee | INTERNAL | Create fee |
|---|---|---|
| Dvsa\Olcs\Api\Domain\Command\Licence\CancelLicenceFees | INTERNAL | Cancel all licence fees |
|---|---|---|
| Dvsa\Olcs\Api\Domain\Command\Task\CreateTask | INTERNAL | Create a task |