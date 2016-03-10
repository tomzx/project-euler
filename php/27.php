<?php

use tomzx\ProjectEuler\Arr;
use tomzx\ProjectEuler\Generator\Prime;
use tomzx\ProjectEuler\Solver\PrimeDecomposition;

require_once 'vendor/autoload.php';

function q27($a, $b) {
	// Get primes from 0 to $a
	$aPrimes = array_merge([1], Prime::upTo($a));
	$aValues = array_merge(Arr::multiply(-1, array_reverse($aPrimes)), [0], $aPrimes);
	// Get primes from 0 to $b
	$bPrimes = array_merge([1], Prime::upTo($b));
	$bValues = array_merge(Arr::multiply(-1, array_reverse($bPrimes)), [0], $bPrimes);

	$coefficients = [0, 0];
	$maxN = 0;
	foreach ($aValues as $i) {
		foreach ($bValues as $j) {
			$n = 0;
			while (true) {
				$formula = $n * $n + $i * $n + $j;

				// To be prime, it has to be greater than one
				$isPrime = $formula > 1 && PrimeDecomposition::isPrime($formula);
				if ( ! $isPrime) {
					break;
				}

				++$n;
			}

			if ($maxN < $n) {
				$maxN = $n;
				$coefficients = [$i, $j];
			}
		}
	}

	return $coefficients[0] * $coefficients[1];
}

echo q27(1000, 1000);
