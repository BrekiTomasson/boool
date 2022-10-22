<?php

declare(strict_types=1);

namespace Boool\Methods;

class AtLeastHalfFalse extends \Boool\CommonMethod implements \Boool\MethodInterface
{
    public function handle(array $arguments): bool
    {
        return $this->percentFalse($arguments[0]) >= 50;
    }
}
