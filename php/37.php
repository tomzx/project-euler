<?php

use tomzx\ProjectEuler\Number;

require_once 'vendor/autoload.php';

// For a number to be a truncatable prime, it must
// * have a prime number as first digit (2,3,5,7)
// * have a prime number as last digit (3,5,7) (except 2 as the whole number will obviously not be prime)
// * Any number larger than 10 necessarily cannot end with 5 as it will not be prime,
//   thus the last digit set is (3,7) for n >= 10
// * digits between the first and last digits must be in the set (1,3,7,9) to make sure the truncated number is not
//   obviously prime (being a multiple of 2 or 5)
// Thus the structure of a truncatable prime is [2,3,5,7]{1}[1,3,7,9]{0,}[3,7]{1}
// Our strategy here will thus be to build every permutation, test if they are prime, then test if their left/right
// truncation is prime as well

function middleDigitsGenerator(array $digits, $length)
{
	if ($length === 0) {
		yield '';
		return;
	}

	$indexes = array_fill(0, $length, 0);
	$numberOfDigits = count($digits);
	$numberOfPermutations = $numberOfDigits ** $length;

	for ($i = 0; $i < $numberOfPermutations; ++$i) {
		$outputDigits = '';
		// Calculate the appropriate indexes
		for ($j = 0; $j < $length; ++$j) {
			if ($indexes[$j] === $numberOfDigits) {
				++$indexes[$j+1];
				$indexes[$j] = 0;
			}
			$digit = $digits[$indexes[$j]];
			$outputDigits = $digit . $outputDigits;
		}

		yield $outputDigits;

		// Increment to next value
		++$indexes[0];
	}
}

function potentialTruncatablePrimeGenerator()
{
	$middleDigitsLength = 0;
	while (true) {
		foreach ([2,3,5,7] as $firstDigit) {
			$middleDigitsGenerator = middleDigitsGenerator([1,3,7,9], $middleDigitsLength);
			foreach ($middleDigitsGenerator as $middleDigits) {
				foreach ([3,7] as $lastDigit) {
					yield $firstDigit . $middleDigits . $lastDigit;
				}
			}
		}
		// Increase length and start over
		++$middleDigitsLength;
	}
}

function q37()
{
	$truncatablePrimes = [];
	$expected = 11;
	$generator = potentialTruncatablePrimeGenerator();
	foreach ($generator as $potentialTruncatablePrime) {
//		echo $potentialTruncatablePrime . ' ' . $expected . PHP_EOL;

		if ( ! Number::isTruncatablePrime($potentialTruncatablePrime)) {
			continue;
		}

		--$expected;
		$truncatablePrimes[] = $potentialTruncatablePrime;

		if ($expected === 0) {
			break;
		}
	}

	return array_sum($truncatablePrimes);
}

Number::isTruncatablePrime(3797);

echo q37();
