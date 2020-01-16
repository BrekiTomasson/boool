<?php

namespace Boool;

class CommonMethods {

    /**
     * @return string
     */
    public function getName() : string
    {
        $name = explode('\\', __CLASS__);

        return array_pop($name);
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

        return ['true' => $true, 'false' => $false];
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
     * @return float
     */
    public function percentFalse(array $array) : float
    {
        $count = count($array);

        $values = $this->getResults($array);

        return ($values['false']/$count) * 100;
    }

}
