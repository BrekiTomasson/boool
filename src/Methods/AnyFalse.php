<?php

declare(strict_types=1);

namespace Boool\Methods;

class AnyFalse extends \Boool\CommonMethod implements \Boool\MethodInterface
{
    protected array $alias = ['ContainsFalse', 'HasFalse'];

    public function handle(array $arguments): bool
    {
        return $this->countFalse($arguments[0]) >= 1;
    }
}
