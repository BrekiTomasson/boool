<?php

namespace Boool\Methods;

use Boool\CommonMethods;
use Boool\MethodInterface;

class MostlyFalse extends CommonMethods implements MethodInterface {

    /**
     * @param array $array
     * @return bool
     */
    public function handle(array $array = []) : bool
    {
        return $this->percentFalse($array) > 50;
    }

}
