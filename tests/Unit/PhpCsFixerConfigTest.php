<?php

declare(strict_types=1);

namespace Valantic\PhpCsFixerConfig\Tests\Unit;

use PhpCsFixer\Config;
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

        $this->assertArrayHasKey('@autoPHPMigration', $rules);
        $this->assertArrayHasKey('@autoPHPMigration:risky', $rules);
        $this->assertArrayHasKey('@PER-CS3.0', $rules);
        $this->assertArrayHasKey('@PER-CS3.0:risky', $rules);
        $this->assertArrayHasKey('@Symfony', $rules);
        $this->assertArrayHasKey('@Symfony:risky', $rules);
        $this->assertArrayHasKey('array_push', $rules);
        $this->assertArrayHasKey('yoda_style', $rules);
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
        $this->assertArrayHasKey('@PER-CS3.0', $rules);
        $this->assertArrayHasKey('@PER-CS3.0:risky', $rules);
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
}
