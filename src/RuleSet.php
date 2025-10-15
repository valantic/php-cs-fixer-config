<?php

declare(strict_types=1);

namespace Valantic\PhpCsFixerConfig;

class RuleSet
{
    /**
     * @return array<string, bool|array<string, mixed>>
     */
    public static function getValanticRules(): array
    {
        return [
            '@autoPHPMigration' => true,
            '@autoPHPMigration:risky' => true,
            '@PER-CS' => true,
            '@PER-CS:risky' => true,
            '@Symfony' => true,
            '@Symfony:risky' => true,
            'array_push' => false,
            'native_constant_invocation' => false,
            'native_function_invocation' => false,
            'no_useless_return' => true,
            'self_accessor' => false, // do not enable self_accessor as it breaks pimcore models relying on get_called_class()
            'strict_comparison' => true,
            'strict_param' => true,
            'yoda_style' => [
                'equal' => false,
                'identical' => false,
                'less_and_greater' => false,
            ],
            'blank_line_before_statement' => [
                'statements' => [
                    'break',
                    'case',
                    'continue',
                    'declare',
                    'default',
                    'do',
                    'exit',
                    'for',
                    'foreach',
                    'goto',
                    'if',
                    'include',
                    'include_once',
                    // 'phpdoc',
                    'require',
                    'require_once',
                    'return',
                    'switch',
                    'throw',
                    'try',
                    'while',
                    'yield',
                    'yield_from',
                ],
            ],
            'concat_space' => ['spacing' => 'one'],
            'declare_strict_types' => true,
            'increment_style' => [
                'style' => 'post',
            ],
            'method_argument_space' => [
                'attribute_placement' => 'standalone',
                'on_multiline' => 'ensure_fully_multiline',
            ],
            'method_chaining_indentation' => true,
            'multiline_comment_opening_closing' => true,
            'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
            'no_superfluous_phpdoc_tags' => ['allow_hidden_params' => false, 'remove_inheritdoc' => true],
            'no_unset_on_property' => true,
            'no_useless_else' => true,
            'ordered_class_elements' => [
                'order' => [
                    'use_trait',
                    'case',
                    'constant',
                    'constant_public',
                    'constant_protected',
                    'constant_private',
                    'property',
                    'property_public_abstract',
                    'property_protected_abstract',
                    'property_static',
                    'property_public_static',
                    'property_protected_static',
                    'property_private_static',
                    'property_public',
                    'property_protected',
                    'property_private',
                    'construct',
                    'destruct',
                    'magic',
                    'phpunit',
                    'method',
                    'method_abstract',
                    'method_public_abstract',
                    'method_public_abstract_static',
                    'method_protected_abstract',
                    'method_protected_abstract_static',
                    'method_private_abstract',
                    'method_private_abstract_static',
                    'method_static',
                    'method_public_static',
                    'method_protected_static',
                    'method_private_static',
                    'method_public',
                    'method_protected',
                    'method_private',
                ],
            ],
            'phpdoc_align' => ['align' => 'left', 'spacing' => 1],
            'phpdoc_to_comment' => true,
            'phpdoc_annotation_without_dot' => false,
            'ordered_imports' => [
                'imports_order' => ['class', 'function', 'const'],
                'sort_algorithm' => 'alpha',
            ],
            'regular_callable_call' => true,
            'return_assignment' => true,
            'single_line_throw' => false,
            'trailing_comma_in_multiline' => [
                'after_heredoc' => true,
                'elements' => ['arguments', 'array_destructuring', 'arrays', 'match', 'parameters'],
            ],
        ];
    }
}
