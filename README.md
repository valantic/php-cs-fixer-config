# PHP-CS-Fixer Config for Valantic Projects

This package provides standard PHP-CS-Fixer configurations used in projects built by Valantic.

## Installation

```bash
composer require --dev valantic/php-cs-fixer-config
```

> **Note:** This package requires PHP 8.1 or higher.

## Usage

Create a `.php-cs-fixer.php` or `.php-cs-fixer.dist.php` file in your project root with one of the following configurations:

### Basic Configuration

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Valantic\PhpCsFixerConfig\ConfigFactory;

return ConfigFactory::createValanticConfig([
        'declare_strict_types' => false,
        // Add your custom rules here
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__ . '/src')
            ->in(__DIR__ . '/tests')
    )
    // Enable risky rules (recommended as the ruleset includes risky rules)
    ->setRiskyAllowed(true)
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
