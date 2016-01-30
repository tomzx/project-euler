<?php

use tomzx\ProjectEuler\Generator\Prime;

require_once 'vendor/autoload.php';

// Superabundant numbers?
function q12($divisorCount)
{
	// Start at the number where we have 1..n as divisors, as it should be the minimal value
	$generator = Prime::generator();
	$value = '1';
	while (true) {
		$prime = $generator->current();
		if ($prime > $divisorCount/2) {
			break;
		}
//		$primes[] = $prime;
		$value = bcmul($value, $prime);
		$generator->next();
	}

//	var_dump($primes);
	var_dump($value);
	die;

	$currentMax = 1;
	while (true) {
		$triangleNumber = 0;
		for ($i = 1; $i <= $currentMax; ++$i) {
			$triangleNumber += $i;
		}

		echo $triangleNumber.PHP_EOL;
		++$currentMax;
	}
}

echo q12(1);
