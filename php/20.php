<?php

use tomzx\ProjectEuler\Math;

require_once 'vendor/autoload.php';

function q20($n)
{
	$factorial = 1;
	for ($i = 2; $i <= $n; ++$i) {
		$factorial = bcmul($factorial, $i);
	}

	$digits = str_split($factorial);
	$sum = 0;
	foreach ($digits as $digit) {
		$sum += (int)$digit;
	}
	return $sum;
}

echo q20(100);
