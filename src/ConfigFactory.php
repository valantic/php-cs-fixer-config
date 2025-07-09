<?php

declare(strict_types=1);

namespace Valantic\PhpCsFixerConfig;

use PhpCsFixer\Config;

class ConfigFactory
{
    /**
     * @param array<string, bool|array<string, mixed>> $additionalRules
     */
    public static function createValanticConfig(array $additionalRules = []): Config
    {
        $config = new Config();
        $config->setRules([
            ...RuleSet::getValanticRules(),
            ...$additionalRules,
        ]);

        return $config;
    }
}
