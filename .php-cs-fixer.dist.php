<?php

/**
 * This file is part of the bugloos/email-bundle project.
 *
 * @copyright (c) Bugloos <https://bugloos.com/>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

$header = <<<'EOF'
    This file is part of the aminkhoshzahmat/country-code project.

    @copyright (c) Amin Khoshzahmat <aminkhoshzahmat@gmail.com>

    For the full copyright and license information, please view
    the LICENSE file that was distributed with this source code.

    @package Aminkhoshzahmat\CountryCode
    EOF;

if (!file_exists(__DIR__ . '/src')) {
    exit(0);
}

$finder = (new PhpCsFixer\Finder())
    ->in([__DIR__ . '/src',])
    ->exclude([__DIR__ . '/vendor']);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PhpCsFixer' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PhpCsFixer:risky' => true,
        '@PHPUnit84Migration:risky' => true,
        '@PSR12' => true,
        '@PSR12:risky' => true,
        '@PHP81Migration' => true,
        '@DoctrineAnnotation' => true,
        'header_comment' => ['header' => $header, 'comment_type' => 'PHPDoc'],
        'linebreak_after_opening_tag' => true,
        'no_php4_constructor' => true,
        'no_useless_else' => true,
        'ordered_class_elements' => true,
        'php_unit_construct' => true,
        'php_unit_strict' => true,
        'phpdoc_no_empty_return' => false,
        'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
        'global_namespace_import' => ['import_constants' => true, 'import_functions' => true, 'import_classes' => true],
    ])
    ->setUsingCache(true)
    ->setRiskyAllowed(true)
    ->setFinder($finder);
