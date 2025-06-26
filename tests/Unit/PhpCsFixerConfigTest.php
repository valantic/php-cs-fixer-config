<?php

declare(strict_types=1);

namespace Valantic\PhpCsFixerConfig\Tests\Unit;

use PhpCsFixer\Config;
use PhpCsFixer\RuleSet\RuleSets;
use PHPUnit\Framework\TestCase;
use Valantic\PhpCsFixerConfig\ConfigFactory;
use Valantic\PhpCsFixerConfig\RuleSet;

class PhpCsFixerConfigTest extends TestCase
{
    /**
     * Test that getValanticRules() returns a non-empty array of rules.
     */
    public function testGetValanticRules(): void
    {
        $rules = RuleSet::getValanticRules();

        $this->assertNotEmpty($rules);

        $this->assertArrayHasKey('@PER-CS2.0', $rules);
        $this->assertArrayHasKey('@PER-CS2.0:risky', $rules);
        $this->assertArrayHasKey('@Symfony', $rules);
        $this->assertArrayHasKey('@Symfony:risky', $rules);
        $this->assertArrayHasKey('array_push', $rules);
        $this->assertArrayHasKey('yoda_style', $rules);

        // Check that PHP version specific rules are included
        $phpVersion = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;
        $version = (int) str_replace('.', '', $phpVersion);

        if ($version >= 80) {
            $this->assertArrayHasKey('@PHP80Migration', $rules);

            // Check if the risky rule set exists
            $availableRuleSets = RuleSets::getSetDefinitionNames();

            if (in_array('@PHP80Migration:risky', $availableRuleSets, true)) {
                $this->assertArrayHasKey('@PHP80Migration:risky', $rules);
            }
        }

        if ($version >= 81) {
            $this->assertArrayHasKey('@PHP81Migration', $rules);
        }
    }

    /**
     * Test that getValanticOpinionatedRules() returns a non-empty array of rules.
     */
    public function testGetValanticOpinionatedRules(): void
    {
        $rules = RuleSet::getValanticOpinionatedRules();

        $this->assertNotEmpty($rules);

        // Check if specific opinionated rules are included
        $expectedOpinionatedRules = [
            'blank_line_before_statement',
            'concat_space',
            'ordered_imports',
            'trailing_comma_in_multiline',
        ];

        foreach ($expectedOpinionatedRules as $rule) {
            $this->assertArrayHasKey($rule, $rules, sprintf("Rule '%s' should be included in the opinionated ruleset", $rule));
        }

        // Check that the opinionated rules extend the valantic rules
        $valanticRules = RuleSet::getValanticRules();

        foreach (array_keys($valanticRules) as $rule) {
            $this->assertArrayHasKey($rule, $rules, sprintf("valantic rule '%s' should be included in the opinionated ruleset", $rule));
        }
    }

    /**
     * Test that createValanticConfig() returns a Config object with the basic ruleset.
     */
    public function testCreateValanticConfig(): void
    {
        $config = ConfigFactory::createValanticConfig();

        $this->assertInstanceOf(Config::class, $config);

        $rules = $config->getRules();
        $this->assertNotEmpty($rules);

        // Check that basic rules are included
        $this->assertArrayHasKey('@PER-CS2.0', $rules);
        $this->assertArrayHasKey('@PER-CS2.0:risky', $rules);
        $this->assertArrayHasKey('@Symfony', $rules);
        $this->assertArrayHasKey('@Symfony:risky', $rules);

        // Check that risky is not allowed by default
        $this->assertFalse($config->getRiskyAllowed());
    }

    /**
     * Test that createValanticConfig() with additional rules merges them correctly.
     */
    public function testCreateValanticConfigWithAdditionalRules(): void
    {
        $additionalRules = [
            'array_syntax' => ['syntax' => 'short'],
            'custom_rule' => true,
        ];

        $config = ConfigFactory::createValanticConfig($additionalRules);

        $rules = $config->getRules();
        $this->assertArrayHasKey('array_syntax', $rules);
        $this->assertArrayHasKey('custom_rule', $rules);
        $this->assertEquals(['syntax' => 'short'], $rules['array_syntax']);
        $this->assertTrue($rules['custom_rule']);
    }

    /**
     * Test that createValanticOpinionatedConfig() returns a Config object with the opinionated ruleset.
     */
    public function testCreateValanticOpinionatedConfig(): void
    {
        $config = ConfigFactory::createValanticOpinionatedConfig();

        $this->assertInstanceOf(Config::class, $config);

        $rules = $config->getRules();
        $this->assertNotEmpty($rules);

        // Check if specific rules are included
        $expectedRules = [
            'blank_line_before_statement',
            'concat_space',
            'ordered_imports',
            'trailing_comma_in_multiline',
        ];

        foreach ($expectedRules as $rule) {
            $this->assertArrayHasKey($rule, $rules, sprintf("Rule '%s' should be included in the opinionated ruleset", $rule));
        }
    }

    /**
     * Test that createValanticOpinionatedConfig() with additional rules merges them correctly.
     */
    public function testCreateValanticOpinionatedConfigWithAdditionalRules(): void
    {
        $additionalRules = [
            'array_syntax' => ['syntax' => 'short'],
            'custom_rule' => true,
        ];

        $config = ConfigFactory::createValanticOpinionatedConfig($additionalRules);

        $rules = $config->getRules();
        $this->assertArrayHasKey('array_syntax', $rules);
        $this->assertArrayHasKey('custom_rule', $rules);
        $this->assertEquals(['syntax' => 'short'], $rules['array_syntax']);
        $this->assertTrue($rules['custom_rule']);
    }
}
