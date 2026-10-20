<?php

require dirname(__DIR__) . '/vendor/autoload.php';

// Keep this PR-only test mode independent of local .env files and live accounts.
foreach (['BEXIO_ACCESS_TOKEN', 'TEST_API_KEY'] as $name) {
    putenv($name . '=');
    $_ENV[$name] = '';
    $_SERVER[$name] = '';
}

\Saloon\Config::preventStrayRequests();
\Saloon\MockConfig::throwOnMissingFixtures();
