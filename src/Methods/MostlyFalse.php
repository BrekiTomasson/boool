<?php

declare(strict_types=1);

namespace Boool\Methods;

use Boool\CommonMethods;
use Boool\MethodInterface;

class MostlyFalse extends CommonMethods implements MethodInterface
{
    public function handle(...$arguments): bool
    {
        return $this->percentFalse($arguments[0]) > 50;
    }
}
