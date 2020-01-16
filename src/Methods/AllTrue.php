<?php

namespace Boool\Methods;

use Boool\CommonMethods;
use Boool\MethodInterface;

class AllTrue extends CommonMethods implements MethodInterface {

    protected array $alias = ['OnlyTrue', 'EverythingTrue'];

    /**
     * @param array $array
     * @return bool
     */
    public function handle($array = []) : bool
    {
        foreach ($array as $statement) {
            if ($statement === false) {
                return false;
            }
        }
        return true;
    }

}
