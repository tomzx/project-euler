<?php

use tomzx\ProjectEuler\Solver\PrimeDecomposition;

require_once 'vendor/autoload.php';

// Superabundant numbers?
// http://mathschallenge.net/library/number/number_of_divisors
//function q12($divisorCount)
//{
//	// Start at the number where we have 1..n as divisors, as it should be the minimal value
//	$generator = Prime::generator();
//	$value = '1';
//	while (true) {
//		$prime = $generator->current();
//		if ($prime > $divisorCount/2) {
//			break;
//		}
////		$primes[] = $prime;
//		$value = bcmul($value, $prime);
//		$generator->next();
//	}
//
////	var_dump($primes);
//	var_dump($value);
//	die;
//
//	$currentMax = 1;
//	while (true) {
//		$triangleNumber = 0;
//		for ($i = 1; $i <= $currentMax; ++$i) {
//			$triangleNumber += $i;
//		}
//
//		echo $triangleNumber.PHP_EOL;
//		++$currentMax;
//	}
//}

function triangle($number)
{
	return ($number * ($number + 1)) / 2;
}

function q12($divisorCount)
{
	$decomposition = PrimeDecomposition::solve($divisorCount);
	var_dump($decomposition);
//	$generator = Prime::generator();
//	$result = 1;
//	for ($i = 0; $i < $divisorCount; ++$i) {
//		$prime = $generator->current();
//		$result *= $prime;
//		$generator->next();
//	}
//	return $result;
}

// 62370000 = min number to have 500 divisors
echo q12(501);
//var_dump(primeDecomposition(12000));
