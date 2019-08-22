<?php

namespace Boool\Traits;

use Boool\Contracts\Parser;
use function array_diff;
use function scandir;
use function substr;
use function var_dump;

trait ManagesParsers {
    public $parsers;

    protected function loadParsers() : void
    {
        $booolDirectory = __DIR__;
        $parsers = array_diff(scandir($booolDirectory . '/../Parsers'), ['.', '..']);

        foreach ($parsers as $parser) {
            if (substr($parser, -4) === '.php') {
                $parser = "Boool\\Parsers\\" . substr($parser, 0, -4);
                $this->registerParser(new $parser);
            }
        }
    }

    /**
     * @param Parser $parser
     *
     * @throws \Exception
     */
    protected function registerParser(Parser $parser) : void
    {
        $this->parsers[] = $parser->name();
    }
}
