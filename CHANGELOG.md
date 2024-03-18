# Changelog

## [6.6.0](https://github.com/dvsa/olcs-transfer/compare/v6.5.0...v6.6.0) (2024-03-18)


### Features

* Introduced sub-category field for Task Allocation Rule ([#55](https://github.com/dvsa/olcs-transfer/issues/55)) ([e950113](https://github.com/dvsa/olcs-transfer/commit/e950113a1124637d9676064cf879a909d8294dbf))
* Message footer showing operator first read ([#54](https://github.com/dvsa/olcs-transfer/issues/54)) ([3d3864d](https://github.com/dvsa/olcs-transfer/commit/3d3864d18d1a5f6999889304e980878003f82be0))

## [6.5.0](https://github.com/dvsa/olcs-transfer/compare/v6.4.0...v6.5.0) (2024-03-05)


### Features

* Case to licence for messaging ([#50](https://github.com/dvsa/olcs-transfer/issues/50)) ([4acd05e](https://github.com/dvsa/olcs-transfer/commit/4acd05ea13a574e2ef78775a4bc67e6d43c2401e))

## [6.4.0](https://github.com/dvsa/olcs-transfer/compare/v6.3.0...v6.4.0) (2024-03-05)


### Features

* VOL-4642 remove reliance on copy/pasted Laminas 2 code in query routing ([#51](https://github.com/dvsa/olcs-transfer/issues/51)) ([e287bc4](https://github.com/dvsa/olcs-transfer/commit/e287bc4322cffdb89bd0dd1783e0b9d973bf8114))

## [6.3.0](https://github.com/dvsa/olcs-transfer/compare/v6.2.1...v6.3.0) (2024-03-01)


### Features

* Updated UnreadCountByLicenceAndRoles ([#48](https://github.com/dvsa/olcs-transfer/issues/48)) ([fc548e2](https://github.com/dvsa/olcs-transfer/commit/fc548e24e398b9182672c2a7b3a5181a41d7cf5c))

## [6.2.1](https://github.com/dvsa/olcs-transfer/compare/v6.2.0...v6.2.1) (2024-02-28)


### Bug Fixes

* fix `IrfoPsvAuth` annotation ([#46](https://github.com/dvsa/olcs-transfer/issues/46)) ([2a46943](https://github.com/dvsa/olcs-transfer/commit/2a4694363aa18fb5ccc3e126b34a82ade9d15387))

## [6.2.0](https://github.com/dvsa/olcs-transfer/compare/v6.1.0...v6.2.0) (2024-02-28)


### Features

* Enable/Disable Messaging File Upload ([#41](https://github.com/dvsa/olcs-transfer/issues/41)) ([4c8c1b9](https://github.com/dvsa/olcs-transfer/commit/4c8c1b930f2557b6a8f7006a7e1e5df5a81f696d))

## [6.1.0](https://github.com/dvsa/olcs-transfer/compare/v6.0.1...v6.1.0) (2024-02-22)


### Features

* Unread count ([#40](https://github.com/dvsa/olcs-transfer/issues/40)) ([ea7e20b](https://github.com/dvsa/olcs-transfer/commit/ea7e20b7d15ec7e8e32575b8be971d9d17704b65))

## [6.0.1](https://github.com/dvsa/olcs-transfer/compare/v6.0.0...v6.0.1) (2024-02-22)


### Bug Fixes

* Cannot create task, messaging flag is not optional ([#42](https://github.com/dvsa/olcs-transfer/issues/42)) ([d9ec20e](https://github.com/dvsa/olcs-transfer/commit/d9ec20e3ab30da5981006dfffb681285f1abf02f))

## [6.0.0](https://github.com/dvsa/olcs-transfer/compare/v5.1.0...v6.0.0) (2024-02-19)


### ⚠ BREAKING CHANGES

* interop/container no longer supported

### Features

* VOL-3691 switch to Psr Container ([#34](https://github.com/dvsa/olcs-transfer/issues/34)) ([4d646fb](https://github.com/dvsa/olcs-transfer/commit/4d646fb9eabf3ab3219bfac204c26bc06ed6d979))


### Bug Fixes

* apply PHP 7.4 Rector set ([#39](https://github.com/dvsa/olcs-transfer/issues/39)) ([63f9992](https://github.com/dvsa/olcs-transfer/commit/63f99924efb79fc65477c3b6ffa7cfd3b0a4b4ea))

## [5.1.0](https://github.com/dvsa/olcs-transfer/compare/v5.0.0...v5.1.0) (2024-02-16)


### Features

* merge `project/messaging` merge to main ([#35](https://github.com/dvsa/olcs-transfer/issues/35)) ([d7f4080](https://github.com/dvsa/olcs-transfer/commit/d7f4080aba1423fb40a58d11164aa01d21654f55))

## [5.0.0](https://github.com/dvsa/olcs-transfer/compare/v5.0.0...v5.0.0) (2024-02-14)


### ⚠ BREAKING CHANGES

* drop Laminas v2 support ([#3](https://github.com/dvsa/olcs-transfer/issues/3))
* migrate to GitHub ([#2](https://github.com/dvsa/olcs-transfer/issues/2))

### Features

* Close Handler for Conversations ([#14](https://github.com/dvsa/olcs-transfer/issues/14)) ([203cf76](https://github.com/dvsa/olcs-transfer/commit/203cf767b866aaeea021a4ba2de51cf6c07656b8))
* drop Laminas v2 support ([#3](https://github.com/dvsa/olcs-transfer/issues/3)) ([564fcf0](https://github.com/dvsa/olcs-transfer/commit/564fcf01080e72adcdf6a92314a44c918e48a799))
* drop support for Laminas 2, remove last createService methods ([#21](https://github.com/dvsa/olcs-transfer/issues/21)) ([a27b074](https://github.com/dvsa/olcs-transfer/commit/a27b07483bfe72cb44238327c85f1fdfdbba5926))
* Introduce CreateMessage command ([#11](https://github.com/dvsa/olcs-transfer/issues/11)) ([402d21a](https://github.com/dvsa/olcs-transfer/commit/402d21a23acd53b8475f901b97b9e1b727facda0))
* migrate to GitHub ([#2](https://github.com/dvsa/olcs-transfer/issues/2)) ([9d457fd](https://github.com/dvsa/olcs-transfer/commit/9d457fdb8d4bac53e7d484021c3d952979b12109))
* VOL-4575 Conversation query rebuild ([#10](https://github.com/dvsa/olcs-transfer/issues/10)) ([be54dab](https://github.com/dvsa/olcs-transfer/commit/be54dabeb4ef6d15529f0e03205e9121c91b4b3a))


### Bug Fixes

* Fixed single chr typo that made it in with recent en-masse refactor of annotations. Causing issues on Admin IRFO pages on internal. ([#22](https://github.com/dvsa/olcs-transfer/issues/22)) ([5ba7b52](https://github.com/dvsa/olcs-transfer/commit/5ba7b5279ecb96cbe545d95587c503caba6c38a0))
* irfo stock control page ([#27](https://github.com/dvsa/olcs-transfer/issues/27)) ([9b20f1f](https://github.com/dvsa/olcs-transfer/commit/9b20f1f18e02c42775e85b87ed362765a2177ed3))
* mark `LaminasRouterHttpQueryV2` as `final` and return `static` ([#7](https://github.com/dvsa/olcs-transfer/issues/7)) ([49ec220](https://github.com/dvsa/olcs-transfer/commit/49ec220ab857b6832139b361fd17249f518bdf10))
* remove some outdated docblock comments that should have been removed during Laminas update ([#25](https://github.com/dvsa/olcs-transfer/issues/25)) ([f891a80](https://github.com/dvsa/olcs-transfer/commit/f891a80e7f82874887e08c1b624ef34fe413692e))
* VOL-4687 - Refactor ListConversation Query for compatibility with internal (applications) ([#5](https://github.com/dvsa/olcs-transfer/issues/5)) ([e152fef](https://github.com/dvsa/olcs-transfer/commit/e152fef3f759a85abf3c7aa8d7e3df693f960815))


### Miscellaneous Chores

* add Dependabot config ([#13](https://github.com/dvsa/olcs-transfer/issues/13)) ([d880c6f](https://github.com/dvsa/olcs-transfer/commit/d880c6f782213758a867021e8877626adb89a99b))
* release 5.0.0 ([#33](https://github.com/dvsa/olcs-transfer/issues/33)) ([b2803d3](https://github.com/dvsa/olcs-transfer/commit/b2803d3980f0705db0cbbee2dd15e9265e030838))

## Revision History for the OLCS Transfer ### 4.0 2016-09-23 - Version 4.0 is the first version of the OLCS Transfer to be published to GitHub
