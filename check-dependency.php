<?php


$packageName = 'laravel/framework';
$optionalPackage = 'gigerit/spatie-laravel-data-standalone';

// Check if the package is installed
$installed = false;
exec("composer show -N", $output);
foreach ($output as $line) {
    if (strpos($line, $packageName) !== false) {
        $installed = true;
        break;
    }
}

// If the optional package is not installed and the main package is not installed, add the optional package
if (!$installed) {
    exec("composer require $optionalPackage");
}
