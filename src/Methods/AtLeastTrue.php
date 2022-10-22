<?php

declare(strict_types=1);

namespace Boool\Methods;

class AtLeastTrue extends \Boool\CommonMethod implements \Boool\MethodInterface
{
    public function handle(array $arguments): bool
    {
        if ($this->testIntegerArgument($arguments)) {
            return $this->countTrue($arguments[0]) >= $arguments[1];
        }
    }
}
