<?php

use tomzx\ProjectEuler\Math;
use tomzx\ProjectEuler\Solver\PrimeDecomposition;

require_once 'vendor/autoload.php';

function q21($from, $to)
{
	$integerToSum = [];
	for ($i = $from; $i < $to; ++$i) {
		$primeDecomposition = PrimeDecomposition::solve($i);
		$sumOfDivisors = Math::divisorsSum($primeDecomposition);
		$sumOfProperDivisors = $sumOfDivisors - $i;
		$integerToSum[$i] = $sumOfProperDivisors;
//		var_dump($i,/* $primeDecomposition,*/ $sumOfDivisors, $sumOfProperDivisors);
//		echo PHP_EOL;
	}

	$sumOfAmicableNumbers = 0;
	foreach ($integerToSum as $integer => $sum) {
		if ($integer !== $sum && isset($integerToSum[$sum]) && $integerToSum[$sum] === $integer) {
//			var_dump('New match!', $integer, $sum);
			$sumOfAmicableNumbers += $integerToSum[$integer] + $integerToSum[$sum];
			unset($integerToSum[$integer]);
			unset($integerToSum[$sum]);
		}
	}
	return $sumOfAmicableNumbers;
}

echo q21(1, 10000);
