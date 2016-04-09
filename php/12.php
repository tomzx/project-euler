<?php

use tomzx\ProjectEuler\Number;

require_once 'vendor/autoload.php';

function q12($divisorCount)
{
	// We can safely assume that the triangle number which is the sum of $divisorCount numbers
	// does not have $divisorCount divisors yet.
	$number = $divisorCount;
	while (true) {
		++$number;
		$triangleNumber = Number::triangle($number);

		// It should be more likely that an even number be the first number to have more divisors, so lets skip uneven
		// numbers
		if ($triangleNumber & 1 !== 0) {
			continue;
		}

		$numberOfDivisors = Number::getDivisorsCount($triangleNumber);
		if ($numberOfDivisors > $divisorCount) {
			return $triangleNumber;
		}
	}
}

assert(28 === q12(5));
echo q12(500);
