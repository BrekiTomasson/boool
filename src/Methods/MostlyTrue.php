<?php

declare(strict_types=1);

namespace Boool\Methods;

class MostlyTrue extends \Boool\CommonMethod implements \Boool\MethodInterface
{
    protected array $alias = ['Most'];

    public function handle(array $arguments): bool
    {
        return $this->percentTrue($arguments[0]) > 50;
    }
}
