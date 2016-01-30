<?php

namespace tomzx\ProjectEuler\Generator;

class Prime
{
	public static function generator()
	{
		$primes = [2];
		$currentNumber = 2;
		yield 2;
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
				yield $currentNumber;
			}
		}
	}
}
