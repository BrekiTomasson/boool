<?php

namespace Boool\Methods;

use Boool\CommonMethods;
use Boool\MethodInterface;

class AllFalse extends CommonMethods implements MethodInterface {

    /**
     * @param array $array
     * @return bool
     */
    public function handle($array = []) : bool
    {
        foreach ($array as $statement) {
            if ($statement === true) {
                return false;
            }
        }
        return true;
    }

}
