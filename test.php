<?php

use Boool\Boool;

include './vendor/autoload.php';

$result = Boool::mostlyFalse([
    1+1===1,
    1+2===1,
    1+1===2,
    9-1===8
]);

var_dump($result);
