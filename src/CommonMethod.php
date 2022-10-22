<?php

declare(strict_types=1);

namespace Boool;

use Boool\Exceptions\InvalidValue;
use Boool\Exceptions\NotAnInteger;

class CommonMethod
{
    protected array $alias = [];

    public function countFalse(array $array): int
    {
        return $this->getResults($array)['false'];
    }

    public function countTrue(array $array): int
    {
        return $this->getResults($array)['true'];
    }

    public function getName(): string
    {
        $name = explode('\\', static::class);

        return array_pop($name);
    }

    public function getResults(array $array): array
    {
        $false = 0;
        $true = 0;

        foreach ($array as $statement) {
            if ($statement === false) {
                $false++;
            } elseif ($statement === true) {
                $true++;
            }
        }

        return ['true' => $true, 'false' => $false];
    }

    public function percentFalse(array $array): float
    {
        return ($this->getResults($array)['false'] / count($array)) * 100;
    }

    public function percentTrue(array $array): float
    {
        return ($this->getResults($array)['true'] / count($array)) * 100;
    }

    public function registerSelf(): void
    {
        Boool::register($this->getName(), $this);

        foreach ($this->alias as $alias) {
            Boool::register($alias, $this);
        }
    }

    /** @throws InvalidValue|NotAnInteger */
    protected function testIntegerArgument(array $arguments): bool
    {
        if (! isset($arguments[1]) || ! is_int($arguments[1])) {
            throw new NotAnInteger('This method requires an integer as its second argument.');
        }

        if ($arguments[1] <= 0) {
            throw new InvalidValue('The integer passed cannot be zero or negative.');
        }

        if ($arguments[1] > count($arguments[0])) {
            throw new InvalidValue('The integer passed is larger than the amount of entries in the array.');
        }

        return true;
    }
}
