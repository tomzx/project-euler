<?php

use tomzx\ProjectEuler\Math;

require_once 'vendor/autoload.php';

function q5($number) {
	$numbers = range(1, $number);
	return Math::leastCommonMultiple($numbers);
}

assert(2520 === q5(10));
echo q5(20);
