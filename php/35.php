<?php

use tomzx\ProjectEuler\Generator\Prime;
use tomzx\ProjectEuler\Str;

require_once 'vendor/autoload.php';

function q35($max)
{
	$primes = Prime::upTo($max);
	$primes = array_flip($primes);

	$circularPrimesCount = 0;
	foreach ($primes as $prime => $dontCare) {
		$length = strlen($prime);
		$isCircular = true;
		for ($i = 0; $i < $length; ++$i) {
			$rotatedPrime = Str::rotate($prime, $i);
			if ( ! isset($primes[$rotatedPrime])) {
				$isCircular = false;
				break;
			}
		}

		if ($isCircular) {
			++$circularPrimesCount;
		}
	}

	return $circularPrimesCount;
}

//echo q35(100);
echo q35(1000000);
