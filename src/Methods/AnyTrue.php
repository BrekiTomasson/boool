<?php

declare(strict_types=1);

namespace Boool\Methods;

use Boool\CommonMethods;
use Boool\MethodInterface;

class AnyTrue extends CommonMethods implements MethodInterface
{
    protected array $alias = ['Any', 'ContainsTrue', 'HasTrue'];

    public function handle(...$arguments): bool
    {
        return $this->countTrue($arguments[0]) >= 1;
    }
}
