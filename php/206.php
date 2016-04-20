<?php

// There are 378 925 620 squares that can be formed between 1020304050607080900 and 1929394959697989990.
// Testing all possible combinations of the placeholders would require 10^9 = 1 000 000 000,
// an order more of tests required compared to testing the generatable squares.
// Since the searched square ends with a 0, we know it must be a multiple of 10, which cuts the number of squares
// to test by 10.
// We can also see that the square ends in _9_0, thus the number itself must either end with 30 -> 900 or 70 -> 4900
// This allows us only to test for numbers ending with these two possibilities instead of testing every 10 (thus
// further reducing the set by another factor of 10 (5 to be more exact))
function q206()
{
	$min = 1020304050607080900;
	$max = 1929394959697989990;
	$minSqrt = (int)floor(sqrt($min) / 100) * 100;
	$maxSqrt = (int)ceil(sqrt($max) / 100) * 100;
	for ($i = $minSqrt; $i < $maxSqrt; $i += 100) {
		foreach ([30, 70] as $lowerDigits) {
			$x = $i + $lowerDigits;
			$square = $x * $x;
			// A regex here is faster than comparing the given indexes through a for loop
			if (preg_match('/1\d2\d3\d4\d5\d6\d7\d8\d9\d0/', $square)) {
				return $x;
			}
		}
	}
}

echo q206();
