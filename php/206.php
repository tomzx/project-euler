<?php

// There are 378 925 620 squares that can be formed from 1020304050607080900 to 1929394959697989990.
// Testing all possible combinations would require 10^9 = 1 000 000 000, an order more tests required.
// Since the searched square ends with a 0, we know it must be a multiple of 10, which cuts the number of squares
// to test by 10.
function q206()
{
	$min = 1020304050607080900;
	$max = 1929394959697989990;
	$minSqrt = (int)floor(sqrt($min) / 10) * 10;
	$maxSqrt = (int)ceil(sqrt($max) / 10) * 10;
	for ($i = $minSqrt; $i < $maxSqrt; $i += 10) {
		$square = $i * $i;
		$square = (string)$square;
		$allMatches = true;
		for ($j = 1; $j <= 9; ++$j) {
			if ((int)$square[($j-1)*2] !== $j) {
				$allMatches = false;
				break;
			}
		}

		if ($allMatches) {
			return $i;
		}
	}
}

echo q206();
