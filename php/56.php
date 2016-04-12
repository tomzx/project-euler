<?php

function q56($maxA, $maxB)
{
	$max = 0;
	for ($a = 1; $a < $maxA; ++$a) {
		for ($b = 1; $b < $maxB; ++$b) {
			$value = bcpow($a, $b);
			$digits = str_split($value);
			$total = array_sum($digits);
			$max = max($max, $total);
		}
	}
	return $max;
}

echo q56(100, 100);
