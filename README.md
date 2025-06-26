# PHP-CS-Fixer Config for Valantic Projects

This package provides standard PHP-CS-Fixer configurations used in projects built by Valantic.

## Installation

```bash
composer require --dev valantic/php-cs-fixer-config
```

## Usage

Create a `.php-cs-fixer.php` file in your project root with one of the following configurations:

### Basic Configuration

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Valantic\PhpCsFixerConfig\ConfigFactory;

$config = ConfigFactory::createValanticConfig();

$config->setFinder(
    PhpCsFixer\Finder::create()
        ->in(__DIR__ . '/src')
        ->in(__DIR__ . '/tests')
);

return $config;
```

### Opinionated Configuration

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Valantic\PhpCsFixerConfig\ConfigFactory;

$config = ConfigFactory::createValanticOpinionatedConfig();

$config->setFinder(
    PhpCsFixer\Finder::create()
        ->in(__DIR__ . '/src')
        ->in(__DIR__ . '/tests')
);

return $config;
```

### Custom Configuration

You can also customize the configuration by adding additional rules:

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Valantic\PhpCsFixerConfig\ConfigFactory;

$config = ConfigFactory::createValanticConfig([
    'array_syntax' => ['syntax' => 'short'],
    // Add your custom rules here
]);

$config->setFinder(
    PhpCsFixer\Finder::create()
        ->in(__DIR__ . '/src')
        ->in(__DIR__ . '/tests')
);

return $config;
```

## Available Rulesets

- **valantic**: Basic ruleset that every project agrees with (automatically includes PHP version specific migration rules based on the current PHP version)
- **valantic:risky**: Risky ruleset that includes additional rules marked as risky (automatically includes PHP version specific migration rules based on the current PHP version)
- **valantic:opinionated**: Opinionated ruleset based on discussions

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

## License

MIT
