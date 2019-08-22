<?php

namespace Boool\Contracts;

use Boool\Exceptions\MethodNotImplemented;
use RuntimeException;

abstract class Parser {

    public $array = [];

    public $method = '';

    public function name() : array
    {
        if ($this->method === '') {
            throw new MethodNotImplemented('Remember to name your $method.');
        }

        return [$this->method => get_class($this)];
    }

    /**
     * @param array $array
     *
     * @return Parser
     */
    abstract public function make(array $array) : self;

    abstract public function validate() : void;

}
