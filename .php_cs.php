<?php
return PhpCsFixer\Config::create()
    ->setRules(array(
        '@PSR2' => true,
        '@Symfony' => true,
        'constant_case' => true,
        'lowercase_keywords' => true,
        'native_function_casing' => true,
        'native_function_type_declaration_casing' => true,
        'class_attributes_separation' => true,
        'class_definition' => true,
        'visibility_required' => true,
        'no_blank_lines_after_class_opening' => true,
        'linebreak_after_opening_tag' => true,
        'ordered_imports' => true,
        'method_argument_space' => [
            'ensure_fully_multiline' => false
        ],
    ))
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->name('*.php')
            ->in(__DIR__ . '/src')
            ->in(__DIR__ . '/tests')
    );
