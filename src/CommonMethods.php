<?php

namespace Boool;

class CommonMethods {

    /**
     * @var array Other names that can be used to call the Methods.
     */
    protected array $alias = [];

    /**
     * @return string
     */
    public function getName() : string
    {
        $name = explode('\\', get_class($this));
        return array_pop($name);
    }

    /**
     * This method should be run by each of the Method Classes when creating the singleton,
     * as it registers the Method Classes and makes them available.
     */
    public function registerSelf()
    {
        Boool::register($this->getName(), $this);

        foreach ($this->alias as $alias) {
            Boool::register($alias, $this);
        }
    }

    /**
     * @param array $array
     * @return array
     */
    public function getResults(array $array) : array
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

        return [
            'true' => $true,
            'false' => $false
        ];
    }

    /**
     * @param array $array
     * @return float
     */
    public function percentTrue(array $array) : float
    {
        $count = count($array);

        $values = $this->getResults($array);

        return ($values['true']/$count) * 100;
    }

    /**
     * @param array $array
     * @return int
     */
    public function countTrue(array $array) : int
    {
        return $this->getResults($array)['true'];
    }

    /**
     * @param array $array
     * @return float
     */
    public function percentFalse(array $array) : float
    {
        $count = count($array);

        $values = $this->getResults($array);

        return ($values['false']/$count) * 100;
    }

    public function countFalse(array $array) : int
    {
        return $this->getResults($array)['false'];
    }

}
