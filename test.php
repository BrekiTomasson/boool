<?php

use Boool\Boool;

include './vendor/autoload.php';

$boool = Boool::getInstance();

$test1 = $boool->test('onlytrue', [true, true, true, true]);
$test2 = $boool->test('onlytrue', [true, true, false, true]);
$test3 = $boool->test('AllTRUE', [false, false, false, false]);


var_dump($test1);
var_dump($test2);
var_dump($test3);
