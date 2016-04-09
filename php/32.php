<?php

// multiplicand * multiplier = product must be less than 987654321, but likely less than 9876543 considering we need
// at least a multiplicand and a multiplier. This problem is comparable to testing 11! cases, since we have 9 digits,
// a multiplier symbol and = symbol to permute (not exactly consider the * cannot be the first symbol and = can never
// come before * and a number). Another note is that we will want to avoid testing isomorphic cases such
// as 186 x 39 = 7254 (or in other word, we want to automatically include it). This points to the fact that there is
// some form of triangular comparison going on (no reason to test for x > y in the equation x * y = z).
// Since we have 9 numbers, the numbers that are valid range between 1x1000=1000 and 99x101=9999
// In other words, we need to find out if there's any pandigital for values between 1000 and 9999 inclusive.
function q32()
{
	$sum = 0;
	// For each potential pandigital product
	for ($i = 1000; $i < 10000; ++$i) {
		$max = ceil(sqrt($i));
		// Test if we can produce any multiplicant * multiplier combination that is pandigital
		for ($j = 1; $j < $max; ++$j) {
			$isDivisible = $i % $j === 0;
			if ($isDivisible && isPandigital([$i, $j, $i/$j])) {
				$sum += $i;
				break;
			}
		}
	}
	return $sum;
}

function isPandigital(array $numbers)
{
	$numbers = implode('', $numbers);
	$numbers = str_split($numbers);
	sort($numbers);
	$numbers = implode($numbers);
	return '123456789' === $numbers;
}

echo q32();
