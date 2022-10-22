<?php

declare(strict_types=1);

namespace Boool\Methods;

use Boool\CommonMethods;
use Boool\MethodInterface;

class AllFalse extends CommonMethods implements MethodInterface
{
    protected array $alias = ['OnlyFalse', 'EverythingFalse', 'NoTrue'];

    public function handle(...$arguments): bool
    {
        return ! (in_array(true, $arguments[0], true));
    }
}
