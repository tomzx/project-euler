<?php

use tomzx\ProjectEuler\Math;

require_once 'vendor/autoload.php';

function q34()
{
	// The maximum value the sum of factorial function can reach is ceil(log(n, 10)) * 9!, where n is any number
	// for example, if n = 399, then ceil(log(399, 10)) = ceil(2.6) = 3 (3 digits) and thus the max for 3 digits is
	// 3 * 9! or 3 * 362880
	// ceil(log(n, 10)) * 9! < n
	// If we ignore the ceil and solve for log(n, 10) * 9! < n, n > 74482

	$n = 3;
	$total = 0;
	for ($n = 3; $n < 74482; ++$n) {
		$parts = str_split($n);
		$sum = 0;
		foreach ($parts as $part) {
			$factorial = Math::factorial($part);
			$sum += $factorial;
		}
		if ($sum === $n) {
			$total += $sum;
		}

	}
	return $total;
}

echo q34();
