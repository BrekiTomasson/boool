<?php

declare(strict_types=1);

namespace Boool;

interface MethodInterface
{
    public function handle(array $arguments): bool;
}
