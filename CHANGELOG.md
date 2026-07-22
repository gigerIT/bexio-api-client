# Changelog

## [4.10.3](https://github.com/gigerIT/bexio-api-client/compare/v4.10.2...v4.10.3) (2026-07-22)


### Bug Fixes

* attach client to query results ([bf384fa](https://github.com/gigerIT/bexio-api-client/commit/bf384fa6d83ba9df416e4204e5af83e90af7e765))
* **contacts:** forward show_archived on search ([7a498f5](https://github.com/gigerIT/bexio-api-client/commit/7a498f53dc3906b8cc3a9aeaf608a38e3bacfee9))
* default employee snapshot date ([8579b30](https://github.com/gigerIT/bexio-api-client/commit/8579b30579ba46bd71eb409b7da41af0d846c591))
* **deliveries:** drop fake kb_order nested APIs ([ab497c4](https://github.com/gigerIT/bexio-api-client/commit/ab497c4148136e0f87f2161df2a3bd36f2bfc498))
* preserve uploaded file contents ([788eab3](https://github.com/gigerIT/bexio-api-client/commit/788eab3cdc95e66faea514327ea7d649efa8604e))
* **quotes:** cast positions via ItemPositionCast ([c30bbd9](https://github.com/gigerIT/bexio-api-client/commit/c30bbd9b035382335ff061328f608d59083337ea))
* **quotes:** rename QuoteStatus::DEClLINED to DECLINED ([c923d19](https://github.com/gigerIT/bexio-api-client/commit/c923d192cbcdf192631df4211c790d70ba1c1997))
* restrict payment update payload ([e6d4402](https://github.com/gigerIT/bexio-api-client/commit/e6d440250d5f072d1b7ee5061d299f28481f5501))
* validate order repetition response roots ([9e2468f](https://github.com/gigerIT/bexio-api-client/commit/9e2468f6190a6d2b707248942c8e90be260a9ab3))
* validate order repetition responses ([2907e9f](https://github.com/gigerIT/bexio-api-client/commit/2907e9fa04d5648c1731eaf96d7ab47c55e1f011))
* validate order repetition rules ([55eeffb](https://github.com/gigerIT/bexio-api-client/commit/55eeffbbaf46ec068ebc8e49e72cc37139993e79))


### Documentation

* mark audit fix plan complete ([64e3de1](https://github.com/gigerIT/bexio-api-client/commit/64e3de1c76f3816a0e74fdeccd573e07db10fbc4))
* plan audit finding fixes ([2b4fbca](https://github.com/gigerIT/bexio-api-client/commit/2b4fbcafd308f114c174de3045c32c1a5d0ec0a6))


### Tests

* generate valid PDF upload fixture ([34a3165](https://github.com/gigerIT/bexio-api-client/commit/34a3165189496ed32746209ae9249014c37cd39c))
* hydrate payment payload fixture ([eba26cb](https://github.com/gigerIT/bexio-api-client/commit/eba26cb93aaaf46f5f1c6291192664629f57c870))
* use supported file upload fixture ([32f67b9](https://github.com/gigerIT/bexio-api-client/commit/32f67b9fb15703ba86dba8956e03a634e2e33efd))

## [4.10.2](https://github.com/gigerIT/bexio-api-client/compare/v4.10.1...v4.10.2) (2026-07-22)


### Bug Fixes

* **api-scope:** add ACCOUNTING case for write access to accounting data ([65d7428](https://github.com/gigerIT/bexio-api-client/commit/65d7428d821ea27b18d943ee92660b428b39cdd2))
* **pagination:** update query builders for Bills, Expenses, and Outgoing Payments to use page-based pagination; modify GetExpensesRequest to use page instead of offset ([a40d9af](https://github.com/gigerIT/bexio-api-client/commit/a40d9afea98f957599894c6a70bffe9b9081a6f2))

## [4.10.1](https://github.com/gigerIT/bexio-api-client/compare/v4.10.0...v4.10.1) (2026-07-22)


### Bug Fixes

* **query-builder:** forward unmatched parameters to request query string for zero and partial constructor index requests ([e760adb](https://github.com/gigerIT/bexio-api-client/commit/e760adb1013ee6a1ca8e2bde4ee32cb0175e7d84))

## [4.10.0](https://github.com/gigerIT/bexio-api-client/compare/v4.9.1...v4.10.0) (2026-07-21)


### Features

* **auth:** add OAuth token revocation ([16307d3](https://github.com/gigerIT/bexio-api-client/commit/16307d37a670100fa15c8b4a380a146c4fcbff59))


### Bug Fixes

* **taxes:** replace sales account tax ID with testSaleTaxId in various tests ([b35b1c4](https://github.com/gigerIT/bexio-api-client/commit/b35b1c4c91dbb7bec723a0bee05e1eba56931df9))


### Tests

* **taxes:** add sales tax retrieval test and update tax request ([af41e5c](https://github.com/gigerIT/bexio-api-client/commit/af41e5c188f1426417fe831b434c070fb30bc4c0))

## [4.9.1](https://github.com/gigerIT/bexio-api-client/compare/v4.9.0...v4.9.1) (2026-06-19)


### Code Refactoring

* **sales:** share document payload serialization ([c6cf481](https://github.com/gigerIT/bexio-api-client/commit/c6cf4819d809bc89a80df4defc92752a0d218955))


### Miscellaneous Chores

* **deps:** bump actions/checkout from 6 to 7 ([290b94f](https://github.com/gigerIT/bexio-api-client/commit/290b94f085c4a63d18307a3dfa9cb0758ac300a5))
* **deps:** bump actions/checkout from 6 to 7 ([2b8a8ed](https://github.com/gigerIT/bexio-api-client/commit/2b8a8ed80dff806d30c2df05b5e89a2b487a2f6c))
* upgrade Laravel test stack ([469877d](https://github.com/gigerIT/bexio-api-client/commit/469877dcd91135d3d46557a669a7cb7d799a216d))

## [4.9.0](https://github.com/gigerIT/bexio-api-client/compare/v4.8.3...v4.9.0) (2026-05-06)


### Features

* **sales:** introduce ConvertsSalesDocuments trait for document conversion ([ba38e6b](https://github.com/gigerIT/bexio-api-client/commit/ba38e6b1f77d53d4c3dc7f0e63b3af1f9d6fd20c))


### Documentation

* update AGENTS.md and SKILL.md to emphasize enum usage ([630e4a9](https://github.com/gigerIT/bexio-api-client/commit/630e4a9cd6c5771567d2de77ec1e5d021045f9eb))


### Miscellaneous Chores

* **deps:** bump spatie/laravel-data from 4.20.1 to 4.22.1 ([715527c](https://github.com/gigerIT/bexio-api-client/commit/715527c857c8461f836da8e3c2f741af1b2ed232))

## [4.8.3](https://github.com/gigerIT/bexio-api-client/compare/v4.8.2...v4.8.3) (2026-04-28)


### Bug Fixes

* **accounting:** hydrate year response dates ([0e9f6dd](https://github.com/gigerIT/bexio-api-client/commit/0e9f6ddf5b9222a1fc2740dc2b49652d4707c251))
* **accounting:** map documented account group fields ([42ed526](https://github.com/gigerIT/bexio-api-client/commit/42ed52642bb97153630607d8a47456f107587a76))
* **accounting:** remove unsupported Manual Entry show endpoint and update documentation ([16318a4](https://github.com/gigerIT/bexio-api-client/commit/16318a43eec463bb5dd9c55b87ee9541ec82420e))


### Tests

* enhance API coverage with live tests and new endpoints ([77e64d9](https://github.com/gigerIT/bexio-api-client/commit/77e64d9b7a10b281f0b0e59328166f98f7cca7c1))

## [4.8.2](https://github.com/gigerIT/bexio-api-client/compare/v4.8.1...v4.8.2) (2026-04-27)


### Bug Fixes

* align bexio write payloads with live schemas ([6c2b328](https://github.com/gigerIT/bexio-api-client/commit/6c2b328191ad16b45238c083dfcaba3c39455a5e))
* ci ([83bbde2](https://github.com/gigerIT/bexio-api-client/commit/83bbde2402fe592fcb3531943801040420caede9))
* ci ([227e2a6](https://github.com/gigerIT/bexio-api-client/commit/227e2a666ef2710fe6baae20f5e95931c2b04c14))
* **item-positions:** omit article fields on update ([5091f87](https://github.com/gigerIT/bexio-api-client/commit/5091f8704b6922ec8670abe21a8be433526baa61))
* **resources:** preserve writable payload fields ([1176301](https://github.com/gigerIT/bexio-api-client/commit/1176301c5a3aa2326dd273eb6e8ec451a494d5bc))


### Documentation

* **agents:** clarify item-position handling and update payload requirements ([dc521c0](https://github.com/gigerIT/bexio-api-client/commit/dc521c0ebceb8223506e9c0c813b705146adf9e0))
* **agents:** enhance purchase write payload guidelines and clarify item-position rules ([510fd5b](https://github.com/gigerIT/bexio-api-client/commit/510fd5b6646dd695c4ba99c1c7fcfcda0fa38161))
* **bexio-api-client:** update skill documentation for sales documents and query behavior ([41aa0a1](https://github.com/gigerIT/bexio-api-client/commit/41aa0a1a89221a9842b99898b5f3eea345f4a61d))


### Continuous Integration

* allow Release job to continue on error ([6a18cba](https://github.com/gigerIT/bexio-api-client/commit/6a18cba67f2166092d3f8eb680ae54240f1436c1))
* include maintenance commits in release notes ([158baf2](https://github.com/gigerIT/bexio-api-client/commit/158baf25f51dda9e68c6bb9d375bb1a99ba72ebb))
* patch release-please merge commit query ([ab5413c](https://github.com/gigerIT/bexio-api-client/commit/ab5413c524b3a9d94f269e2a5da3a04c96fae357))
* reduce release-please commit batch size ([a0b45a4](https://github.com/gigerIT/bexio-api-client/commit/a0b45a4cb25ddd503d04041949d7a489855bbf25))
* tolerate direct commits in release wrapper ([bafcc48](https://github.com/gigerIT/bexio-api-client/commit/bafcc485756b7c86e550054cf9614f466f80b1e0))
* use release-please manifest config ([ec6a2de](https://github.com/gigerIT/bexio-api-client/commit/ec6a2de254dde7e94097a4fbd950f930e2bf0b6b))


### Miscellaneous Chores

* **dependabot:** configure to ignore major updates for release-please-action ([c1e34af](https://github.com/gigerIT/bexio-api-client/commit/c1e34af07943f214498ecbd75476f9571b9a425d))

## [4.8.1](https://github.com/gigerIT/bexio-api-client/compare/v4.8.0...v4.8.1) (2026-04-27)


### Bug Fixes

* **orders:** defer article positions during creation ([a16601f](https://github.com/gigerIT/bexio-api-client/commit/a16601fabbfab229ad28d0ee3eee883089f781ea))

## [4.8.0](https://github.com/gigerIT/bexio-api-client/compare/v4.7.0...v4.8.0) (2026-04-27)


### Features

* **sales:** introduce shared sales document query builders for invoices, orders, and quotes ([4f559db](https://github.com/gigerIT/bexio-api-client/commit/4f559dbd7ef7a202c332d6b168265cc2d46e7ee4))


### Bug Fixes

* **tests:** enhance payment retrieval logic and adjust test parameters ([7555e6d](https://github.com/gigerIT/bexio-api-client/commit/7555e6d6096e883a7d06636210ab5dc5edbfd91b))

## [4.7.0](https://github.com/gigerIT/bexio-api-client/compare/v4.6.0...v4.7.0) (2026-04-26)


### Features

* complete remaining API endpoints ([3adf38a](https://github.com/gigerIT/bexio-api-client/commit/3adf38aa1c12fc0c318fb6d1bb4b200c4a59a076))
* complete remaining API endpoints ([5c14d47](https://github.com/gigerIT/bexio-api-client/commit/5c14d47ab03971a27beb394b637e41d4edbbe8f4))

## [4.6.0](https://github.com/gigerIT/bexio-api-client/compare/v4.5.1...v4.6.0) (2026-04-26)


### Features

* **sales/orders:** enhance order management with repetition and PDF functionalities ([467cc2f](https://github.com/gigerIT/bexio-api-client/commit/467cc2fa2b66d0cbfc17923e3a5e4c7e31d5a521))
* **sales/orders:** implement document conversion for quotes and orders ([a77b19a](https://github.com/gigerIT/bexio-api-client/commit/a77b19a50a5403f5e67483ae56f1843db182640e))


### Bug Fixes

* **phpstan:** resolve level 5 analysis errors ([0b1f3d0](https://github.com/gigerIT/bexio-api-client/commit/0b1f3d0a253cc621657db0f7d1d1401e6d09fe87))
* **tests:** update order and quote ID assertions to use greater than or equal comparison ([eb449b6](https://github.com/gigerIT/bexio-api-client/commit/eb449b6a71a527f2e12c5cf5dff6079d296d0a88))


### Miscellaneous Chores

* add parallel testing command to composer.json ([61c5cce](https://github.com/gigerIT/bexio-api-client/commit/61c5cceb1317c8697ccf6c7a0faa234368e009d3))

## [4.5.1](https://github.com/gigerIT/bexio-api-client/compare/v4.5.0...v4.5.1) (2026-04-24)


### Miscellaneous Chores

* add additional default Bexio API scopes for email and company profile ([0b26ab7](https://github.com/gigerIT/bexio-api-client/commit/0b26ab7eb62b18004c9359ac60662abd02ff788a))
* **deps:** bump googleapis/release-please-action from 4 to 5 ([59eaa54](https://github.com/gigerIT/bexio-api-client/commit/59eaa542eec5c3c21468faec29774d063cb64209))
* **deps:** bump googleapis/release-please-action from 4 to 5 ([70b55d5](https://github.com/gigerIT/bexio-api-client/commit/70b55d561ec30365f07bdadf9e6aeacbad427ae5))

## [4.5.0](https://github.com/gigerIT/bexio-api-client/compare/v4.4.0...v4.5.0) (2026-04-01)


### Features

* add invoice reminder search support ([fd81850](https://github.com/gigerIT/bexio-api-client/commit/fd8185093f62a1eb72de3323fe6e0bc55aea65d1))
* add note and task search support ([57a5bab](https://github.com/gigerIT/bexio-api-client/commit/57a5bab60539eaf046e0028e3f7ae51a2635c3c1))
* add quote search query support ([4fd1eee](https://github.com/gigerIT/bexio-api-client/commit/4fd1eeece9c192ba88f3ea599c7803ef64d28cea))

## [4.4.0](https://github.com/gigerIT/bexio-api-client/compare/v4.3.0...v4.4.0) (2026-04-01)


### Features

* add accounting search query support ([c5bc3e4](https://github.com/gigerIT/bexio-api-client/commit/c5bc3e49daf40561df517c37377745312a6b7e88))
* add search support for lookup resources ([3807877](https://github.com/gigerIT/bexio-api-client/commit/38078772e2f8f2fcf3bc5ac5fe020e1f763773cd))


### Bug Fixes

* wire order index pagination and sorting ([0ace8c8](https://github.com/gigerIT/bexio-api-client/commit/0ace8c8665b09c3de66a6975cfe97a8ddcecf23a))

## [4.3.0](https://github.com/gigerIT/bexio-api-client/compare/v4.2.1...v4.3.0) (2026-04-01)


### Features

* add order search query support ([2734b75](https://github.com/gigerIT/bexio-api-client/commit/2734b7549beced3dce33cd309539056aaa0b3519))

## [4.2.1](https://github.com/gigerIT/bexio-api-client/compare/v4.2.0...v4.2.1) (2026-03-31)


### Bug Fixes

* Update namespace typo for ApiScope enum ([3270ee8](https://github.com/gigerIT/bexio-api-client/commit/3270ee891627d3f081ea39dbd700da1b061fb587))

## [4.2.0](https://github.com/gigerIT/bexio-api-client/compare/v4.1.0...v4.2.0) (2026-03-31)


### Features

* Introduce ApiScope helper enum for managing API access scopes ([532324e](https://github.com/gigerIT/bexio-api-client/commit/532324e46d8565c8288ce39f62b90ff94c8c5164))


### Miscellaneous Chores

* bump deps ([8e0fe5e](https://github.com/gigerIT/bexio-api-client/commit/8e0fe5e9d7a74998cafe5e283b357b8e52a73f11))
* **deps:** bump ramsey/composer-install from 3 to 4 ([596bc44](https://github.com/gigerIT/bexio-api-client/commit/596bc444472d24c4e7fb01b6ff00118afafafc44))
* **deps:** bump ramsey/composer-install from 3 to 4 ([6bd3dfb](https://github.com/gigerIT/bexio-api-client/commit/6bd3dfb5225f487ba21b3c42944470d44f7ec691))

## [4.1.0](https://github.com/gigerIT/bexio-api-client/compare/v4.0.0...v4.1.0) (2026-03-27)


### Features

* Add label and color methods to InvoiceStatus enum ([1c0b6e3](https://github.com/gigerIT/bexio-api-client/commit/1c0b6e3517fe1ac3a6a8910f6601de4757454e20))

## [4.0.0](https://github.com/gigerIT/bexio-api-client/compare/v3.2.0...v4.0.0) (2026-03-26)


### ⚠ BREAKING CHANGES

* v4 as Laravel Package
* This package now requires Laravel 10+

### Features

* v4 as Laravel Package ([168e121](https://github.com/gigerIT/bexio-api-client/commit/168e12137725007f123030695041bd62e5523128))


### Bug Fixes

* expose invoice reporting fields safely ([ed15202](https://github.com/gigerIT/bexio-api-client/commit/ed15202c1371e3e08f6a8d769d69cf7e7c483180))
* finalize Laravel package release readiness ([5910419](https://github.com/gigerIT/bexio-api-client/commit/5910419abcc627f59a4e7f5f9d1babbb4b9b68eb))
* hydrate missing sales item position types ([78c0f97](https://github.com/gigerIT/bexio-api-client/commit/78c0f975caad8fe180cd4506b7ac1f1015e6171d))


### Miscellaneous Chores

* Specify exact versions for illuminate/container ([613a2b3](https://github.com/gigerIT/bexio-api-client/commit/613a2b3534e43e6d0bcff6c247d25ae7f378895c))
* Update composer.json to support new versions of dependencies ([132bd28](https://github.com/gigerIT/bexio-api-client/commit/132bd28520d1143b2c8506c998444f229aaef774))
* Update composer.lock with new dependencies ([6f748d0](https://github.com/gigerIT/bexio-api-client/commit/6f748d0cdaad4f06d5247aaa751e4bc7600ec7e5))


### Code Refactoring

* Convert to Laravel package and remove spatie-data-standalone ([8989b01](https://github.com/gigerIT/bexio-api-client/commit/8989b017da2cf9eaac3cf3d69f81967eaf1af568))

## [3.2.0](https://github.com/gigerIT/bexio-api-client/compare/v3.1.1...v3.2.0) (2025-12-11)


### Features

* add Outgoing Payments resource and related request classes ([42f3e4e](https://github.com/gigerIT/bexio-api-client/commit/42f3e4eb0772cebe065579f6fc268e2190795555))
* implement Account Groups, Calendar Years, Business Years, Manual Entries, and VAT Periods resources ([933f793](https://github.com/gigerIT/bexio-api-client/commit/933f793c4b6517d173f2521f5f681ce8222eb136))
* implement Banking resources including Bank Accounts, Payments, and QR Payments ([d44cfde](https://github.com/gigerIT/bexio-api-client/commit/d44cfde8611f8147c9a9c2549ebddcbb988f97b9))
* implement Business Activities, Communication Types, Projects, and Timesheets resources with related request classes ([75ddf63](https://github.com/gigerIT/bexio-api-client/commit/75ddf632011c5174d3be14d9d4d69d2709c7a160))
* implement countries, languages, notes, payment types, permissions, tasks, units, and user management resources ([61e78c5](https://github.com/gigerIT/bexio-api-client/commit/61e78c5c58a6f7d647e900100815717e43cc537a))
* implement File resource and related request classes ([31d9898](https://github.com/gigerIT/bexio-api-client/commit/31d9898968d6b400e52ae3a266792542471f908c))
* implement Items and Stock Areas resources with related request classes ([10c0250](https://github.com/gigerIT/bexio-api-client/commit/10c025068968dbf9020554e8dc9f81c3863ba11d))
* implement Orders, Deliveries, Document Settings, and Document Templates resources ([43c4133](https://github.com/gigerIT/bexio-api-client/commit/43c4133ec5b6c994457e43e24b08759aec78810d))


### Bug Fixes

* update address property in Contact class to remove default value ([d98442a](https://github.com/gigerIT/bexio-api-client/commit/d98442ad39f1648851cdb64661d37d329078c534))
* update default headers in BexioClient to use 'Accept' instead of 'Content-Type' ([f92e465](https://github.com/gigerIT/bexio-api-client/commit/f92e46537dddf39d6b4ca2ae436ebe0472b8b235))


### Miscellaneous Chores

* **deps:** bump actions/checkout from 5 to 6 ([386f680](https://github.com/gigerIT/bexio-api-client/commit/386f68039019e0d46dcd38ff912cbfec0a753691))
* **deps:** bump actions/checkout from 5 to 6 ([da1786d](https://github.com/gigerIT/bexio-api-client/commit/da1786d6623379b8911cb3759a8d45b0e3e3ada6))
* increase memory limit for PHPStan analysis in composer.json ([6f90c09](https://github.com/gigerIT/bexio-api-client/commit/6f90c0961f8a3d9d42fa4c343794d59d9aafebdd))
* update PHP version to 8.4 in composer.json and CI workflow ([fd97431](https://github.com/gigerIT/bexio-api-client/commit/fd9743136937ff85fa64e15e9f68e625aa253c7a))

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
