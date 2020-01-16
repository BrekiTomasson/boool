<?php

namespace Boool\Methods;

use Boool\CommonMethods;
use Boool\MethodInterface;

class mostlyTrue extends CommonMethods implements MethodInterface {

    /**
     * @param array $array
     * @return bool
     */
    public function handle(array $array = []) : bool
    {
        return $this->percentTrue($array) > 50;
    }

}
