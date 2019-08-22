<?php

namespace Boool\Parsers;

use Boool\Contracts\Parser;

class IsTrue extends Parser {

    public $array;
    public $method = 'isTrue';

    /**
     * @param array $array
     *
     * @return Parser
     */
    public function make(array $array) : Parser
    {
        $this->array = $array;
    }

    public function validate() : void
    {
        // TODO: Implement validate() method.
    }
}
