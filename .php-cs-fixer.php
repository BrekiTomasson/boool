<?php

use BrekiTomasson\PhpCsFixer\Config\Exceptions\InvalidPhpVersion;
use BrekiTomasson\PhpCsFixer\Config\Factory;
use BrekiTomasson\PhpCsFixer\Config\RuleSet\Php8;

$ruleSet = new Php8();

try {
    $configuration = Factory::fromRuleSet($ruleSet);
    $configuration->getFinder()->in(__DIR__ . '/src');
    $configuration->setCacheFile(__DIR__ . '/.php-cs-fixer.cache');

    return $configuration;
} catch (InvalidPhpVersion $exception) {
    echo 'Failed to generate php-cs-fixer configuration: ' . $exception->getMessage() . PHP_EOL;
}
