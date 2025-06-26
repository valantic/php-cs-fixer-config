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
        $config->setRules(array_merge(RuleSet::getValanticRules(), $additionalRules));

        return $config;
    }

    /**
     * @param array<string, bool|array<string, mixed>> $additionalRules
     */
    public static function createValanticOpinionatedConfig(array $additionalRules = []): Config
    {
        $config = new Config();
        $config->setRules(array_merge(RuleSet::getValanticOpinionatedRules(), $additionalRules));

        return $config;
    }
}
