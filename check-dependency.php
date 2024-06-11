<?php

$packageName = 'laravel/framework';
$optionalPackage = 'gigerit/spatie-laravel-data-standalone';

// Function to check if a package is installed
function isPackageInstalled($packageName)
{
    exec("composer show -N", $output, $returnVar);
    if ($returnVar !== 0) {
        echo "Error: Unable to execute 'composer show'.\n";
        exit(1);
    }
    foreach ($output as $line) {
        if (strpos($line, $packageName) !== false) {
            return true;
        }
    }
    return false;
}

// Check if the main package is installed
$mainPackageInstalled = isPackageInstalled($packageName);

// Check if the optional package is installed
$optionalPackageInstalled = isPackageInstalled($optionalPackage);

// If the main package is not installed and the optional package is not installed, add the optional package
if (!$mainPackageInstalled && !$optionalPackageInstalled) {
    echo "$packageName is not installed. Installing $optionalPackage...\n";
    exec("composer require $optionalPackage", $requireOutput, $requireReturnVar);
    if ($requireReturnVar !== 0) {
        echo "Error: Unable to require $optionalPackage.\n";
        exit(1);
    } else {
        echo "$optionalPackage has been successfully installed.\n";
    }
} elseif ($mainPackageInstalled) {
    echo "$packageName is already installed.\n";
} elseif ($optionalPackageInstalled) {
    echo "$optionalPackage is already installed.\n";
}
