<?php

declare(strict_types=1);

namespace Boool\Methods;

use Boool\CommonMethods;
use Boool\MethodInterface;

class AnyFalse extends CommonMethods implements MethodInterface
{
    protected array $alias = ['ContainsFalse', 'HasFalse'];

    public function handle(...$arguments): bool
    {
        return $this->countFalse($arguments[0]) >= 1;
    }
}
