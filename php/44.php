<?php

use tomzx\ProjectEuler\Number;

require_once 'vendor/autoload.php';

// This solves q44 however no check to minimize D is done. Normally this would require starting iteration from the half
// of the sum of pentagonal numbers in order to minimize distance.
function q44()
{
	$pentagonalNumbers = [];
	$i = 0;
	while (true) {
		$pentagonalNumber = Number::pentagonal(++$i);
		$pentagonalNumbers[$pentagonalNumber] = $pentagonalNumber;
		foreach ($pentagonalNumbers as $firstPentagonalNumber) {
			$secondPentagonalNumber = $pentagonalNumber - $firstPentagonalNumber;

			if ($firstPentagonalNumber === $secondPentagonalNumber) {
				continue;
			}

			if ( ! isset($pentagonalNumbers[$secondPentagonalNumber])) {
				continue;
			}

			$difference = $secondPentagonalNumber - $firstPentagonalNumber;
			if (isset($pentagonalNumbers[$difference])) {
				return $secondPentagonalNumber - $firstPentagonalNumber;
			}
		}
	}
}

echo q44();
