# Changelog

## [3.1.1](https://github.com/gigerIT/bexio-api-client/compare/v3.1.0...v3.1.1) (2025-11-07)


### Miscellaneous Chores

* **deps-dev:** bump symfony/var-dumper from 7.3.4 to 7.3.5 ([24c7a1b](https://github.com/gigerIT/bexio-api-client/commit/24c7a1bd5f99d3fdc0acc9927c73b5bde133200c))
* **deps-dev:** bump symfony/var-dumper from 7.3.4 to 7.3.5 ([04d27be](https://github.com/gigerIT/bexio-api-client/commit/04d27be14560f7dd8d68b8c08ea1c8f169ef124f))
* **deps:** bump illuminate/container from 12.34.0 to 12.37.0 ([312645a](https://github.com/gigerIT/bexio-api-client/commit/312645adcc75dbc7f7b523cb0541088de55e05ba))
* **deps:** bump illuminate/container from 12.34.0 to 12.37.0 ([eb99abc](https://github.com/gigerIT/bexio-api-client/commit/eb99abc10ad97680a77197115990649dd6e7b543))

## [3.1.0](https://github.com/gigerIT/bexio-api-client/compare/v3.0.2...v3.1.0) (2025-10-23)


### Features

* add conditional callback method to QueryBuilder for improved query flexibility ([d7aa542](https://github.com/gigerIT/bexio-api-client/commit/d7aa542d4778b743b7bdaaf00df72d9a8bea0abc))

## [3.0.2](https://github.com/gigerIT/bexio-api-client/compare/v3.0.1...v3.0.2) (2025-10-17)


### Bug Fixes

* update address handling in AdditionalAddress and Contact classes to clarify deprecation and exclude address from create/update requests ([0af2ffe](https://github.com/gigerIT/bexio-api-client/commit/0af2ffedfa75033ed0d2d8d424d682cf59757b25))


### Miscellaneous Chores

* add COLLISION_PRINTER_MAX_WIDTH environment variable to phpunit configuration ([456aeb9](https://github.com/gigerIT/bexio-api-client/commit/456aeb9dc93569a63cf9227da39486fb89866986))
* add phpstan analysis command for testing types in composer.json ([679e776](https://github.com/gigerIT/bexio-api-client/commit/679e776d1aa241c61d1cf53d50c875593c12713e))
* update API documentation structure and content, including new sections for authentication, overview, and detailed endpoint descriptions ([440e2e6](https://github.com/gigerIT/bexio-api-client/commit/440e2e67d0559f70546decd069453f2631e86daf))

## [3.0.1](https://github.com/gigerIT/bexio-api-client/compare/v3.0.0...v3.0.1) (2025-10-17)


### Miscellaneous Chores

* add phpstan as a development dependency and configure initial phpstan settings in phpstan.neon ([fdad8c5](https://github.com/gigerIT/bexio-api-client/commit/fdad8c54a01a21bdcec29dde00eeebee7f480766))
* update composer.lock to reflect package version upgrades for illuminate and spatie libraries ([33d454e](https://github.com/gigerIT/bexio-api-client/commit/33d454e4af53d633809bf4976c80e774b19b7f90))

## [2.4.0](https://github.com/gigerIT/bexio-api-client/compare/v2.3.0...v2.4.0) (2025-10-16)


### Features

* add comprehensive API documentation for various resources including Contacts, Sales Orders, and more ([a11f3c9](https://github.com/gigerIT/bexio-api-client/commit/a11f3c9981ec7a380b65bc39517454de31ffe381))
* enhance GetContactsRequest with limit and offset validation, and add default query parameters ([0e62b21](https://github.com/gigerIT/bexio-api-client/commit/0e62b219ef8572a7270888afcdb72859e351bc49))
* implement query builder for Contact resource and refactor related methods ([6bce692](https://github.com/gigerIT/bexio-api-client/commit/6bce692677e606c160bc4eb51696ccb8901604de))
* introduce AdditionalAddresses, ContactGroups, ContactRelations, Salutations, and Titles resources with comprehensive request handling and query capabilities ([06ab255](https://github.com/gigerIT/bexio-api-client/commit/06ab255088e8369a8797dec61b951e88e3c49868))

## [2.3.0](https://github.com/gigerIT/bexio-api-client/compare/v2.2.0...v2.3.0) (2025-10-16)


### Features

* add HasOfficeLink trait to Contact class and define SHOW_URL constant ([e5ab284](https://github.com/gigerIT/bexio-api-client/commit/e5ab284b792afbe85e641068100f45425acf4084))


### Bug Fixes

* exclude deprecated `is_lead` from contact payload in UpdateContactRequest ([5ea7dd4](https://github.com/gigerIT/bexio-api-client/commit/5ea7dd46a9f849a3d5fdc9806823e9d4ccaa946c))

## [2.2.0](https://github.com/gigerIT/bexio-api-client/compare/v2.1.6...v2.2.0) (2025-10-09)


### Features

* add testAccount and testAccountId functions to retrieve account information ([7824314](https://github.com/gigerIT/bexio-api-client/commit/78243140014ba1305e2bd161dbd4e5815cbafb2b))
* Remove deprecated `$is_lead` property from Contact ([ec0cc8e](https://github.com/gigerIT/bexio-api-client/commit/ec0cc8ee62a0023f97890a91f6a53b308aa6c845))


### Bug Fixes

* exclude `updated_at` and `profile_image` from contact payload in CreateContactRequest ([21350d4](https://github.com/gigerIT/bexio-api-client/commit/21350d40d71345c42f5facfe49d9eb45e501aa03))
* update Account collection instantiation in testSalesAccount to use Collection class ([3a3ac11](https://github.com/gigerIT/bexio-api-client/commit/3a3ac11880278ff702bdc1197d395caa1b7ea3bf))
* update account type in testSalesAccount to correctly retrieve sales account ([def521e](https://github.com/gigerIT/bexio-api-client/commit/def521ebbdd1ab158a18fc719bd76f977ef405e2))
* update testAccount method to use a hardcoded API key and adjust account retrieval logic in tests ([9b25ed6](https://github.com/gigerIT/bexio-api-client/commit/9b25ed606aadab70bccf2fd8eff16f2e1c5fdaa3))
* update testSaleTaxId to return the correct sales tax ID ([2957a76](https://github.com/gigerIT/bexio-api-client/commit/2957a76c4f905fbf60406ed9d24db0066636862a))

## [2.1.6](https://github.com/gigerIT/bexio-api-client/compare/v2.1.5...v2.1.6) (2025-05-27)


### Miscellaneous Chores

* bump deps ([18b8a53](https://github.com/gigerIT/bexio-api-client/commit/18b8a5395a1a695868fe039e5ac54abeeab1508f))
* **workflow:** add issue permissions to CI workflow ([3f02055](https://github.com/gigerIT/bexio-api-client/commit/3f02055bbf762d25e7fc107b225f91fe73471919))

## [2.1.5](https://github.com/gigerIT/bexio-api-client/compare/v2.1.4...v2.1.5) (2025-05-23)


### Miscellaneous Chores

* bump deps ([375b99d](https://github.com/gigerIT/bexio-api-client/commit/375b99d299d0fc4fed0e5826826b559855935574))

## [2.1.4](https://github.com/gigerIT/bexio-api-client/compare/v2.1.3...v2.1.4) (2025-04-24)


### Bug Fixes

* illuminate/container version ([e04062f](https://github.com/gigerIT/bexio-api-client/commit/e04062f558a9acae10b2ae843b9560f80d9764e6))
* updated testSaleTaxId ([7eb0244](https://github.com/gigerIT/bexio-api-client/commit/7eb024499ebc9f3be647e17211c79e780921e35f))


### Miscellaneous Chores

* **main:** release 2.1.3 ([6717775](https://github.com/gigerIT/bexio-api-client/commit/67177755dda5acfbe505737aed3bc61cfd6d13b5))
* **main:** release 2.1.3 ([6f590f9](https://github.com/gigerIT/bexio-api-client/commit/6f590f98ddfdd8cf41b52bceaf32ba19130ccbdc))

## [2.1.3](https://github.com/gigerIT/bexio-api-client/compare/v2.1.2...v2.1.3) (2025-03-10)


### Bug Fixes

* allow illuminate/container to support version 12 ([7a40f8f](https://github.com/gigerIT/bexio-api-client/commit/7a40f8f1cf3f234f79466cdb9d0b8d1ccfcea552))


### Miscellaneous Chores

* bump version to 2.1.3 ([81994b6](https://github.com/gigerIT/bexio-api-client/commit/81994b6d9fbe40e47a7fb8c91ad944d58c46167c))

## [2.1.2](https://github.com/gigerIT/bexio-api-client/compare/v2.1.1...v2.1.2) (2025-01-08)


### Miscellaneous Chores

* readme updated ([2a3678d](https://github.com/gigerIT/bexio-api-client/commit/2a3678d370d8701f6c2704820344d917aabaf7e8))

## [2.1.1](https://github.com/gigerIT/bexio-api-client/compare/v2.1.0...v2.1.1) (2025-01-08)


### Miscellaneous Chores

* readme updated ([59073d1](https://github.com/gigerIT/bexio-api-client/commit/59073d1d45914c6168e5a39a6b2aa4a64fac5549))

## [2.1.0](https://github.com/gigerIT/bexio-api-client/compare/v2.0.0...v2.1.0) (2025-01-08)


### Features

* allow multiple constructor types ([823c496](https://github.com/gigerIT/bexio-api-client/commit/823c4960aeef0925edd475134e2869a08713c5a9))


### Bug Fixes

* remove dumps in tests ([adf9d07](https://github.com/gigerIT/bexio-api-client/commit/adf9d07da6b88abc2fd7a42ff1fb6b9eed01d81b))


### Miscellaneous Chores

* loads test api key in CI from github secrets ([1a2b23a](https://github.com/gigerIT/bexio-api-client/commit/1a2b23aadf8eb0a0ef311bceae2b049c3aa70205))

## [2.0.0](https://github.com/gigerIT/bexio-api-client/compare/v1.0.0...v2.0.0) (2025-01-07)


### ⚠ BREAKING CHANGES

* oauth2

### Features

* oauth2 ([6a7a3ec](https://github.com/gigerIT/bexio-api-client/commit/6a7a3ece21b40abfabe5385f699574c13b4beb9a))

## 1.0.0 (2024-10-15)


### Features

* add accounting/currency with default id's ([089c5f5](https://github.com/gigerIT/bexio-api-client/commit/089c5f50196cdc3ce80b97432fae034eed1f6eaa))
* add Accounts ([356ab4c](https://github.com/gigerIT/bexio-api-client/commit/356ab4c61208e34b4af8a89a0bab13ad77f8b361))
* add company profile resource ([9ef4a5d](https://github.com/gigerIT/bexio-api-client/commit/9ef4a5d7897dedcd0a387d3ed1acbf5bdd14bdd6))
* add office link & add to invoice ([4aab947](https://github.com/gigerIT/bexio-api-client/commit/4aab9473474843ea44da3b9aa204bc7445b50366))
* add office link & add to invoice ([96bf9c0](https://github.com/gigerIT/bexio-api-client/commit/96bf9c0f92a40fe4670f7994a81ac33f15349254))
* add office link & add to invoice ([cab14a0](https://github.com/gigerIT/bexio-api-client/commit/cab14a09e65746f551a79cdf31d321389360e8e4))
* add office link & add to invoice ([91cca4e](https://github.com/gigerIT/bexio-api-client/commit/91cca4e7f84c36d2526e5034fb9d95ef0d3147aa))
* add officeLinkFor() mehtod ([bf5f138](https://github.com/gigerIT/bexio-api-client/commit/bf5f138678098a0ef925450ea70c9031bbcd930e))
* add PUBLIC_TEST_API_KEY to BexioClient ([14b628e](https://github.com/gigerIT/bexio-api-client/commit/14b628e3a769836fb595fd8c4842dac324547812))
* added release please ([0106cd8](https://github.com/gigerIT/bexio-api-client/commit/0106cd8c8c715f92691e3241cf38975a495ad942))
* custom ItemPositionCollection added ([1c8ea4e](https://github.com/gigerIT/bexio-api-client/commit/1c8ea4ed1c0a615abb97aa9aa57652df80edf244))
* initial pre release ([5323c68](https://github.com/gigerIT/bexio-api-client/commit/5323c688dd5f9322c9321f044a6d269ff2194219))
* New item position handling ([#7](https://github.com/gigerIT/bexio-api-client/issues/7)) ([75bf917](https://github.com/gigerIT/bexio-api-client/commit/75bf917a0f08fa240d04e43ec1440d254b0d6016))
* Sales item sub positions ([#10](https://github.com/gigerIT/bexio-api-client/issues/10)) ([b62b4e9](https://github.com/gigerIT/bexio-api-client/commit/b62b4e9e337722b7e8eacefe96328a0d674d50d5))
* upgrade to pest 3 ([13a3648](https://github.com/gigerIT/bexio-api-client/commit/13a3648b8938327f91ff1b2c925498a0cefdd18f))


### Bug Fixes

* bump deps ([340db30](https://github.com/gigerIT/bexio-api-client/commit/340db300178070c0b035f05f268a13728b1a8dba))
* check-dependency ([664d18e](https://github.com/gigerIT/bexio-api-client/commit/664d18e335f58c0f4dcc55e8f22fc6cd7af05dd6))
* CI ([e435008](https://github.com/gigerIT/bexio-api-client/commit/e4350083c559d7d28a83cb5c18e8448256aeac52))
* CI permissions ([b9d752d](https://github.com/gigerIT/bexio-api-client/commit/b9d752d833d9a38b26e90cd3c1cbc3fd93d071b3))
* CI prevent second test run on release push ([2975fe3](https://github.com/gigerIT/bexio-api-client/commit/2975fe34abb151ad2c14465f6197a35a59cae48c))
* CI release ([70b031b](https://github.com/gigerIT/bexio-api-client/commit/70b031b217c104dee1dfa125da3097c69a5ad820))
* CI trigger only on push ([e158b93](https://github.com/gigerIT/bexio-api-client/commit/e158b93276cd98d3641b2c620d804701074eea8d))
* comment tests to new syntax ([9d79919](https://github.com/gigerIT/bexio-api-client/commit/9d7991958c26957c01c8639c812f1490a03b3128))
* ContactSearchWhereClause optional prop before required ([db9a8bf](https://github.com/gigerIT/bexio-api-client/commit/db9a8bfb0e2ca9f12a660342ae3daec5ee330d3b))
* make SearchCriteria required parameter ([16287f0](https://github.com/gigerIT/bexio-api-client/commit/16287f09d7f8ca727906b6f9590bbc3f858baf85))
* office link comments ([d262039](https://github.com/gigerIT/bexio-api-client/commit/d2620399d851df0ece4d64fb4ffa7748cad41dbb))
* office url const naming ([0a9b5e7](https://github.com/gigerIT/bexio-api-client/commit/0a9b5e7010cd29f99bafdcbd9d3ac574ed036e6a))
* officeLinkFor() static ([2787630](https://github.com/gigerIT/bexio-api-client/commit/2787630e4e91961e47d86a994ba8ec49f68ad523))
* remove dump and add architecture test ([650b081](https://github.com/gigerIT/bexio-api-client/commit/650b0813de79213228c09fee0f44de17685e1afd))
* resources from ([57f0646](https://github.com/gigerIT/bexio-api-client/commit/57f0646685fb0130856bd6571e75aa82cc51599a))
* rotate API test key ([c3f405c](https://github.com/gigerIT/bexio-api-client/commit/c3f405c5308c58e27380aaa28c80bc3df624ca26))


### Miscellaneous Chores

* **main:** release 1.0.0 ([727ca7e](https://github.com/gigerIT/bexio-api-client/commit/727ca7e78076679ef07568063f7631157bda125c))
* **main:** release 1.0.1 ([c619787](https://github.com/gigerIT/bexio-api-client/commit/c6197875c747f0a247ac6219a791b329662deb50))
* **main:** release 1.0.2 ([#3](https://github.com/gigerIT/bexio-api-client/issues/3)) ([f5e5fb1](https://github.com/gigerIT/bexio-api-client/commit/f5e5fb1a54806ff77a97be9e2050758418434d66))
* **main:** release 1.1.0 ([#4](https://github.com/gigerIT/bexio-api-client/issues/4)) ([6add05d](https://github.com/gigerIT/bexio-api-client/commit/6add05d4b2c07b63f5b6b441d693e223d15d13ab))
* **main:** release 1.2.0 ([#5](https://github.com/gigerIT/bexio-api-client/issues/5)) ([10657f2](https://github.com/gigerIT/bexio-api-client/commit/10657f2851b987a26b4a85355fcd14701b24867e))
* **main:** release 1.2.1 ([#6](https://github.com/gigerIT/bexio-api-client/issues/6)) ([6830c66](https://github.com/gigerIT/bexio-api-client/commit/6830c661d070668b8a5569a3b631efb1694e9e42))
* **main:** release 1.2.2 ([#8](https://github.com/gigerIT/bexio-api-client/issues/8)) ([7076bf2](https://github.com/gigerIT/bexio-api-client/commit/7076bf28b43e1a6d77d8737d853b1ffe812834b0))
* **main:** release 1.3.0 ([#9](https://github.com/gigerIT/bexio-api-client/issues/9)) ([815886b](https://github.com/gigerIT/bexio-api-client/commit/815886b27a734f72514b3ed4554f462835e629af))
* **main:** release 1.3.1 ([#11](https://github.com/gigerIT/bexio-api-client/issues/11)) ([3ae95ad](https://github.com/gigerIT/bexio-api-client/commit/3ae95ad4beccbcdc40d4b66f63f9d6c29fe53f2a))
* **main:** release 1.3.2 ([#12](https://github.com/gigerIT/bexio-api-client/issues/12)) ([7391928](https://github.com/gigerIT/bexio-api-client/commit/7391928db36bdf9203e9b1c4542347330d449521))
* **main:** release 1.4.0 ([#13](https://github.com/gigerIT/bexio-api-client/issues/13)) ([a05ac2c](https://github.com/gigerIT/bexio-api-client/commit/a05ac2cd1bf4e250f708031287c2bd1f767c08d8))
* **main:** release 1.5.0 ([#14](https://github.com/gigerIT/bexio-api-client/issues/14)) ([877519f](https://github.com/gigerIT/bexio-api-client/commit/877519f03fe0dd6c5dfa73134d11b45a345c999b))
* **main:** release 1.5.1 ([#15](https://github.com/gigerIT/bexio-api-client/issues/15)) ([b99a508](https://github.com/gigerIT/bexio-api-client/commit/b99a508e5fe4a93041c3bdac7a4d103b1d30d302))
* **main:** release 1.5.2 ([#16](https://github.com/gigerIT/bexio-api-client/issues/16)) ([86f0594](https://github.com/gigerIT/bexio-api-client/commit/86f05942db4def79ca91a2e319d0e2bd91c5a96b))
* **main:** release 1.5.3 ([#17](https://github.com/gigerIT/bexio-api-client/issues/17)) ([8e0081b](https://github.com/gigerIT/bexio-api-client/commit/8e0081b5cc32d4d0fdc914270d390cfdcbcb1a78))

## [1.5.3](https://github.com/gigerIT/bexio-api-client/compare/v1.5.2...v1.5.3) (2024-10-03)


### Bug Fixes

* rotate API test key ([c3f405c](https://github.com/gigerIT/bexio-api-client/commit/c3f405c5308c58e27380aaa28c80bc3df624ca26))

## [1.5.2](https://github.com/gigerIT/bexio-api-client/compare/v1.5.1...v1.5.2) (2024-10-02)


### Bug Fixes

* office link comments ([d262039](https://github.com/gigerIT/bexio-api-client/commit/d2620399d851df0ece4d64fb4ffa7748cad41dbb))
* office url const naming ([0a9b5e7](https://github.com/gigerIT/bexio-api-client/commit/0a9b5e7010cd29f99bafdcbd9d3ac574ed036e6a))

## [1.5.1](https://github.com/gigerIT/bexio-api-client/compare/v1.5.0...v1.5.1) (2024-10-02)


### Bug Fixes

* officeLinkFor() static ([2787630](https://github.com/gigerIT/bexio-api-client/commit/2787630e4e91961e47d86a994ba8ec49f68ad523))

## [1.5.0](https://github.com/gigerIT/bexio-api-client/compare/v1.4.0...v1.5.0) (2024-10-02)


### Features

* add officeLinkFor() mehtod ([bf5f138](https://github.com/gigerIT/bexio-api-client/commit/bf5f138678098a0ef925450ea70c9031bbcd930e))

## [1.4.0](https://github.com/gigerIT/bexio-api-client/compare/v1.3.2...v1.4.0) (2024-10-02)


### Features

* add office link & add to invoice ([4aab947](https://github.com/gigerIT/bexio-api-client/commit/4aab9473474843ea44da3b9aa204bc7445b50366))
* add office link & add to invoice ([96bf9c0](https://github.com/gigerIT/bexio-api-client/commit/96bf9c0f92a40fe4670f7994a81ac33f15349254))
* add office link & add to invoice ([cab14a0](https://github.com/gigerIT/bexio-api-client/commit/cab14a09e65746f551a79cdf31d321389360e8e4))
* add office link & add to invoice ([91cca4e](https://github.com/gigerIT/bexio-api-client/commit/91cca4e7f84c36d2526e5034fb9d95ef0d3147aa))
* add PUBLIC_TEST_API_KEY to BexioClient ([14b628e](https://github.com/gigerIT/bexio-api-client/commit/14b628e3a769836fb595fd8c4842dac324547812))

## [1.3.2](https://github.com/gigerIT/bexio-api-client/compare/v1.3.1...v1.3.2) (2024-09-24)


### Bug Fixes

* remove dump and add architecture test ([650b081](https://github.com/gigerIT/bexio-api-client/commit/650b0813de79213228c09fee0f44de17685e1afd))

## [1.3.1](https://github.com/gigerIT/bexio-api-client/compare/v1.3.0...v1.3.1) (2024-09-24)


### Bug Fixes

* bump deps ([340db30](https://github.com/gigerIT/bexio-api-client/commit/340db300178070c0b035f05f268a13728b1a8dba))

## [1.3.0](https://github.com/gigerIT/bexio-api-client/compare/v1.2.2...v1.3.0) (2024-09-20)


### Features

* Sales item sub positions ([#10](https://github.com/gigerIT/bexio-api-client/issues/10)) ([b62b4e9](https://github.com/gigerIT/bexio-api-client/commit/b62b4e9e337722b7e8eacefe96328a0d674d50d5))
* upgrade to pest 3 ([13a3648](https://github.com/gigerIT/bexio-api-client/commit/13a3648b8938327f91ff1b2c925498a0cefdd18f))


### Bug Fixes

* comment tests to new syntax ([9d79919](https://github.com/gigerIT/bexio-api-client/commit/9d7991958c26957c01c8639c812f1490a03b3128))

## [1.2.2](https://github.com/gigerIT/bexio-api-client/compare/v1.2.1...v1.2.2) (2024-08-08)


### Features

* New item position handling ([#7](https://github.com/gigerIT/bexio-api-client/issues/7)) ([75bf917](https://github.com/gigerIT/bexio-api-client/commit/75bf917a0f08fa240d04e43ec1440d254b0d6016))

## [1.2.1](https://github.com/gigerIT/bexio-api-client/compare/v1.2.0...v1.2.1) (2024-07-30)


### Bug Fixes

* ContactSearchWhereClause optional prop before required ([db9a8bf](https://github.com/gigerIT/bexio-api-client/commit/db9a8bfb0e2ca9f12a660342ae3daec5ee330d3b))

## [1.2.0](https://github.com/gigerIT/bexio-api-client/compare/v1.1.0...v1.2.0) (2024-07-30)


### Features

* add company profile resource ([9ef4a5d](https://github.com/gigerIT/bexio-api-client/commit/9ef4a5d7897dedcd0a387d3ed1acbf5bdd14bdd6))

## [1.1.0](https://github.com/gigerIT/bexio-api-client/compare/v1.0.2...v1.1.0) (2024-07-29)


### Features

* add Accounts ([356ab4c](https://github.com/gigerIT/bexio-api-client/commit/356ab4c61208e34b4af8a89a0bab13ad77f8b361))


### Bug Fixes

* CI ([e435008](https://github.com/gigerIT/bexio-api-client/commit/e4350083c559d7d28a83cb5c18e8448256aeac52))

## [1.0.2](https://github.com/gigerIT/bexio-api-client/compare/v1.0.1...v1.0.2) (2024-06-14)


### Bug Fixes

* CI prevent second test run on release push ([2975fe3](https://github.com/gigerIT/bexio-api-client/commit/2975fe34abb151ad2c14465f6197a35a59cae48c))
* make SearchCriteria required parameter ([16287f0](https://github.com/gigerIT/bexio-api-client/commit/16287f09d7f8ca727906b6f9590bbc3f858baf85))

## [1.0.1](https://github.com/gigerIT/bexio-api-client/compare/v1.0.0...v1.0.1) (2024-06-12)


### Bug Fixes

* CI trigger only on push ([e158b93](https://github.com/gigerIT/bexio-api-client/commit/e158b93276cd98d3641b2c620d804701074eea8d))

## 1.0.0 (2024-06-12)


### Features

* added release please ([0106cd8](https://github.com/gigerIT/bexio-api-client/commit/0106cd8c8c715f92691e3241cf38975a495ad942))
* custom ItemPositionCollection added ([1c8ea4e](https://github.com/gigerIT/bexio-api-client/commit/1c8ea4ed1c0a615abb97aa9aa57652df80edf244))


### Bug Fixes

* check-dependency ([664d18e](https://github.com/gigerIT/bexio-api-client/commit/664d18e335f58c0f4dcc55e8f22fc6cd7af05dd6))
* CI permissions ([b9d752d](https://github.com/gigerIT/bexio-api-client/commit/b9d752d833d9a38b26e90cd3c1cbc3fd93d071b3))
* CI release ([70b031b](https://github.com/gigerIT/bexio-api-client/commit/70b031b217c104dee1dfa125da3097c69a5ad820))
* resources from ([57f0646](https://github.com/gigerIT/bexio-api-client/commit/57f0646685fb0130856bd6571e75aa82cc51599a))
