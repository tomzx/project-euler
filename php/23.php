<?php

use tomzx\ProjectEuler\Number;
use tomzx\ProjectEuler\Series;

require_once 'vendor/autoload.php';

function q23()
{
	$limit = 28123;
	$lookup = [];
	for ($i = 1; $i < $limit; ++$i) {
		$isAbundant = Number::getProperDivisorsType($i) === 'abundant';
		$lookup[$i] = $isAbundant;
	}

	$sum = 0;
	for ($i = 1; $i < $limit; ++$i) {
		$isSumOfAbundant = false;
		$maxToTest = (int)ceil($i / 2);
		for ($j = 1; $j <= $maxToTest; ++$j) {
			if ($lookup[$j] && $lookup[$i - $j]) {
				$isSumOfAbundant = true;
				break;
			}
		}

		if ( ! $isSumOfAbundant) {
			$sum += $i;
		}
	}
	return $sum;
}

echo q23();
