<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        naming: false,
        instanceOf: true,
        earlyReturn: true,
        strictBooleans: true
    )
    ->withPhpSets()
    ->withComposerBased(
        twig: true,
        doctrine: true,
        phpunit: true,
        symfony: true,
        netteUtils: true,
        laravel: true
    )
    ->withAttributesSets(symfony: true, phpunit: true);
