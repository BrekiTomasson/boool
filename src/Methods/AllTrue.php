<?php

declare(strict_types=1);

namespace Boool\Methods;

class AllTrue extends \Boool\CommonMethod implements \Boool\MethodInterface
{
    protected array $alias = ['All', 'OnlyTrue', 'EverythingTrue', 'NoFalse'];

    public function handle(array $arguments): bool
    {
        return ! (in_array(false, $arguments[0], true));
    }
}
