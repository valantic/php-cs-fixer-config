# PHP-CS-Fixer Config for valantic Projects

[![Latest Version on Packagist](https://img.shields.io/packagist/v/valantic/php-cs-fixer-config.svg?style=flat-square)](https://packagist.org/packages/valantic/php-cs-fixer-config)
[![PHPUnit](https://github.com/valantic/php-cs-fixer-config/actions/workflows/phpunit.yml/badge.svg)](https://github.com/valantic/php-cs-fixer-config/actions/workflows/phpunit.yml)
[![Rector](https://github.com/valantic/php-cs-fixer-config/actions/workflows/rector.yml/badge.svg)](https://github.com/valantic/php-cs-fixer-config/actions/workflows/rector.yml)
[![PHP-CS-Fixer](https://github.com/valantic/php-cs-fixer-config/actions/workflows/php-cs-fixer.yml/badge.svg)](https://github.com/valantic/php-cs-fixer-config/actions/workflows/php-cs-fixer.yml)
[![PHPStan](https://github.com/valantic/php-cs-fixer-config/actions/workflows/phpstan.yml/badge.svg)](https://github.com/valantic/php-cs-fixer-config/actions/workflows/phpstan.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/valantic/php-cs-fixer-config.svg?style=flat-square)](https://packagist.org/packages/valantic/php-cs-fixer-config)

This package provides standard PHP-CS-Fixer configurations used in projects built by Valantic.

## Installation

```bash
composer require --dev valantic/php-cs-fixer-config friendsofphp/php-cs-fixer
```

> **Note:** This package requires PHP 8.1 or higher.

> **Note:** `friendsofphp/php-cs-fixer` is _not_ a dependency as to allow the use of e.g. [the Composer bin plugin](https://github.com/bamarni/composer-bin-plugin).

## Usage

Create a `.php-cs-fixer.php` or `.php-cs-fixer.dist.php` file in your project root with one of the following configurations:

### Basic Configuration

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Valantic\PhpCsFixerConfig\ConfigFactory;

return ConfigFactory::createValanticConfig([
        // Add your custom rules here
        'declare_strict_types' => false,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__ . '/src')
            ->in(__DIR__ . '/tests')
    )
    // Enable risky rules (recommended as the ruleset includes risky rules)
    ->setRiskyAllowed(true)
    // Enable parallel execution
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
;
```

## Development

This package provides several Composer scripts to help with development:

```bash
# Run PHP-CS-Fixer in dry-run mode with diff output
composer cs-check

# Run PHP-CS-Fixer to fix code style issues
composer cs-fix

# Run PHPStan for static analysis
composer phpstan

# Run Rector in dry-run mode
composer rector-dry-run

# Run Rector and apply changes
composer rector

# Run PHPUnit tests
composer test

# Run all checks (cs-check, phpstan, rector-dry-run, test)
composer check
```
