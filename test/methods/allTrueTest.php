<?php

namespace BooolTest\Methods;

use Boool\Boool;
use PHPUnit\Framework\TestCase;

class allTrueTest extends TestCase {

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

        self::assertFalse(Boool::allTrue($allFalse));
        self::assertTrue(Boool::allTrue($allTrue));
    }
}
