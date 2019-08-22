<?php

namespace Boool;

use Boool\Contracts\Parser;
use Boool\Traits\ManagesParsers;


/**
 * Class Boool
 *
 * This class acts as a wrapper around boolean values/statements and offers additional
 * information that can be used to determine the truthiness of multiple booleans.
 */
class Boool {

    use ManagesParsers;

    private $throwException = false;
    protected $statements = [];

    public function __construct() {
        $this->loadParsers();

    }

    public function isTrue($arguments)
    {
        $arguments = $this->wrap($arguments);
        $results = $this->validate($arguments);
        var_dump($results);
    }

    /**
     * Wraps the input into an array if it isn't one already.
     *
     * @param $arguments
     *
     * @return array
     */
    protected function wrap($arguments) : array
    {
        if (!is_array($arguments)) {
            $arguments = [$arguments];
        }

        return $arguments;
    }

    protected function validate(array $argument) {
        $results = [];

        foreach ($argument as $key => $value) {
            $results[] = (bool) $value;
        }

        return $results;
    }

}
