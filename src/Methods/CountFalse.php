<?php

declare(strict_types=1);

namespace Boool\Methods;

class CountFalse extends \Boool\CommonMethod implements \Boool\MethodInterface
{
    protected array $alias = ['AmountFalse'];

    public function handle(array $arguments): bool
    {
        if ($this->testIntegerArgument($arguments)) {
            return $this->countFalse($arguments[0]) === $arguments[1];
        }
    }
}
