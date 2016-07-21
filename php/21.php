<?php

use tomzx\ProjectEuler\Math;
use tomzx\ProjectEuler\Solver\IntegerFactorization;

require_once 'vendor/autoload.php';

function q21($from, $to)
{
	$integerToSum = [];
	for ($i = $from; $i < $to; ++$i) {
		$primeDecomposition = IntegerFactorization::solve($i);
		$sumOfDivisors = Math::divisorsSum($primeDecomposition);
		$sumOfProperDivisors = $sumOfDivisors - $i;
		$integerToSum[$i] = $sumOfProperDivisors;
	}

	$sumOfAmicableNumbers = 0;
	foreach ($integerToSum as $integer => $sum) {
		if ($integer !== $sum && isset($integerToSum[$sum]) && $integerToSum[$sum] === $integer) {
			$sumOfAmicableNumbers += $integerToSum[$integer] + $integerToSum[$sum];
			unset($integerToSum[$integer]);
			unset($integerToSum[$sum]);
		}
	}
	return $sumOfAmicableNumbers;
}

echo q21(1, 10000);
