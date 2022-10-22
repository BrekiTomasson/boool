<?php

declare(strict_types=1);

namespace Boool\Methods;

use Boool\CommonMethods;
use Boool\MethodInterface;

class MostlyTrue extends CommonMethods implements MethodInterface
{
    protected array $alias = ['Most'];

    public function handle(...$arguments): bool
    {
        return $this->percentTrue($arguments[0]) > 50;
    }
}
