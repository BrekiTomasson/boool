<?php

declare(strict_types=1);

namespace Boool\Methods;

class CountTrue extends \Boool\CommonMethod implements \Boool\MethodInterface
{
    protected array $alias = ['AmountTrue'];

    public function handle(array $arguments): bool
    {
        if ($this->testIntegerArgument($arguments)) {
            return $this->countTrue($arguments[0]) === $arguments[1];
        }
    }
}
