<?php

declare(strict_types=1);

namespace Boool\Methods;

class AllFalse extends \Boool\CommonMethod implements \Boool\MethodInterface
{
    protected array $alias = ['OnlyFalse', 'EverythingFalse', 'NoTrue'];

    public function handle(array $arguments): bool
    {
        return ! (in_array(true, $arguments[0], true));
    }
}
