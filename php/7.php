<?php

// Find the $number-th prime number
function q7($number) {
	$primes = [2];
	$currentNumber = 2;
	while (true) {
		++$currentNumber;
		if ($currentNumber & 2 === 0) {
			continue;
		}

		$squareRoot = sqrt($currentNumber);

		$foundPrimeDivisor = false;
		foreach ($primes as  $prime) {
			if ($prime > $squareRoot) {
				break;
			}

			if ($currentNumber % $prime === 0) {
				$foundPrimeDivisor = true;
				break;
			}
		}

		if ( ! $foundPrimeDivisor) {
			$primes[] = $currentNumber;
//			echo 'added '.$currentNumber.PHP_EOL;
		}

		if (count($primes) === $number) {
			return $primes[$number - 1];
		}
	}
}

//echo q7(6);
echo q7(10001);
