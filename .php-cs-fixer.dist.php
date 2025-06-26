<?php

require_once __DIR__ . '/vendor/autoload.php';

use Valantic\PhpCsFixerConfig\ConfigFactory;

return ConfigFactory::createValanticOpinionatedConfig()
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__ . '/src')
            ->in(__DIR__ . '/tests')
    )
    ->setRiskyAllowed(true);
