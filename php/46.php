<?php

use tomzx\ProjectEuler\Solver\IntegerFactorization;

require_once 'vendor/autoload.php';

function q46()
{
	$number = 1;
	while (true) {
		$number += 2;
		if (IntegerFactorization::isPrime($number)) {
			continue;
		}

		// Try squares in ascending order and test whether the difference between the current number
		// and this double square is a prime
		// If we find a working combination (prime + double square), then this number is not the one we're looking for
		// If we find no combination of a square + prime up to the number, then it is the number we are looking for
		$found = false;
		$square = 1;
		$doubleSquare = 2*$square*$square;
		while ($doubleSquare <= $number) {
			$complement = $number - $doubleSquare;
			if (IntegerFactorization::isPrime($complement)) {
				$found = true;
				break;
			}

			++$square;
			$doubleSquare = 2*$square*$square;
		}

		if ( ! $found) {
			break;
		}
	}

	return $number;
}

echo q46();
