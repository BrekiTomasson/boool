<?php

declare(strict_types=1);

namespace Boool;

class CommonMethods
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
        $values = $this->getResults($array);

        return ($values['false'] / count($array)) * 100;
    }

    public function percentTrue(array $array): float
    {
        $values = $this->getResults($array);

        return ($values['true'] / count($array)) * 100;
    }

    public function registerSelf(): void
    {
        Boool::register($this->getName(), $this);

        foreach ($this->alias as $alias) {
            Boool::register($alias, $this);
        }
    }
}
