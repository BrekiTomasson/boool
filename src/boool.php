<?php

declare(strict_types=1);

/**
 * Class boool
 *
 * This class implements a returnable value that can take the place of 'bool' in certain very specific scenarios.
 * Please don't use this as a replacement for proper separation of concerns or error handling. Also, read the README.
 * That's what it's for.
 */
class boool {

    private $falseValues = ['string' => 'false', 'bool' => false, 'int' => 0];
    private $trueValues = ['string' => 'true', 'bool' => true, 'int' => 1];
    private $maybeValues = ['string' => 'maybe', 'int' => 2];

    private $as = '';
    private $boool = 0;
    private $value = 0;
    private $throwException = 0;

    final private function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString() : string
    {
        return $this->boool->value['string'];
    }

    public function asInteger() : boool
    {
        $this->as = 'int';
        return $this;
    }

}
