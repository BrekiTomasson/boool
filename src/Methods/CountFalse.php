<?php

declare(strict_types=1);

namespace Boool\Methods;

use Boool\CommonMethods;
use Boool\Exceptions\NotAnInteger;
use Boool\MethodInterface;

class CountFalse extends CommonMethods implements MethodInterface
{
    protected array $alias = ['AmountFalse'];

    public function handle(...$arguments): bool
    {
        if (!isset($arguments[1]) || ! is_int($arguments[1])) {
            throw new NotAnInteger('This method requires an integer as its second argument.');
        }

        return $this->countFalse($arguments[0]) === $arguments[1];
    }
}
