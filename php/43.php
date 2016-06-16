<?php

use tomzx\ProjectEuler\Number;

require_once 'vendor/autoload.php';

// We certainly do not want to test the 10^10 permutations.
// Thus it probably makes more sense to try and generate the valid permutations. For instance, since we know that
// d2d3d4 has to be divisible by 2, then any number which has d4 = {0,2,4,6,8} will be valid (1/2 valid)
// Similarly, d4d5d6 being divisible by 5 implies that d6 = {0,5} (1/5 valid)
// Finally, we know that d8d9d10 must be divisible by 17, which implies that any multiple of 17 will be valid for these
// three last numbers (thus about 1000/17 = 59 valid out of 1000)
// These three clues allow us to reduce the valid number of permutations to test by 1/2*1/5*59/1000= = 59/10000
// Considering the rule overlaps for 2 digits, it may be efficient to slowly build on valid examples. Thus start with
// 59 cases, then invalidate any that do not work as a multiple of 13 and so on.

// Do not forget that these numbers must also be pandigital (no digit twice)
function q43()
{
	// Compute the 3 digits values divisible by the given primes
	$primes = [2, 3, 5, 7, 11, 13, 17];
	$divisibleBy = [];
	foreach ($primes as $prime) {
		$divisibleBy[$prime] = [];
		for ($i = $prime; $i < 1000; $i += $prime) {
			// Exclude any multiple of a given prime if it is already not pandigital
			if ( ! Number::isPandigital($i, null, true)) {
				continue;
			}
			$divisibleBy[$prime][] = $i;
		}
	}

	// Generate all the sequences of valid (respecting the constraint specified in the problem) pandigital numbers
	$primeSize = count($primes);
	$solutionSet = $divisibleBy[$primes[$primeSize-1]];
	for ($i = 1; $i < $primeSize; ++$i) {
		$upperPart = $divisibleBy[$primes[$primeSize-$i-1]]; // dwdxdy
		$lowerPart = $solutionSet; // dxdydz

		// Map numbers for efficient matching
		$a = [];
		foreach ($upperPart as $number) {
			$formattedNumber = sprintf('%02d', $number % 100);
			$a[$formattedNumber][] = $number;
		}

		$b = [];
		foreach ($lowerPart as $number) {
			$formattedNumber = sprintf('%02d', floor($number/pow(10, $i)));
			$b[$formattedNumber][] = $number;
		}

		$intersection = array_intersect_key($a, $b);

		$newSolutionSet = [];
		foreach ($intersection as $key => $dontCare) {
			$upperPart = $a[$key];
			$lowerPart = $b[$key];
			foreach ($upperPart as $upper) {
				$upper = floor($upper / 100);
				foreach ($lowerPart as $lower) {
					$lower = sprintf('%0'.(2+$i).'d', $lower);
					// Since the number has to be pandigital, make sure the digit we're about to add isn't already present
					if (strpos($lower, (string)$upper) !== false) {
						continue;
					}
					$value = ($upper . $lower);
					$newSolutionSet[] = $value;
				}
			}
		}

		$solutionSet = $newSolutionSet;
	}

	// Find the last digit for each solution in the solution set
	$finalSolutionSet = [];
	foreach ($solutionSet as $solution) {
		for ($i = 0; $i < 10; ++$i) {
			if (strpos($solution, (string)$i) !== false) {
				continue;
			}

			$finalSolutionSet[] = $i.$solution;
			break;
		}
	}

	return array_sum($finalSolutionSet);
}

echo q43();
