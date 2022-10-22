<?php

declare(strict_types=1);

namespace Boool\Methods;

class AtLeastHalfTrue extends \Boool\CommonMethod implements \Boool\MethodInterface
{
    public function handle(array $arguments): bool
    {
        return $this->percentTrue($arguments[0]) >= 50;
    }
}
