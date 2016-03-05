<?php

function q28($dimension)
{
	if ($dimension === 1) {
		return 1;
	}

	// 1 9 25 -> 1^2 3^2 5^2 ...
	// For each level, we sum the 4 corners values
	// 1 3 5 7 9 13 17 21 25 -> +2 +2 +2 +2 +4 +4 +4 +4
	$sum = 1;
	$current = 1;
	$levels = floor($dimension / 2);
	for ($i = 1; $i <= $levels; ++$i) {
		$delta = 2*$i;
		for ($j = 0; $j < 4; ++$j) {
			$current += $delta;
			$sum += $current;
		}
	}

	return $sum;
}

assert(101 === q28(5));
echo q28(1001);
