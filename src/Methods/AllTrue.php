<?php

declare(strict_types=1);

namespace Boool\Methods;

use Boool\CommonMethods;
use Boool\MethodInterface;

class AllTrue extends CommonMethods implements MethodInterface
{
    protected array $alias = ['All', 'OnlyTrue', 'EverythingTrue', 'NoFalse'];

    public function handle(...$arguments): bool
    {
        if (in_array(false, $arguments[0], true)) {
            return false;
        }

        return true;
    }
}
