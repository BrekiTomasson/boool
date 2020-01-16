<?php

namespace BooolTest\Methods;

use Boool\Boool;
use PHPUnit\Framework\TestCase;

class allFalseTest extends TestCase {

    public function testHandle()
    {
        $allFalse = [
            'foo' === 'bar',
            1 + 1 === 19,
            'string' === 9
            ];

        $allTrue = [
            4 - 2 === 2,
            1 + 1 === 2,
            \is_string('string') === true
        ];

        self::assertTrue(Boool::allFalse($allFalse));
        self::assertFalse(Boool::allFalse($allTrue));
    }
}
