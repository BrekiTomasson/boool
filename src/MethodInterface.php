<?php

namespace Boool;

interface MethodInterface {

    /**
     * @param array $array
     * @return bool
     */
    public function handle(array $array = []) : bool;

}