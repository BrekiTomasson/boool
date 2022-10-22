<?php

declare(strict_types=1);

namespace Boool\Methods;

class AnyTrue extends \Boool\CommonMethod implements \Boool\MethodInterface
{
    protected array $alias = ['Any', 'ContainsTrue', 'HasTrue'];

    public function handle(array $arguments): bool
    {
        return $this->countTrue($arguments[0]) >= 1;
    }
}
