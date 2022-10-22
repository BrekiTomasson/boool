<?php

declare(strict_types=1);

namespace Boool\Methods;

class Half extends \Boool\CommonMethod implements \Boool\MethodInterface
{
    protected array $alias = ['HalfTrue', 'HalfFalse'];

    public function handle(array $arguments): bool
    {
        return $this->percentTrue($arguments[0]) === 50.0;
    }
}
